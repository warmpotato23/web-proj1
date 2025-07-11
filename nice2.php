<!DOCTYPE HTML>

<header>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</header>

<body>
<a href="nice.php">page 1</a>

<h1>file access through php</h1>



<?php


echo"to openn a file in php use the fopen() function";

 $filepath="./playground/sample/open.txt";
 $filepath2="./playground/sample/open2.txt";



 $write = fopen ($filepath,"w") or die("cant open" );
 $newtxt = "borat veawdwary big";
 fwrite ($write, $newtxt); // it overwris the content of the file
 fclose($write);
 
 // fwrite($write, "this is the new content of the file"); // it overwrites the content of the file 
 
 






     $read = fopen($filepath, "r") or die("cant open");
        echo fread($read, filesize($filepath)) . "<br>";
   
       //read() read the whole file
      //fgets() read a single line on thje file
       //eof () check if the end of the file is reached
    //getc() read a single character from the file
        
      
        fclose($read); 



// this add the specified content to the file
$appeand = fopen($filepath, "a") or die("cant open");
$newtxta = "this is the new content of the file";
fwrite($appeand, $newtxta);
fclose($appeand);


$read = fopen($filepath, "r") or die("cant open");
echo fread($read, filesize($filepath)) . "<br>";
fclose($read); 




// this creates a file if it doesnt exist
//$create = fopen($filepath2, "x") or die ("already exist!");


"<br>";

/* this is how to create a folder in */



$testfolder = "titefodler";
$folderpath = "./titefodler/sampletite";

mkdir($folderpath, 0755, true); // the "0755" is for permisions  and the true is for recursive if folders are being created inside of a folder
// like $folderpath = "./titefodler/sampletite";



"<br>";

?>


<h1>php sessions</h1>


<!-- sessions is like an id given to the user for the website to remember their detials -->




<p>session start</p>
<?PHP
SESSION_START(); // needs to be on the top of the website to make info availabe all throught
// SESSION_UNSET(); // Removes a specific session variable, but session remains.
// SESSION_DESTROY();// Destroys all session data, but session ID may still exist.

?>

<?php print_r ($_SESSION);?>
<?php
$_SESSION['name'] = 'angelo';
$_SESSION['status'] = 'online';?>
<p>session is set <a href="./nice3.php">click here to go to page 3 and check session</a></P>








<?php
// cookies is used to store data in the browser unlike session that stores in the database


$cookie_name = "user";
$cookie_value = "borat";
$cookie_time = time() + (86400 *30 );  // expiration
$cookie_domain = "/"; // use single slash for the cookie to be available throughout whole site can be set to specific folder only
setcookie($cookie_name, $cookie_value, $cookie_time, $cookie_domain);

print_r($_COOKIE);
echo "<p>" . $_COOKIE[$cookie_name] . "</p>"


/* to delete a cookie 

setcookie ("user", time() - 3600, '/');  // this manually expires the cookie 
print_r($_COOKIE);


*/

?>


<?php
// custom function



function display_stuff($displayed){



echo  $displayed ; 


}


function multiply($num1, $num2){

return $num1 * $num2;


}





$name_me = "angelo";


$product1 = 4;
$product2 = 3;


echo multiply($product1 , $product2);



print_r($_SESSION);


display_stuff($name_me);








// scope!!!


/*In PHP, scope determines where a variable can be accessed. 
Variables declared inside a function have local scope and can't be used outside, 
while those declared outside have global scope but aren't accessible inside functions unless explicitly brought in using the global keyword or $GLOBALS array.
 Static variables inside functions retain their values across multiple calls. Function parameters act as local variables within functions. In object-oriented PHP, 
 class properties have scope controlled 
by access modifiers: public (accessible anywhere), protected (accessible within the class and subclasses), and private (accessible only within the class).*/

// scope means if the variable is declared outside the custom function it is global scope, if declared inside the function is local scope.


$gv = "global";


function scopesamp(){


global $gv; // the word global tells php that there is a global variable named gv to authorize the use of it inside the function
global $local; // this local variable can be access by other outisde the function if declared as global, note that the global should be declared firstr before declaring it with value
$local = "local";
echo $local;


}
 

scopesamp();
echo $gv;
echo $local;


?>







<?php

/// constants - available all scope, regardless if global or local scope





// to declare a cosntants 


define('NAME','JOHN');    // define ("name of the constant","value of the constant")

define('fname','michael'); // the true means that to reference a constant it doesnt need to havbe the same case
// constant are CASE SENSITIVE!

// to echo a constant it doesnt need a dollar sign $ just type the constant
echo NAME;
echo fname;


function ech (){

    echo NAME;

}

ech();


error_reporting(E_ALL);
ini_set('display_errors', 1);

// curl
$ch  = curl_init(); // this is a constant INITIALIZE FIRST

curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/'); // URL TO SEND REQQUEST TO


curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


curl_setopt($ch, CURLOPT_HEADER, 0);// WHETHER TO INCLUDE THE HEADER IN THE OUTPUT, 0- FALSE 1 - TRUE





$output = curl_exec($ch);



if ($output=== FALSE){
    echo "curl error: "  . curl_error($ch);
}


curl_close($ch);


print_r($output);

















?>


















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>


<footer>

</footer>