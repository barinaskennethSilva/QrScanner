<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Monitoring Attendance </title>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="ht.js"></script>
  </head>
  <body>
    <style>
    .scanner{
   width:40%;
      height: 300px;
      border:1px solid #111;
      margin: 10px 10px;
    }
    </style>
    <nav class="navbar navbar-danger bg-danger">
<h4 class="ms-2 text-center fw-bold text-white">Daily Time Attendance </h4>
    </nav>
    <div class="">
      
   <div class="d-flex">
  <div class="scanner" id="reader">
  </div>  
  <audio id="myAudio1">
 <source src="success.mp3" type="audio/ogg">
</audio>
<audio id="myAudio2">
  <source src="failes.mp3" type="audio/ogg">
</audio>
  <div class="form mt-2 ms-3">

    <form>
   Employee ID:<input type="text" id="Employee_id" name="Employee_id" class="form-control">
</form>
  </div>
   </div>
  
   <table class="mt-3 table table-hover">

    <thead>

    <tr class="bg-danger text-white">
      <th scope="col">Employee Id</td>
      <th scope="col">Employee Name</td>
      <th scope="col">Position</td>
       <th scope="col">Date</td>
      <th scope="col">Time In</td>
       <th scope="col">Time Out</td>
       </tr>
</thead>
<tbody id="att_data">

</tbody>
  </table>
    
  </div>  
  

 <script>
 /*function fetchAndDisplayData(qrCodeMessage) {
    $('#Employee_id').val(qrCodeMessage);

    var EmployeeId01 = qrCodeMessage; 

    $.ajax({
        method: 'POST',
        url: 'filler.php',
        data: { save: "true", Employee_id: EmployeeId01 },
        success: function(response) {
            $("#att_data").html(response); 
        }
    });
    }*/
    
    
  
var lastScanTime = 0;
var timeoutDuration = 2000; // 2000 milliseconds (2 seconds)

function fetchAndDisplayData(qrCodeMessage) {
    var currentTime = new Date().getTime();

    if (currentTime - lastScanTime < timeoutDuration) {
        // Too soon for another scan, handle accordingly (e.g., show an alert)
        alert("Please wait before scanning again.");
        return;
    }

    // Update the last scan time
    lastScanTime = currentTime;

    // Rest of your existing code
    $('#Employee_id').val(qrCodeMessage);

    var EmployeeId01 = qrCodeMessage;

    $.ajax({
        method: 'POST',
        url: 'filler.php',
        data: { save: "true", Employee_id: EmployeeId01 },
        success: function (response) {
            $("#att_data").html(response);
        }
    });
}  
    
    
 //----------------------------------------
 var x = document.getElementById("myAudio1");

var x2 = document.getElementById("myAudio2");      

function showHint(str) {
  if (str.length == 0) {
    document.getElementById("Employee_id").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("Employee_id").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "filler.php?q=" + str, true);
    xmlhttp.send();
  }
}

function playAudio() { 
  x.play(); 
} 
 function onScanSuccess(qrCodeMessage) {

    document.getElementById("Employee_id").value = qrCodeMessage;
fetchAndDisplayData(qrCodeMessage);
    showHint(qrCodeMessage);
playAudio();

}
function onScanError(errorMessage) {
  //handle scan error
}
  var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess, onScanError); 
   </script> 
  
  </body>
</html>