<?php

/**
 * Mengimpor file koneksi database.
 * File 'db_connection.php' harus berisi koneksi PDO ke database.
 */
require_once 'db_connection.php';

/**
 * Direktori tujuan untuk menyimpan file yang diunggah.
 */
$targetDir = "uploads/";
$uploadOk = 1;
$errorMsg = "";
$successMsg = "";

/**
 * Memeriksa apakah direktori tujuan ada, jika tidak maka buat direktori tersebut.
 */
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

/**
 * Memproses form ketika tombol submit ditekan.
 */
if (isset($_POST["submit"])) {

    /**
     * Mengambil data input dari form.
     */
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);

    /**
     * Memeriksa apakah ada file yang diunggah.
     */
    if (!empty($_FILES["documents"]["name"][0])) {

        /**
         * Memulai transaksi database untuk memastikan integritas data.
         */
        $connection->beginTransaction();

        /**
         * Menyimpan data pengguna ke dalam tabel 'myguests'.
         */
        $sql = "INSERT INTO myguests (firstname, lastname, email, reg_date)
                VALUES (:firstname, :lastname, :email, NOW())";

        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);

        try {
            $stmt->execute();
            $last_id = $connection->lastInsertId();

            /**
             * Memproses setiap file yang diunggah.
             */
            foreach ($_FILES["documents"]["name"] as $key => $file_name) {

                $file_tmp_path = $_FILES['documents']['tmp_name'][$key];
                $file_size = $_FILES['documents']['size'][$key];
                $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

                $random_file_name = uniqid() . '.' . $file_extension;
                $targetFile = $targetDir . $random_file_name;

                /**
                 * Validasi ukuran file (maksimum 2MB).
                 */
                if ($file_size > 2000000) {
                    $errorMsg = "File $file_name terlalu besar (maksimal 2MB).";
                    $uploadOk = 0;
                    break;
                }

                /**
                 * Validasi ekstensi file
                 * (hanya JPG, JPEG, PNG, GIF, PDF yang diizinkan).
                 */
                if (!in_array($file_extension, ["jpg", "png", "jpeg", "gif", "pdf"])) {
                    $errorMsg = "Format file $file_name tidak diizinkan.";
                    $uploadOk = 0;
                    break;
                }

                /**
                 * Menyimpan informasi file ke dalam tabel 'files'.
                 */
                $filesql = "INSERT INTO files (myguest_id, file_name, file_path, created_at)
                            VALUES (:myguest_id, :file_name, :file_path, NOW())";

                $stmt_file = $connection->prepare($filesql);
                $stmt_file->bindParam(':myguest_id', $last_id);
                $stmt_file->bindParam(':file_name', $file_name);
                $stmt_file->bindParam(':file_path', $targetFile);

                try {
                    $stmt_file->execute();
                    move_uploaded_file($file_tmp_path, $targetFile);
                    $uploadOk = 1;

                } catch (PDOException $e) {
                    $uploadOk = 0;
                    $connection->rollback();
                    $errorMsg = $e->getMessage();
                    break;
                }
            }

            /**
             * Jika semua file berhasil diproses, commit transaksi.
             */
            if ($uploadOk) {
                $connection->commit();
                $successMsg = "File berhasil diupload.";
            }

        } catch (PDOException $e) {
            $uploadOk = 0;
            $connection->rollback();
            $errorMsg = $e->getMessage();
        }
    }
}