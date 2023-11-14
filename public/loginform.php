<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php 
    require_once ('../vendor/autoload.php');
    session_start();
    use App\Auth;
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $model = new Auth();
            $model->login($email, $password);
        }
    ?>
    <?php if(isset($_SESSION['user'])): ?>
        <?php header("Location: index.php"); ?>
    <?php endif; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form method="POST" target="_self" id="form" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        <div id="emailHelp" class="form-text">Doesnt have account? <a href="signupform.php">Sign Up</a></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
</body>
</html>