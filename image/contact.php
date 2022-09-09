<?php

$servername = "localhost";
$username ="root";
$password ="root";
$dbname = "contact form";

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error){
    die("connection failed".$conn->connect_error);
}
if(isset($_POST["submit"])){

    $name=$_POST["Name"];
    $email=$_POST["Email"];
    $message=$_POST["Message"];

    $sql=("INSERT INTO contactinfo(`Name`,`Email`,`Message`) values(?,?,?)");

    $stmt=$conn->prepare($sql);
    $stmt->bind_param("sss",$name,$email,$message);
    $result=$stmt->execute();

    if($result){
        $alert="<script>alert('Message sent succesfully')</script>";
        echo $alert;
        
        }
    else{
        $alert="<script>alert('Message sent failed')</script>";
        echo $alert;
    }    
    $stmt->close();
    $conn->close();
}
else{
    $alert="<script>alert('all fields are required')</script>";
    echo $alert;
}
die();

?>