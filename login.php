<?php
session_start();

// Jika sudah login, redirect ke dashboard
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: dashboard.php");
    exit;
}

$emailErr = $passwordErr = "";
$email = $password = "";
$loginError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi email
    if (empty($_POST["email"])) {
        $emailErr = "Email harus diisi";
    } else {
        $email = sanitizeInput($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format email tidak valid";
        }
    }

    // Validasi password
    if (empty($_POST["password"])) {
        $passwordErr = "Password harus diisi";
    } else {
        $password = $_POST["password"];
    }

    // Jika tidak ada error validasi, cek login
    if (empty($emailErr) && empty($passwordErr)) {
        // Cek apakah ada data registrasi
        if (isset($_SESSION["registered_user"]) && !empty($_SESSION["registered_user"])) {
            $userFound = false;
            foreach ($_SESSION["registered_user"] as $user) {
                if ($user["email"] === $email && password_verify($password, $user["password"])) {
                    $userFound = true;
                    // Set session login
                    $_SESSION['logged_in'] = true;
                    $_SESSION['user_email'] = $email;
                    $_SESSION['user_name'] = $user["name"];
                    header("Location: dashboard.php");
                    exit;
                }
            }
            if (!$userFound) {
                $loginError = "Email atau password salah";
            }
        } else {
            $loginError = "Belum ada user yang terdaftar. Silakan registrasi terlebih dahulu.";
        }
    }
}

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 400px;
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
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        .login-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Login</h1>

    <?php if (!empty($loginError)): ?>
        <div class="login-error">
            <?php echo $loginError; ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>">
            <span class="error"><?php echo $emailErr; ?></span>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <span class="error"><?php echo $passwordErr; ?></span>
        </div>

        <div class="form-group">
            <input type="submit" value="Login">
        </div>
    </form>

    <p>Belum punya akun? <a href="registration.php">Registrasi di sini</a></p>
</body>
</html>