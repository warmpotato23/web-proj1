<!DOCTYPE HTML>

<header>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</header>
<body>
    <h1>NICE</h1>



<?php

//operations
$num = 1; //declaring integer
$num2 = 2; //declaring integer  
$string1 = "tite"; //declaring string
$string2 = "big"; //declaring string


echo $string2 . $string1; //concatenation to combine 2 strings use "."
echo $num + $num2;
?>

<h1> index arrays</h1>
<?php
$samplIndexArray = array("Sophia", "Sam", "John", "Tim", "Tommy");  //declaring index array
echo $samplIndexArray[0]; //displaying the first element of the array   
print_r($samplIndexArray); //displaying the whole array

$array3 = array ( // declaring an array with key value pairs. array with specified keys
    "Sophia"/*<--- key*/ => "31", /*<--- value*/
    "tite" => "41",
    "John" => "39",
    "Tim" => "40",
    "Tommy" => "35"

);

echo $array3["tite"]; //displaying the value of the key Sophia




$number = 4;
$numnber2 = 1;

if ($number != 3 && $numnber2 != 1) {
    echo "The number is 3";
} else {
    echo "The number is not 3";

}

/*
if conditions operator
=== this checks if the value and the data type are the same
== equal to
!= not equal to
> greater than
< less than
>= greater than or equal to
<= less than or equal to
&& check if both conditions are true
|| check if one of the conditions is true
! check if the condition is false

*/



switch ($number){
    case 4: 
        echo "numberi s true";
        break;
    case 2: 
        echo "tite";
        break;
    default:
        echo "no idea";
        break;


}

?>

<br>

<?php
// loops
for ($i = 0 ; $i < 10 ; $i++){

    echo "this is the number of times loop has run" . $i;
}

$arrayloop = array("tite", "big", "small");

foreach ($arrayloop as $key => $value){
    echo "key $key: value $value <br>";
}

print_r($arrayloop);



$i=0;
while ($arrayloop[$i]){

echo$arrayloop[$i] . "</br>";

$i++;}

?>




</br>

<h1>post and get</h1>


<form method="GET" action ="">
    <label>enter search term</label>
    <input type = "search" name="s" value="<?php echo $_GET["s"]?>">
</form>




<?php // post and get


// get is used to get data from the url like search terms users used in the url
// post is used to send data to the server


print_r($_GET);

if ( !empty($_GET["s"])){
echo "your search term is " . $_GET["s"];
}






?>






<h1>enter post value here</h1>

<form method="post" action="" class="form-group">
    <label>enter post search here</label>
    <input type="saerch" name="tite" value ="<?php echo $_POST["tite"]?>">
</form>






<?php

print_r($_POST["tite"]);
if (isset($_POSTP["tite"])){

echo "your search term is " . $_POST["tite"];

}


?>

<h1>send email</h1>











<form method="post" action="nice.php">
    <label>enter your name</label>
    <input type="text" name="name">
    <label>enter reciever email</label>
    <input type="email" name="email">
    <label>enter your message</label>
    <textarea name="message"></textarea>
    <button type="submit" name="send"value="send">submit</button>
</form>

<?php // email to be backed up


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure PHPMailer is installed
if (!empty ($_POST["email"]) && !empty($_POST["name"]) && !empty($_POST["message"])){

    $mail = new PHPMailer(true);


try {
    // Enable SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Gmail SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'michaelangelobillones69@gmail.com'; // Gmail address
    $mail->Password = 'bcaa apym wlni xngh'; // App Password 
    
    // **Enable STARTTLS to fix the 530-5.7.0 error**
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Email settings
    $mail->setFrom('michaelangelobillones69@gmail.com', $_POST["name"]);
    $mail->addAddress($_POST["email"]);// Recipient
    $mail->Subject = 'test email via Gmail SMTP with STARTTLS';
    $mail->Body = $_POST["message"];

    if (isset($_POST["send"]) && $_POST["send"] == "send") {
    $mail->send();
    echo 'Email sent successfully!';}
} catch (Exception $e) {
    echo "Mail error: {$mail->ErrorInfo}";
}
}
?>



<h1>these are the operators for php</h1>




<?php

$number1 = 10;
$number2 = 20;
$coa = "angelo";



echo "adition " .( $number1 + $number2) . "<br>";
echo "subtraction " . ($number1 - $number2) . "<br>";
echo "multiplaication " . ($number1 * $number2) . "<br>";
echo "division " .( $number1 / $number2) . "<br>";
echo "modulus " .  ($number1 % $number2) . "<br>";
echo "less than operator " . ($number1 < $number2) . "<br>";
echo "greater than " . ($number1 > $number2) . "<br>";
echo "less than or equal to " . ($number1 <= $number2) . "<br>";
echo "greater than or euqal to " . ($number1 >= $number2) . "<br>";
echo "euqal to " . ($number1 == $number2) . "<br>";
echo "not equal to " . ($number1 != $number2) . "<br>";
echo "space ship operator " . ($number2 <=> $number1) . "<br>";  // returns 1 if the comparing numbner is greater than, returs 0 if the number is equal, returs -1 if the number is less than
echo "null coalescing operator " . $coa ?? "guest"; // this check if theres is a variable named "coa" if there is it returs its value if not it returs a default which is the value declaredd after the ?? 
/*
logical operators for conditions

&& and operators check if 2 comparisons are true then returns true
|| or operator returs true if at least one condition is true
! not operator returns true if the condition is false
=== checks if the value and the data type are the same
p*/ 



/*
best use of the coalescing operator is this


$name = $_pos["name"] ?? "guest"; // this check if the user has a name if not it returs the "guest"


 */
;
?>




<h1> go to page 2</h1>


<a href="./nice2.php">page 2</a>



















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<foooter>
   
</footer>