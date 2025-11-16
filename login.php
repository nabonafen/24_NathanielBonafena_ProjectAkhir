<?php
include 'koneksi.php';
session_start();

$message = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($koneksi, "SELECT * FROM userdata WHERE username='$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if ($password === $row['password']) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['uid'] = $row['uid'];

            header("Location: homepage.php");
            exit();
        } else {
            $message = "❌ Incorrect password. Please try again.";
        }
    } else {
        $message = "⚠️ Username not found. Please register first.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <?php if (!empty($message)): ?>
        <div class="alert"><?php echo $message; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <table>
            <!-- USERNAME -->
            <tr>
                <td>
                    <label for="username">Username</label><br>
                    <input type="text" id="username" name="username" required placeholder="Enter your username" 
                        value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                </td>
            </tr>

            <!-- PASSWORD -->
            <tr>
                <td>
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password" required placeholder="At least 8 characters"><br>
                </td>
            </tr>

            <!-- SUBMIT BUTTON -->
            <tr>
                <td colspan="3" style="text-align: center;">
                    <button type="submit" name="login" class="hbtn">Login</button>
                    <p>Don't have an account? <a href="register.php" class="hreg">Register here</a></p>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
