<!DOCTYPE HTML>
<html>
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inner Page</title>
   
    
    <link rel="stylesheet" href="./web.css">




   
</header>
<body>
    <nav class="navbar">
        <div class="logo">tite website</div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <l1><a href="logout.php" >logout</a></l1>
            
        </ul>
        
    </nav>
     <?PHP
        session_start();
    ?>
     <?php $con = new mysqli ('localhost', 'root', 'Angelo28b','web1');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$con->close();
?>
    <div class="container" >
  
<div class ="user-info" >

    
<!-- this is where the pfp-->

        <div class="pfp" >
            <img src="upload/week 1 pic.jpg" alt="Profile Picture"  class="pfp-img">
        </div>
        <br>
        <br>
        <hr>
<!--this is where the info should be displayed-->
        <div class="user-info-header">
        <ul>
            <div class="item"><l1>item tite</li></div>
            <div class="item"><l1>item tite</li></div>
            <div class="item"><l1>item tite</li></div>
            <div class="item"><l1>item tite</li></div>
        </ul>
    </div>

</div>


<div class= "feed">
<!--post starts here-->
<form id="postForm" enctype="multipart/form-data" method="POST">
    <input type="text" name="username" placeholder="Your Name" required />
    <textarea name="content" placeholder="Write your post..." required></textarea>
    <input type="file" name="image" accept="image/*" />
    <button type="submit">Post</button>
</form>
<div class= "main-post-container">
<div id="postsContainer">
    <!-- Posts will be dynamically inserted here -->
</div>
</div>

<?php
include "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $content = $_POST['content'];
    $imagePath = "";

    // Handle image upload
    if (isset($_FILES["image"])) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
        $imagePath = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
    }

    // Save to database
    $stmt = $conn->prepare("INSERT INTO posts (username, content, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $content, $imagePath);
    
    if ($stmt->execute()) {
        // ✅ Prevent resubmission by redirecting
        header("Location: innerpage.php"); // Redirect to your main page
        exit();
    } else {
        echo json_encode(["success" => false]);
    }
}
?>
<!--post ends-->
</div>

<div class= friends>
    <ul>
        <l1>tite</l1>
        <l1>tite</l1>
    </ul>
</div>
</div>
    


</body>
<footer>

<script src="javascript/ajax.js"></script>

</footer>
</html>