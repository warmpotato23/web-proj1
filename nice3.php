<!DOCTYPE HTML>


<HEADER>

</HEADER>

<BODY>
<?php session_start();?>
<p><?php print_r($_SESSION)?></p>
<p>name: <?php echo $_SESSION["name"]?></p>
<p>status: <?php echo $_SESSION["status"]?></p>





<h1><a href="./nice2.php">click here to go back</a></h1>
<?php



print_r($_COOKIE);





// get file content


error_reporting(E_ALL);
ini_set('display_errors', 1);


$url = "https://www.google.com.ph";
$data = array(

'i' => "think",
"header" => "titefilec",
"is" => "awesome"
);


$options = array(
'http'=> array(
  ' header' => "application/x-www-form-urlencoded",
    'method' => 'POST',
    "content" => http_build_query($data),
),


);







// upload file


function upload(){


$tmp_name = $_FILES['file']['tmp_name'];
$target_dir = "upload/";
$target_file = $target_dir . $_FILES['file']['name'];
$max_file_size = 5000000;
$allowed_file_types = array('application/pdf');
$allowed_image_types = array('image/gif', 'image/jpeg', 'image/png');


$file_mime_type = mime_content_type($tmp_name);



if (! in_array ($file_mime_type, $allowed_file_types) && ! in_array ($file_mime_type, $allowed_image_types )){

return "this file type is not allowed";

}

if (file_exists($target_file)){
  return "file already exists";
}


if ($_FILES["file"] ['size'] > $max_file_size){
  return "too big";
}

if (move_uploaded_file($tmp_name, $target_file)){
    chmod($target_file, 0644);
    return "success";
} else {
  return "problem";

  }
}




if (!empty($_FILES['file'])){
  echo upload();
}

?>


<form action="" method="post" enctype="multipart/form-data">
  select image to upload:
  <input type="file" name="file">
  <input type="submit" value="upload">
  </form>
  








<br>


<h1><a href="./homepage.php">click me to go to homepage</a></h1>






<h1>interest calculator</h1>



<?php

$interest = 30;
$loan_amount = 4000;
$payout_no = 3; 
$total;
$deducted;
$pay_reduc;





$total  = (((($loan_amount / 1000) * $interest)));
$deducted = (((($loan_amount / 1000) * $interest)));


for ($i = 0; $i < $payout_no; $i++){


$pay_reduc = $total - ($deducted / $payout_no);


$pay_reduc = $pay_reduc + $pay_reduc;
$i++;

}




echo $pay_reduc . "<br>";
 





echo $total;



session_destroy();

















?>




</BODY>
<FOOTER>




</FOOTER>