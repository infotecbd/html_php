<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    
    
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

  

</head>
<body>
<?php  

session_start();
// define variables to empty values  
$nameErr =$emailErr = $subErr= "";  
$name = $email = $subject =  $message= "";  

 
//Input fields validation  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  


    if (empty($_POST["name"])) {  
         $nameErr = "Enter Name is required";  
    } else {  
        $_SESSION["name"]= $name;
        $name = input_data($_POST["name"]);  
            // check if name only contains letters and whitespace      
    }  

 
    //Email Validation   
    if (empty($_POST["email"])) {  
            $emailErr = "Email is required";  
    } else {  
            $email = input_data($_POST["email"]);  
            // check that the e-mail address is well-formed  
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "Invalid email format";  
            }  
     }  


     if (empty($_POST["message"])) {  
        $nameErr = "Enter Name is required";  
   } else {  
       $_SESSION["message"]= $message;
       $message = input_data($_POST["message"]);  
           // check if name only contains letters and whitespace      
   }

}
  
function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
} 
?>  

<div class="container">
       <!-- Example row of columns -->
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
    <h3 class="text-muted"><a href="index.php" class="navbar-brand"> OSTAD</a></h3>
      
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="blog.php" class="nav-item nav-link">Blog</a>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
             
            </div>
            <div class="navbar-nav ms-auto">
               
            </div>
        </div>
    </div>
</nav>
    

      <!-- Example row of columns -->
      <div class="row">
      <div class="jumbotron">
        <h3>Contact Us</h3>
      </div>



              <!-- contact form -->
              <div class="col-md-6 wow animated fadeInRight" data-wow-delay=".2s">
                  <form class="shake" role="form" method="post" id="contactForm" name="contact-form" data-toggle="validator">
                      <!-- Name -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="name">Name</label>
                        <input class="form-control" id="name" type="text" name="name" required data-error="Please enter your name">
                        <div class="help-block with-errors">
                        <span class="error">* <?php echo $nameErr; ?> </span>  
    <br><br>  
                        </div>
                      </div>
                      <!-- email -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="email">Email</label>
                        <input class="form-control" id="email" type="email" name="email" required data-error="Please enter your Email">
                        <div class="help-block with-errors">
                        <span class="error">* <?php echo $emailErr; ?> </span>  
                        </div>
                      </div>
                      <!-- Subject -->
                      <div class="form-group label-floating">
                        <label class="control-label">Subject</label>
                        <input class="form-control" id="msg_subject" type="text" name="subject" required data-error="Please enter your message subject">
                        <div class="help-block with-errors"></div>
                      </div>
                      <!-- Message -->
                      <div class="form-group label-floating">
                          <label for="message" class="control-label">Message</label>
                          <textarea class="form-control" rows="3" id="message" name="message" required data-error="Write your message"></textarea>
                          <div class="help-block with-errors"></div>
                      </div>
                      <!-- Form Submit -->
                      <div class="form-submit mt-5">
                         
                          <input type="submit" name="submit" value="Submit"> 
                          <div id="msgSubmit" class="h3 text-center hidden"></div>
                          <div class="clearfix"></div>
                      </div>
                  </form>

                  <?php  
    if(isset($_POST['submit'])) {  
    if($nameErr == ""  && $emailErr == "" ) {  
        echo "<h3 color = #FF0001> <b>Messege sent succefully, Your message is</b> </h3>";  
        echo "<h2>Your Input:</h2>";  
        echo "Name: " .$name;  
        echo "<br>";  
        echo "Email: " .$email;  
        echo "<br>"; 
        echo "Your Message: " .$message;  
        echo "<br>";  
       
    } else {  
        echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";  
    }  
    }  
?>  
              </div>
          </div>
      </div>
    </section>


</body>
</html>