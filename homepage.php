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
    <title>Volleyball Central | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="activepage.css">
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
                <li class="nav-item"><a class="nav-link active" href="homepage.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="stats.php">Statistics</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero">
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p>Play hard, aim high, and live the game!</p>
        <a href="stats.php" class="hbtn">View Players Stats</a>
    </div>
</section>

<div class="container my-5">
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card custom-card xcard">
                <img src="vb1.jpg" class="card-img-top" alt="About Volleyball">
                <div class="card-body">
                    <h5 class="card-title">About Volleyball</h5>
                    <p class="card-text">Learn more about the world of Volleyball!</p>
                    <a href="about.php" class="hbtn">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card custom-card">
                <img src="vb2.jpg" class="card-img-top" alt="Volleyball Gear">
                <div class="card-body">
                    <h5 class="card-title">Input Stats</h5>
                    <p class="card-text">Show the world how high your jumps are!</p>
                    <a href="stats.php" class="hbtn">Statistics</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card custom-card">
                <img src="vb3.jpg" class="card-img-top" alt="Contact">
                <div class="card-body">
                    <h5 class="card-title">Join the Team</h5>
                    <p class="card-text">Feel free to contact us!</p>
                    <a href="contact.php" class="hbtn">Contact Us</a>
                </div>
            </div>
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
