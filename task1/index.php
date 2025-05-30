<?php
require_once('config.php');
// var_dump($_SERVER);

// if($_SERVER['REQUEST_METHOD']=='POST'){
//     echo 'send message' ; 
// }

$email = $password = '';

if(isset($_POST['email'])){
    $errors = [];
    // var_dump($_POST);
    // var_dump($errors);
    
    $email  = check_input($_POST['email']);
    $password  = check_input($_POST['password']);
    
 
    if(empty($email)){
         $errors[] = "Email field is required" ; 
    }
    if(empty($password)){
         $errors[] = "Password field is required" ; 
    }
    $new_user = [
        'email'=>$email ,
        'password'=>$password ,

    ];
    $new_user_key_string = implode(',' , array_keys($new_user));
    $new_user_key_placeholders = ':' . implode(', : ' , array_keys($new_user));



    $conn = new PDO($dsn , $user , $password,$options);
    $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)",'users' , $new_user_key_string , $new_user_key_placeholders);
    $insert = $conn->prepare($sql);
    $insert->execute($new_user);
 
}
function check_input($data){
    return htmlspecialchars(stripslashes(trim($data)));
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        *{
            box-sizing: border-box;
        }
        body {
            margin : 0;
            padding : 0 ; 
        }
        .container {
            background-color : #eee;
            display:flex;
            justify-content: center;
            align-items: start ; 
            height: 100vh;
        }
        .content{
            background-color :white;
            padding : 30px;
            width:30%;
            margin-top:50px;
            border:1px solid #ccc;
            border-radius : 10px;
        }
        form div{
            margin-bottom:10px;
        }
        form .input-field , 
        form button{
            display : block;
            padding :5px 10px ;
            width:100%;
            border-radius:5px;
            border : 1px solid #aaa;
        }
        form button{
            border : 0;
            background-color:#00b2c5;
            color : #fff;
            cursor: pointer;
      
        }
        form span {
            color : red;
        }

        .success{
            background-color : #def0cc;
            padding : 10px;
            border-radius : 5px ; 
            color : #167216;
        }
        .errors{
            background-color : #ffe2e2;
            color : #f00;
            padding : 10px;
            border-radius : 5px ; 
        }
        .errors ul {
         margin : 0 ;  
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <?php if(isset($errors) && count($errors)==0){?>
                <div class = "success">
                    Login Successfully
                </div>
            <?php }?>
            <?php if(isset($errors)&&count($errors)!=0){?>

                <div class = "errors">
                <ul>
                    <?php foreach($errors as $error){?>
                        <li><?= $error?></li>
                    <?php }?>
                </ul>

                </div>
            <?php }?>
            <h1>Login</h1>

            <form action="" method ="POST">
    
            <div >
            <label for="email">Email <span>*</span></label>
            <input class ="input-field" type="text" placeholder="Enter an email:" name ="email" id ="email" value = "<?=$email?>">
            </div>
            <div >
            <label for="password">Password <span>*</span></label>
            <input class ="input-field" type="password" placeholder="Enter an password:" name ="password" id ="password" value = "<?=$password?>">
            </div>
      
            <button type = "send">send</button>
            </form>

            </div>

            </div>

</body>
</html>