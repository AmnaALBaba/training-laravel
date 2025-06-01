<?php
require_once('config.php');

$email = $password = '';
$errors = [];
$success = false;

if(isset($_POST['email'])) {
    $email = check_input($_POST['email']);
    $password = check_input($_POST['password']);
    
    if(empty($email)) {
        $errors[] = "Email field is required";
    }
    if(empty($password)) {
        $errors[] = "Password field is required";
    }
    
    if(empty($errors)) {
        try {
            $conn = new PDO($dsn, $user, $db_password, $options); // استخدام متغير مختلف لكلمة مرور DB
            
            // تشفير كلمة المرور قبل تخزينها
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $new_user = [
                'email' => $email,
                'password' => $hashed_password
            ];
            
            $new_user_key_string = implode(',', array_keys($new_user));
            $new_user_key_placeholders = ':' . implode(',:', array_keys($new_user));
            
            $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)",
                          'users', 
                          $new_user_key_string, 
                          $new_user_key_placeholders);
                          
            $insert = $conn->prepare($sql);
            if($insert->execute($new_user)) {
                $success = true;
                // إعادة تعيين القيم بعد التسجيل الناجح
                $email = $password = '';
            }
        } catch(PDOException $e) {
            $errors[] = "Database error: " . $e->getMessage();
        }
    }
}

function check_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        * {
            box-sizing: border-box;
           
        }
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .content {
            background-color: white;
            padding: 30px;
            width: 100%;
            max-width: 500px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        .input-field {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        .input-field:focus {
            outline: none;
            border-color:rgb(47, 215, 221);
        }
        button {
            width: 100%;
            padding: 12px;
            background-color:rgb(7, 140, 181);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.5s ease;

        }
        button:hover {
            background-color:white;
            color:rgb(7, 140, 181);
            border : 1px solid rgb(7, 140, 181);


        }
        .required {
            color: red;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: center;
        }
        .errors {
            background-color: #f8d7da;
            color :red;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .errors ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <?php if($success): ?>
                <div class="success">
                    <?="Login Successful!."?>
                </div>
            <?php endif; ?>
            
            <?php if(!empty($errors)): ?>
                <div class="errors">
                    <ul>
                        <?php foreach($errors as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            
            <h1>Login</h1></h1>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="email">Email <span class="required">*</span></label>
                    <input type="email" class="input-field" id="email" name="email" 
                           placeholder="Enter your email" 
                           value="<?=$email ?>">
                </div>
                
                <div class="form-group">
                    <label for="password">Password <span class="required">*</span></label>
                    <input type="password" class="input-field" id="password" name="password" 
                           placeholder="Enter your password" 
                           >
                </div>
                
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>