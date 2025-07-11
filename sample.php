<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Layout</title>
    <link rel="stylesheet" href="SAMPLE.css"> <!-- Linking the external CSS file -->
</head>
<body>
    <?php session_start(); ?>
     <?php $con = new mysqli ('localhost', 'root', 'Angelo28b','web1');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$con->close();
?>

 <nav class="navbar">
        <div class="logo">tite website</div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <l1><a href="logout.php" >logout</a></l1>
        </ul>
    </nav>


<div class="container">
    <div class="box" style ="grid-area: profile">user profile</div>
    <div class="box" id ="feed" style = "grid-area: feed">
    <div id="postsContainer">
    <!-- Posts will be dynamically inserted here -->
</div>
</div>




    <div class="box" id= "post" style = "grid-area: post" > <!--post starts here-->
           <form id="postForm" enctype="multipart/form-data" method = "POST">
             <div class="post-header">
                 <input type="text" placeholder="What's on your mind?" name="content" required>
                 <label for="fileUpload" class="media-btn">📎 Media</label>
                 <input type="file" id="fileUpload" name="uimage" style="display: none;">
             </div>
             <button type="submit" class="post-button">Post</button>
            </form>          
            </div>

   <?php
// Include your DB connection

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'dbconnect.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
   echo "Connected successfully to the database.";

}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = "angelo"; // Replace with session or actual username
    $content = $_POST["content"];
    $imagePath = null;

    // Handle file upload if one exists
    if (isset($_FILES["uimage"]) && $_FILES["uimage"]["error"] === 0) {
        $uploadDir = "uploads/";
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

        $filename = basename($_FILES["uimage"]["name"]);
        $targetPath = $uploadDir . time() . "_" . $filename;

        if (move_uploaded_file($_FILES["uimage"]["tmp_name"], $targetPath)) {
            $imagePath = $targetPath;
        } else {
            die("Failed to upload image.");
        }
    }

    // Prepare and insert into DB
    $stmt = $conn->prepare("INSERT INTO posts (username, content, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss",$username, $content, $imagePath);

    
    if ($stmt->execute()) {
        echo "Post saved successfully!";
         header("Location: " . $_SERVER['PHP_SELF']);
    exit();
    } else {
        echo "Failed to save post: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

















    <div class="box" style = "grid-area: friends" >friends</div>
</div>


</body>

</html>
<script src="javascript/ajax.js"></script>
