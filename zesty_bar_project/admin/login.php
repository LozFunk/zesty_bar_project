<head>
<link rel="stylesheet" href="../css/admin_page.css">
</head>


<?php
session_start();
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD']==="POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $db->prepare('SELECT * FROM admin_users WHERE username = :username');
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch();

    if($user && password_verify($password, $user['password'])){
        $_SESSION['loggedIn'] = true;
        header('Location: dashboard.php');
        exit;
    }else{
        $error = "Wrong username or password";
    }
}
?>



<div class="background">
<div class="login center">
<form action="" method="POST" class="login-form">

    <h2>Admin Login</h2>

    <div class="error-container">
        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
    </div>

    <div>
        <input type="text" name="username" placeholder="Username" class="">
        <input type="password" name="password" placeholder="Password" class="">
    </div>

        <button type="submit" class="submit-btn login-btn">Login</button>
</form>
</div>
</div>