<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';
$message = "";

if (isset($_POST['submit'])) {

    $fullname      = $_POST['fullname'];
    $nationality   = $_POST['nationality'];
    $position      = $_POST['position'];
    $height        = $_POST['height'];
    $weight        = $_POST['weight'];
    $spike         = $_POST['spike'];
    $block         = $_POST['block'];
    $dominant_hand = $_POST['dominant_hand'];

    $query = "INSERT INTO userstats (fullname, nationality, position, height_cm, weight_kg, spike_cm, block_cm, dominant_hand)
              VALUES ('$fullname', '$nationality', '$position', '$height', '$weight', '$spike', '$block', '$dominant_hand')";

    if (mysqli_query($koneksi, $query)) {
        $message = "Player statistics added successfully!";
    } else {
        $message = "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
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
                <li class="nav-item"><a class="nav-link" href="homepage.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link active" href="stats.php">Statistics</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<section class="hero">
    <div class="container">
        <h1>Players Statistics</h1>
        <p class="lead">Strength. Precision. Power.</p>
    </div>
</section>

<div class="container" style="max-width: 500px; margin:auto; padding:20px;">
    <h2>Player Statistics</h2>

    <?php if (!empty($message)): ?>
        <div class="alert"><?php echo $message; ?></div>
    <?php endif; ?>

<form method="post" style="background-color: #9094bbff; padding: 15px; border-radius: 5px;">
    <div class="sform1">
            <label>Full Name</label>
            <input type="text" name="fullname" required>

            <label>Nationality</label>
            <input type="text" name="nationality" required>

            <label>Position</label>
            <select name="position" required>
                <option value="">Select Position</option>
                <option value="Outside Hitter">Outside Hitter</option>
                <option value="Opposite">Opposite</option>
                <option value="Middle Blocker">Middle Blocker</option>
                <option value="Setter">Setter</option>
                <option value="Libero">Libero</option>
            </select>
            <label>Height (cm)</label>
            <input type="number" name="height" required>
    </div>
    <div class="sform2">
            <label>Weight (kg)</label>
            <input type="number" name="weight" required>

            <label>Spike Jump (cm)</label>
            <input type="number" name="spike" required>

            <label>Block Jump (cm)</label>
            <input type="number" name="block" required>

            <label>Dominant Hand</label>
            <select name="dominant_hand" required>
                <option value="">Choose</option>
                <option value="Right">Right</option>
                <option value="Left">Left</option>
    </select>
    </div>

    <button type="submit" name="submit" class="hbtn" style="margin-top: 15px; width:100%;">Save</button>
</form>
<form action="showstats.php" method="post">
    <button type="submit" class="hbtn" 
            style="margin-top: 10px; width:100%;">
        View All Stats
    </button>
</form>
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
