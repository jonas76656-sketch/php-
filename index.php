<?php 
$conn = new mysqli($_ENV['MYSQLHOST'], $_ENV['MYSQLUSER'], $_ENV['MYSQLPASSWORD'], $_ENV['MYSQLDATABASE'], $_ENV['MYSQLPORT']);
$res = $conn->query("SELECT * FROM `my-table` ORDER BY id DESC");
?>
<style>
    body { background: #000; color: #fff; font-family: sans-serif; }
    .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; padding: 20px; }
    .card { background: #1a1a1a; padding: 10px; border-radius: 10px; }
    iframe { width: 100%; height: 200px; border: none; }
</style>
<div class="grid">
    <?php while($row = $res->fetch_assoc()): ?>
        <div class="card">
            <h3><?= $row['title'] ?></h3>
            <iframe src="<?= $row['video_url'] ?>" allowfullscreen></iframe>
        </div>
    <?php endwhile; ?>
</div>
