<?php
include 'koneksi.php';

$message = "";

if (isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $check = mysqli_query($koneksi, "SELECT * FROM userdata WHERE username='$username' OR email='$email'");

    if (mysqli_num_rows($check) > 0) {
        $message = "⚠️ Username or email already exists. Please try again.";
    } else {
        $query = "INSERT INTO userdata (fullname, username, email, password)
                  VALUES ('$fullname', '$username', '$email', '$password')";

        if (mysqli_query($koneksi, $query)) {
            header("Location: login.php");
            exit();
        } else {
            $message = "❌ Error saving data: " . mysqli_error($koneksi);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Here</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Register</h1>

    <!-- Notification -->
    <?php if (!empty($message)): ?>
        <div class="alert"><?php echo $message; ?></div>
    <?php endif; ?>

    <form method="post" action="">
        <table>
            <!-- FULL NAME -->
            <tr>
                <td>
                    <label for="fullname">Full Name</label><br>
                    <input type="text" id="fullname" name="fullname" required placeholder="Enter your full name" value="<?php echo isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : ''; ?>">
                </td>
            </tr>
            <!-- USERNAME -->
            <tr>
                <td>
                    <label for="username">Username</label><br>
                    <input type="text" id="username" name="username" required placeholder="Enter your username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                </td>
            </tr>
            <!-- EMAIL -->
            <tr>
                <td>
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email" required placeholder="Enter your email address" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"><br>
                </td>
            </tr>
            <!-- PASSWORD -->
            <tr>
                <td>
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password" required placeholder="At least 8 characters"><br>
                </td>
            </tr>
            <!-- SUBMIT -->
            <tr>
                <td style="text-align: center;">
                    <button type="submit" name="register" class="hbtn">Register</button>
                    <p>Already have an account? <a href="login.php" class="hreg">Login here</a></p>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
