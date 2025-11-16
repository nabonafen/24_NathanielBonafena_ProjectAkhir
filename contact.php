<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($koneksi, $_POST['fullname']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $message = mysqli_real_escape_string($koneksi, $_POST['message']);

    $query = "INSERT INTO contact_messages (fullname, email, message) 
              VALUES ('$name', '$email', '$message')";
    mysqli_query($koneksi, $query);

    $success = "Message Sent!";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="activepage.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="homepage.php">
    <img src="vlogo.png" alt="Logo" style="height: 60px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="homepage.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="stats.php">Statistics</a></li>
                <li class="nav-item"><a class="nav-link active" href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero">
    <div class="container">
        <h1>Contact Us</h1>
        <p class="lead">We’d love to hear from you, reach out anytime.</p>
    </div>
</section>

<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <h3>Send us a Message</h3>
            <?php if(isset($success)): ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>
            <form method="POST" action="">
                <div>
                    <label class="form-label">Full Name</label>
                    <input name="fullname" type="text" class="form-control" required>
                </div>
                <div>
                    <label class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control" required>
                </div>
                <div>
                    <label class="form-label">Message</label>
                    <textarea name="message" class="form-control" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
        <div class="col-md-6">
            <h3>Contact Information</h3>
            <p><strong>Email:</strong> volleynabo@gmail.com</p>
            <p><strong>Phone:</strong> +62 812 3456 7890</p>
            <p><strong>Address:</strong> Surabaya, Indonesia</p>
            <iframe 
                src="https://maps.google.com/maps?q=surabaya&t=&z=13&ie=UTF8&iwloc=&output=embed" 
                width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>

<footer class="sfooter">
    <p>© 2025 Volleynabo</p>
    <p>Dedicated to providing reliable volleyball information, resources, and community support.</p>

    <div class="flinks">
        <a href="about.php">About</a>
        <span>•</span>
        <a href="contact.php">Contact</a>
        <span>•</span>
        <a href="stats.php">Stats</a>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
