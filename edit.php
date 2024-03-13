<?php
include "dbconn.php";
 global $conn;
 if(isset($_GET['id'])){
 $id= $_GET['id'];
 $store= "SELECT * FROM users WHERE id=$id";
 $execute= $conn->query($store);
$fetch= $execute->fetchAll(PDO::FETCH_ASSOC);
//  print_r($fetch);       
$fname= $fetch[0]['firstname'];
$lname= $fetch[0]['lastname'];
$mob= $fetch[0]['phone'];
$email= $fetch[0]['email'];
$pass= $fetch[0]['password'];
$cpass= $fetch[0]['confirm'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post" id="edit" >
    <label>First name</label>
    <input type="text" name="fname" placeholder="first name" value= "<?php echo $fname ?>"/><br><br>
    <label>Last name</label>
    <input type="text" name="lname" placeholder="last name" value= "<?php echo $lname ?>"/><br><br>
    <label>Phone no.</label>
    <input type="text" name="phn" placeholder= "enter mobile no." value= "<?php echo $mob ?>"/><br><br>
    <label>Email</label>
    <input type="text" name="email" placeholder= "enter email" value= "<?php echo $email ?>"/><br><br>
    <label>Password</label> 
    <input type="password" name="password" placeholder= "enter password" id="pass" value= "<?php echo $pass ?>"/><br><br>
    <label>Confirm Password</label>
    <input type="password" name="confirm" placeholder= "confirm password" value= "<?php echo $cpass ?>"/><br><br>
    <input type="submit" name="edit" value="edit"/><br><br>
</form> 
</body>
<script>
    $(document).ready(function(){
            $("#myform").validate({
    rules: {
        fname: {    
            required: true,
            lettersonly: true,
            minlength: 4
        },
        lname: {
            required: true,
            lettersonly: true,
            minlength: 4
        },
        phn: {
            required: true,
            digits: true
        },
        email: {
            required: true,
            email: true
        },
        password:{
            required: true,
            minlength: 8
        },
        confirm:{
            required: true,
            equalTo: "#pass"
        }  
    },  
        messages: {
                fname: {
                    required: "First name is required",
                    minlength: "enter atleast 4 characters",
                    lettersonly: "first name should be letters only"
                },
                lname:{
                    required: "Last name is required",
                    minlength: "enter atleast 3 characters",
                    lettersonly: "last name should be letters only"
                },
                phn:{
                    required: "Phone number is required",
                    digits: "enter valid mobile number"
                },
                email: {
                    required: "email is required",
                    email: "enter valid email"
                },
                password:{
                    required: "password is required",
                    minlength: "password should be atleast 8 characters"
                },
                confirm:{
                    required: "Please confirm your password",
                    equalTo: "password doesn't match"
                }    
            }
        });
    })
    </script>
</html>
<?php
if(isset($_POST['edit'])){
    try{
    $id= $_GET['id'];
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $email= $_POST['email'];
    $phone= $_POST['phn'];
    $pass= $_POST['password'];
    $cpass= $_POST['confirm'];

    $queryy = "UPDATE `users` SET `firstname`='$fname', `lastname`='$lname', `email`='$email', `phone`='$phone', `password`='$pass', `confirm`='$cpass' WHERE id=$id"; 
    $exec= $conn->query($queryy);

    if($exec){
        header('location:controller.php');
    }else{
        echo "try again";
    }}catch(PDOException $e){
        echo "error is ". $e->getMessage();
    }
}
?>