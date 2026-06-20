<?php
require_once 'upload_handler.php';
require_once 'function.php';

$guests = getGuests();
$connection = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Demo</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .error {
            color: red;
            padding: 10px;
            border: 1px solid red;
            background-color: #ffe6e6;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .success {
            color: green;
            padding: 10px;
            border: 1px solid green;
            background-color: #e6ffe6;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Upload File</h1>

    <?php if (!empty($errorMsg)): ?>
        <div class="error"><?= $errorMsg; ?></div>
    <?php endif; ?>

    <?php if (!empty($successMsg)): ?>
        <div class="success"><?= $successMsg; ?></div>
    <?php endif; ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label>Firstname:</label>
            <input type="text" name="firstname" required>
        </div>

        <div class="form-group">
            <label>Lastname:</label>
            <input type="text" name="lastname" required>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="document">Pilih file:</label>
            <input type="file" name="document">
        </div>

        <div class="form-group">
            <input type="submit" value="Upload File" name="submit">
        </div>

    </form>

    <h1>My Guests</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Registration Date</th>
                <th>File</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($guests as $guest): ?>
                <tr>
                    <td><?= $guest['id'] ?></td>
                    <td><?= $guest['firstname'] ?></td>
                    <td><?= $guest['lastname'] ?></td>
                    <td><?= $guest['email'] ?></td>
                    <td><?= date_format(date_create($guest['reg_date']), 'D, d F Y H:i') ?></td>
                    <td>
                        <a href="<?= $guest['file_path'] ?>">
                            <?= $guest['file_name'] ?>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</body>
</html>