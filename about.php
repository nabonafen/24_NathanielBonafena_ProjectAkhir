<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="activepage.css" rel="stylesheet">
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
                <li class="nav-item"><a class="nav-link active" href="about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="stats.php">Statistics</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<section class="hero">
    <div class="container">
        <h1>About Us</h1>
        <p class="lead">Learn more about who we are and what we do.</p>
    </div>
</section>
<div class="container my-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <img src="vb4.jpg" class="img-fluid rounded shadow-sm" alt="About">
        </div>
        <div class="col-md-6">
            <h2>Our Story</h2>
            <p>We are a passionate team dedicated to providing the most accurate statistics. Since our founding, we’ve focused on quality, innovation, and customer satisfaction.</p>
            <p>Our mission is to deliver excellence through every interaction and service we offer. Thank you for being part of our journey.</p>
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
