<?php
//scan only employee id
include("db.php");

  
if (isset($_POST["save"])) {
$employee_id = $_POST["Employee_id"];
$sql = "SELECT * FROM `Time_Sheet` ";
$result = mysqli_query($conn,$sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $Employee_id = $row['Employee_id'];

  $query = "SELECT * FROM `Time_Sheet` WHERE Employee_id =  '$employee_id'";
  $result = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_assoc($result)) {
 $Employee_id = $row['Employee_id']; 
 $Full_Name = $row['Full_Name'];
 $Employee_Position = $row['Employee_Position']; 
 $position = $_POST['position'];
 $date = date("Y/m/d");
 date_default_timezone_set('Asia/Manila');
  $time = date("g:ia");
  $time_out = "0000";
  $manager = "750";
$cashier = "500";
$chief = "650";
$seller = "450";  
  $data = " <tr>
  <td>$Employee_id</td>  <td>$Full_Name</td><td><input type='text' value='$Employee_Position' name='position'/></td><td>$date</td><td>$time</td><td></td></tr> ";
  echo $data;
  
  }

}
}
else{
  echo"Invalid Data";
}

////////////////////////////////////////////
$sql = "SELECT * FROM `Att_Record`";
$data = mysqli_query($conn,$sql);
  if(mysqli_num_rows($data) == 0){
if (mysqli_query($conn,"SELECT * FROM `Time_Sheet` WHERE Employee_Position = 'manager' ")) {
$stmt = $conn->prepare("INSERT INTO Att_Record (Employee_id, Full_Name, Employee_Position,Date,time_In,time_Out, Amount_Rate) VALUES (?, ?, ?, ?, ?, ?, ?)");

if ($stmt === false) {
        die("Error in SQL statement: " . $conn->error);
    }

    // Bind parameters
    if ($stmt->bind_param("sssssss", $Employee_id, $Full_Name,$Employee_Position, $date,$time,$time_out,$manager)) {
        if ($stmt->execute()) {
            echo "Data inserted successfully.";
        } else {
            echo "Error executing the statement: " . $stmt->error;
        }
    } 
}


////////////////////////////////////////////
$sql = "SELECT * FROM `Att_Record`";
$data = mysqli_query($conn,$sql);
if(mysqli_num_rows($data) > 0){
$manager = "750";
$cashier = "500";
$chief = "650";
$seller = "450";
date_default_timezone_set('Asia/Manila');
  $time = date("g:ia");
$sql = "SELECT * FROM `Att_Record`";
$result = mysqli_query($conn,$sql);
if ($result) {
while($row = mysqli_fetch_assoc($result)){
$id = $row['id'];
 $employee_id = $row['Employee_id'];
  $FirstName = $row['Full_Name'];
  $Employee_Position = $row['Employee_Position'];
  if ($Employee_Position === "manager") {
$sql = "UPDATE  Att_Record SET time_Out = '$time', Amount_Rate = '$manager' WHERE id='$id'";

  $data = " <tr>
  <td>$Employee_id</td>  <td>$Full_Name</td><td><input type='text' value='$Employee_Position' name='position'/></td><td>$date</td><td>$time</td><td></td></tr> ";
  echo $data;
  }
 else if ($Employee_Position === "cashier") {
$sql = "UPDATE  Att_Record SET time_Out = '$time', Amount_Rate = '$cashier' WHERE id='$id'";
  }
}}
}
?>