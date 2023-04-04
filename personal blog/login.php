<?php
session_start();
$emailErr = $passwordErr = $emailPassError=""; 
$email=$password="";


if(isset($_POST['submit'])){

    $email = $_POST["email"];
    $password = $_POST["password"];

    if($email=="abc@gmail.com" && $password=="123"){
        $_SESSION['email'] = $email;
       
        header("Location:welcome.php");
        
        exit();
        
       
       
    }else{
        $emailPassError= "Email or Password not correct";
    }

    if(empty($_POST['email'])){
        $emailErr = "Type your user email";
    }else {
        $email = $_POST['email'];
    }

    if(empty($_POST['password'])){
        $passwordErr = "Type your password";
    }else{
        $password = $_POST['password'];
    }
    
}

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <h1>Please login with email and password</h1>
    <form method="post" action="">

    <input type="text" name="email" placeholder="email"> 
    <span class="error">* <?php echo $emailErr; ?> </span>  
    <br><br>   
    
    <input type="password" name="password" placeholder="password">  
    <span class="error">* <?php echo $passwordErr; ?> </span>   
    <br><br> 

    <span class="error"><?php echo $emailPassError; ?> </span>  
    <br><br>   
    
    <button type="submit" name="submit">Submit</button>
  
    </form>
</body>
</html>