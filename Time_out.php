<?php

////////////////////////////////////////////

//c
else if (mysqli_query($conn,"SELECT * FROM `Time_Sheet` WHERE Employee_Position = 'cashier' ")) {
$stmt = $conn->prepare("INSERT INTO Att_Record (Employee_id, Full_Name, Employee_Position,Date,time_In,time_Out, Amount_Rate) VALUES (?, ?, ?, ?, ?, ?, ?)");

if ($stmt === false) {
        die("Error in SQL statement: " . $conn->error);
    }

    // Bind parameters
    if ($stmt->bind_param("sssssss", $Employee_id, $Full_Name,$Employee_Position, $date,$time,$time_out,$cashier)) {
        if ($stmt->execute()) {
            echo "Data inserted successfully.";
        } else {
            echo "Error executing the statement: " . $stmt->error;
        }
    } 
}
}
  if(mysqli_num_rows($data) > 0){

include("db.php");
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
  if ($Employee_Position === "cashier") {
$sql = "UPDATE  Att_Record SET time_Out = '$time', Amount_Rate = '$cashier' WHERE id='$id'";
  }
}}
    
  }
?>