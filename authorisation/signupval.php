<?php
 require __DIR__."/../config/database.php";
  
    // Check if the form is submitted
    if($_SERVER['REQUEST_METHOD'] !== "POST"){
        redirect(path: "../signup&signin/Studsignup.php", query:["error" => "invalidrequest"]);
    } 
    else{

         // Check if fields are empty

         $fullname = $_POST["fullname"];
         $username = $_POST["username"];
         $batch = $_POST["batch"];
         $gender = $_POST["gender"];
         $email =$_POST["email"];
         $password = $_POST["password"];

        if(empty($fullname) || empty($username) || empty($batch) || empty($gender) || empty($email) || empty($password)) {
        $error = [
            'error' => "emptyvalues"
        ];
        
        redirect('../signup&signin/Studsignup.php', $error);
        }
    
        else{
        
        // Sanitize and escape user input
       

        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $isAdmin = 0;

        // Prepare and execute the query
        $query = "INSERT INTO users (fullname, username, batch, gender, email, password) VALUES ('$fullname', '$username', '$batch', '$gender', '$email', '$hashedPassword')";
        $query1 = "INSERT INTO users (fullname, batch, gender) VALUES ('$fullname', '$batch', '$gender')";
        $result = mysqli_query($connection, $query);

        if($result) {
            $message = [
                'success' => "usercreated"
            ];
            header('Location: ../signup&signin/Signin.php?success=1');
            exit();

           // redirect(baseUrl("../signup&signin/Signin.php", $message));
        
        }else {

            $error = [
                'error' => "usernotcreated"
            ];
            
           // redirect(baseUrl("../signup&signin/Studsignup.php", $error));
        }
    }
    }
?>
