<?php include "functions.php"; ?>
    <?php

    $pdo = pdo_connect();
    
    session_start();
    
    function csrf_token() {
        return bin2hex(rand(100000, 999999));
    }
    
    function create_csrf_token() {
        $token = csrf_token();
        $_SESSION['csrf_token'] = $token;
        $_SESSION['csrf_token_time'] = time();
        return $token;
    }
    
    function csrf_token_tag() {
        $token = create_csrf_token();
        return '<input type="hidden" name="csrf_token" value="' . $token . '">';
    }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= style_script() ?>
    <title>Login</title>
</head>
<body class="text-center">

    <form class="form-signin" method="POST">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="username" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
            <label>
            </label>
        </div>
        <?php echo csrf_token_tag(); ?>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">hk &copy; 2021</p>
    </form>
</body>

</html>