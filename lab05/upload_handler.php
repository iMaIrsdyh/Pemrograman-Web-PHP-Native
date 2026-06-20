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
     * Memeriksa apakah ada file yang diunggah.
     */
    if ($_FILES["document"]["name"]) {
        $fileTmpPath = $_FILES['document']['tmp_name'];
        $fileName = $_FILES["document"]["name"];
        $fileSize = $_FILES["document"]["size"];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $randomFileName = uniqid() . '.' . $fileExtension;
        $targetFile = $targetDir . $randomFileName;

        /**
         * Validasi ukuran file (maksimum 2MB).
         */
        if ($fileSize > 2000000) {
            $errorMsg = "Maaf, ukuran file terlalu besar (maksimal 2MB).";
            $uploadOk = 0;
            return;
        }

        /**
         * Validasi ekstensi file (hanya JPG, JPEG, PNG, GIF, PDF yang diizinkan).
         */
        if (!in_array($fileExtension, ["jpg", "png", "jpeg", "gif", "pdf"])) {
            $errorMsg = "Maaf, hanya file JPG, JPEG, PNG, GIF, & PDF yang diizinkan.";
            $uploadOk = 0;
            return;
        }

        /**
         * Mengambil data input dari form.
         */
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $email = htmlspecialchars($_POST['email']);

        /**
         * Memulai transaksi database untuk memastikan integritas data.
         */
        $connection->beginTransaction();

        /**
         * Menyimpan data pengguna ke dalam tabel 'myguests'.
         */
        $sql = "INSERT INTO myguests (firstname, lastname, email, reg_date) VALUES (:firstname, :lastname, :email, NOW())";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);

        try {
            $stmt->execute();
            
            /**
             * Mendapatkan ID myguest untuk menjadi foreign_key dari table files
             */
            $last_id = $connection->lastInsertId();

            /**
             * Menyimpan informasi file yang diunggah ke dalam tabel 'files'.
             */
            $filesql = "INSERT INTO files (myguest_id, file_name, file_path, created_at) VALUES (:myguest_id, :file_name, :file_path, NOW())";
            $stmt_file = $connection->prepare($filesql);
            $stmt_file->bindParam(':myguest_id', $last_id);
            $stmt_file->bindParam(':file_name', $fileName);
            $stmt_file->bindParam(':file_path', $targetFile);

            try {
                $stmt_file->execute();
                $connection->commit();

                /**
                 * Memindahkan file yang diunggah ke direktori tujuan.
                 */
                if (move_uploaded_file($fileTmpPath, $targetFile)) {
                    $successMsg = "File berhasil diupload.";
                } else {
                    $errorMsg = "Maaf, terjadi error saat mengupload file.";
                }
            } catch (PDOException $e) {
                $connection->rollback();
                $errorMsg = $e->getMessage();
            }
        } catch (PDOException $e) {
            $connection->rollback();
            $errorMsg = $e->getMessage();
        }
    } else {
        $errorMsg = "Pilih file untuk diupload.";
    }
}
?>