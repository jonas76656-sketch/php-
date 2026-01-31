<?php
// Railway Environment Variables မှ အချက်အလက်များကို ရယူခြင်း
$conn = new mysqli($_ENV['MYSQLHOST'], $_ENV['MYSQLUSER'], $_ENV['MYSQLPASSWORD'], $_ENV['MYSQLDATABASE'], $_ENV['MYSQLPORT']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $url = $conn->real_escape_string($_POST['url']);
    
    // Table name ကို 'my-table' ဟု ပေးခဲ့လျှင် ဤအတိုင်း သုံးပါ
    $sql = "INSERT INTO `my-table` (title, video_url) VALUES ('$title', '$url')";
    
    if ($conn->query($sql)) {
        echo "<h3 style='color:green; text-align:center;'>✅ Website ပေါ်တင်ပြီးပါပြီ!</h3>";
    }
}
?>

<div style="text-align:center; margin-top:50px; font-family:sans-serif;">
    <h2>🎬 Movie Admin Panel</h2>
    <form method="POST">
        <input type="text" name="title" placeholder="ကားနာမည်" required style="padding:10px; width:250px;"><br><br>
        <input type="text" name="url" placeholder="FebBox Link" required style="padding:10px; width:250px;"><br><br>
        <button type="submit" style="padding:10px 20px; background:#5c2d91; color:white; border:none; cursor:pointer;">Upload</button>
    </form>
</div>
