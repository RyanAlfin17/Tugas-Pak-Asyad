<?php 
session_start();

if(isset($_SESSION['login'])){
  header('Location:index.php');
  exit;
}

include "crud.php";

  if(isset($_POST["login"])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($kon, "SELECT * FROM user WHERE email = '$email' AND password = '$password'");

    if(mysqli_num_rows($result) == 0){
      echo "login gagal";
    }else{
      $_SESSION['login'] = true;

      header("Location:index.php");
    }
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Montserrat', sans-serif;
    }
    
    body {
      background-color: #f2f2f2;
    }           
    
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    
    .login {
      background-color: #ffffff;
      border-radius: 20px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      padding: 40px;
      max-width: 400px;
      width: 100%;
      text-align: center;
    }
    
    .login h1 {
      font-size: 32px;
      font-weight: 600;
      margin-bottom: 30px;
    }
    
    .login .forms {
      margin-bottom: 30px;
    }
    
    .login label {
      display: block;
      margin-bottom: 10px;
      font-weight: 600;
    }
    
    .login input[type="email"],
    .login input[type="password"] {
      width: 100%;
      padding: 12px;
      border-radius: 3px;
      border: 1px solid #e1e1e1;
      margin-bottom: 20px;
      font-size: 16px;
      transition: all 0.3s ease;
    } 
    
    .login input[type="email"]:focus,
    .login input[type="password"]:focus {
      border: 1px solid #50b6bb;
      outline: none;
    }
    
    .login button[type="submit"] {
      background-color: #000000;
      color: #ffffff;
      border: none;
      border-radius: 10px;
      padding: 12px 20px;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    
    .login button[type="submit"]:hover {
      background-color: #4aa4a9;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="login">
      <form action="" method="post">
        <h1>Login</h1>
        <div class="forms">
          <label for="email">Email</label>
          <input type="email" name="email" id="email">
          <label for="password">Password</label>
          <input type="password" name="password" id="password">
        </div>
        <button type="submit" name="login">Login</button>
      </form>
    </div>
  </div>
</body>
</html>
