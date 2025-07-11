<!DOCTYPE HTML>
<header>
<link rel = "stylesheet" href="web.css">
<?php 

session_start(); // session starts


$con = new mysqli ('localhost', 'root', 'Angelo28b','web1');

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
<div>
<nav class="navbar">
        <div class="logo">tite website</div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a Id="button-modal">register!</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        
    </nav>
</div>

</header>

<body>



<?php



?>


<!--login html start-->
<form method = "POST" class = "form">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <label for="email">passworc:</label>
        <input type="password" id="password" name="password"  >
        <button class = "form-button"type="submit" name = "submit">Submit</button>
    </form>


<br>
<br>
    

    <?php 
    // login start
    if (isset($_POST["submit"])) {
        $input_name = $_POST["name"];
        $input_password = $_POST["password"];
        
    } else {
        $input_name = '';
        $input_password = '';

    }

if (!empty($input_name) && !empty($input_password)) {
    
    $sql = "SELECT * FROM user WHERE username = '$input_name' AND password = '$input_password'";
$result = $con->query($sql);

if ($result->num_rows > 0) {

    $user = $result->fetch_assoc(); // Fetch the user's data
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['username'];
    $_SESSION['user_role'] = $user['position']; // Store the user's role in the session
    $_SESSION['first_name'] = $user['fname'];
    $_SESSION['last_name'] = $user['lname'];
    header("Location: innerpage.php"); // Redirect to the inner page
    exit(); 

} else {
   echo "
        <script>
        alert('Invalid username or password. Please try again.');
        
        </script>
    
    ";
}

    }






    
    // login end

    //registration start

    if (isset($_POST["u_fname"]) && isset($_POST["u_lname"]) && isset($_POST["u_username"]) && isset($_POST["u_password"]) && isset($_POST["role"])) {
        $unregistered_fname = $_POST["u_fname"];
        $unregistered_lname = $_POST["u_lname"];        
        $unregistered_username = $_POST["u_username"];
        $unregistered_password = $_POST["u_password"];
        $unregistered_role = $_POST["role"];
   

    } else {
        $unregistered_fname = '';
        $unregistered_lname = '';        
        $unregistered_username = '';
        $unregistered_password = '';
        $unregistered_role = '';


    }

  



$stmt = $con->prepare("INSERT INTO user (fname, lname, username,password, position) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $unregistered_fname, $unregistered_lname, $unregistered_username, $unregistered_password, $unregistered_role);  
$stmt->execute();
$stmt->close();


    //registration end


    ?>



<h1><a href="./innerpage.php">click here to login without session"></a></h1>




<!--registration starts-->
<div Id="modal-container">
    <div class="modal-content">
<form action="" method="POST" class = "register-form">
        <label for="first-name">First Name:</label>
        <input type="text" id="first-name" name="u_fname" placeholder="Enter your first name" required><br><br>

        <label for="last-name">Last Name:</label>
        <input type="text" id="last-name" name="u_lname" placeholder="Enter your last name" required><br><br>

        <label for="username">Username:</label>
        <input type="text" name="u_username" placeholder="Enter your username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="u_password" required><br><br>

        <label for="role">Role:</label> 
        <select id="role" name="role" required>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select><br><br>

        <button class = "form-button"type="submit">Submit</button>
    </form>
    </div>
    <button Id="close-modal">close</button>

</div>
<!--registration ends-->






</body>


<footer> 
    <script src="javascript/scriptsample.js"></script>
</footer>