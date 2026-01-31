<?php
// Railway Variables များကို အသုံးပြု၍ Database ချိတ်ဆက်ခြင်း
$conn = new mysqli($_ENV['MYSQLHOST'], $_ENV['MYSQLUSER'], $_ENV['MYSQLPASSWORD'], $_ENV['MYSQLDATABASE'], $_ENV['MYSQLPORT']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $url = $conn->real_escape_string($_POST['url']);
    
    // သင်ပေးခဲ့သော Table name ကို စစ်ဆေးပါ (ဥပမာ my-table)
    $sql = "INSERT INTO `my-table` (title, video_url) VALUES ('$title', '$url')";
    
    if ($conn->query($sql)) {
        echo "<h3 style='color:green; text-align:center;'>✅ တင်ပြီးပါပြီ!</h3>";
    }
}
?>

<div style="text-align:center; padding:50px;">
    <h2>🎬 Admin Panel</h2>
    <form method="POST">
        <input type="text" name="title" placeholder="ကားနာမည်" required><br><br>
        <input type="text" name="url" placeholder="FebBox Link" required><br><br>
        <button type="submit">တင်မည်</button>
    </form>
</div>
