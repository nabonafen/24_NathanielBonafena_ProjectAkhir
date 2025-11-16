<?php
session_start();
include 'koneksi.php';

$result = mysqli_query($koneksi, "SELECT * FROM userstats ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Player Stats</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#212554; color:white;">

<div class="container mt-4">

    <a href="stats.php" class="btn btn-warning mb-3">← Back</a>

    <h2 class="mb-3">All Player Statistics</h2>

    <div class="table-responsive">
        <table class="table table-dark table-hover table-bordered align-middle">
            <thead class="table-secondary text-dark">
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Nationality</th>
                    <th>Position</th>
                    <th>Height (cm)</th>
                    <th>Weight (kg)</th>
                    <th>Spike (cm)</th>
                    <th>Block (cm)</th>
                    <th>Dominant Hand</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['nationality']; ?></td>
                    <td><?php echo $row['position']; ?></td>
                    <td><?php echo $row['height_cm']; ?></td>
                    <td><?php echo $row['weight_kg']; ?></td>
                    <td><?php echo $row['spike_cm']; ?></td>
                    <td><?php echo $row['block_cm']; ?></td>
                    <td><?php echo $row['dominant_hand']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>
