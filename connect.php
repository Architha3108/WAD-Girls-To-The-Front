<?php
  
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  

  //Database connection
  $conn = new mysqli('localhost','root','','myngoform');

  //Check connection
  if($conn->connect_error){
      die('Connection Failed : '.$conn->connect_error);
  }else{
      $stmt = $conn->prepare("Insert into registration(name,gender,email,subject,message)
        values(?,?,?,?,?)");
      $stmt->bind_param("sssss",$name,$gender,$email,$subject,$message);
      $stmt->execute();
      echo "Submission successful...";
      $stmt->close();
      $conn->close();
  }
?>