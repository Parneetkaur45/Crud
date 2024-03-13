<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
</head>
<body>
    <form action="" method="post" id="myform" >
    <label>First name</label>
    <input type="text" name="fname" placeholder="first name"/><br><br>
    <label>Last name</label>
    <input type="text" name="lname" placeholder="last name"/><br><br>
    <label>Phone no.</label>
    <input type="text" name="phn" placeholder= "enter mobile no." /><br><br>
    <label>Email</label>
    <input type="text" name="email" placeholder= "enter email" /><br><br>
    <label>Password</label>
    <input type="password" name="password" placeholder= "enter password" id="pass"/><br><br>
    <label>Confirm Password</label>
    <input type="password" name="confirm" placeholder= "confirm password" /><br><br>
    <input type="submit" name="submit" value="submit"/><br><br>
    </form>
    
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
</body>
</html>