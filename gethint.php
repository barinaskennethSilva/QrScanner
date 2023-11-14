<meta charset="utf-8">



  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
// Array with names
$a[] = "001";
$a[] = "002";
$a[] = "003";
$a[] = "004";
$a[] = "005";
$a[] = "006";
$a[] = "007";
$a[] = "008";
$a[] = "009";
$a[] = "010";
$a[] = "011";
$a[] = "012";
$a[] = "013";
$a[] = "014";
$a[] = "015";
$a[] = "016";
$a[] = "017";
$a[] = "018";
$a[] = "019";
$a[] = "020";
$a[] = "021";
$a[] = "022";
$a[] = "023";
$a[] = "024";
$a[] = "025";
$a[] = "026";
$a[] = "027";
$a[] = "028";
$a[] = "029";
$a[] = "030";

// get the q parameter from URL
$q = $_REQUEST["q"];

//$hint = "";
$conn = mysqli_connect('localhost','root','','Payroll_sys');
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// lookup all hints from array if $q is different from ""
if ($q !="") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= ", $name";
      }
    }
  }
$result=mysqli_query($conn,"SELECT * FROM Time_Sheet WHERE Employee_id='$q'");
$rowcount=mysqli_num_rows($result);
if($rowcount==0){
$ret=mysqli_query($conn,"INSERT INTO `Time_Sheet`(name,time_In) VALUES ('$q',NOW())");
if($ret)
{
echo '<div class="alert alert-success"><strong>Success!</strong> employee successfully registered</div>'+date('l jS \of F Y h:i:s A');
?>
<?php }
else
{

}
}else{
//echo 'employee is already registered';  
echo '<div class="alert alert-success"><strong>Success!</strong> employee successfully registered</div>';
echo date('l jS \of F Y h:i:s A');

  }

}

// Output "no suggestion" if no hint was found or output correct values
//echo $hint === "" ? "no suggestion" : $hint;
?>