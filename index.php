<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <style>
        .wrap{
            width: 100%;
            max-width: 400px;
            margin: 40px auto;
        }
    </style>
</head>
<body class="text-center">
    <div class="wrap">
        <h1 class="h3 mb-3">Login</h1>

            <?php if(isset($_GET['registered'])) : ?> 
                <div class="alert alert-success">
                    Account created. Please Login.
                </div>
            <?php endif ?>

            <?php if(isset($_GET['suspended'])) : ?>
                <div class="alert alert-danger">
                    Your account is suspended.
                </div>
            <?php endif ?>

            <?php if(isset($_GET['incorrect'])) : ?>
                <div class="alert alert-warning">
                    Incorrect Email or Password
                </div>
            <?php endif ?>

            <form action="_actions/login.php" method="post">
                <div class="mb-3">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" placeholder="Enter Password" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <br>
            <a href="./register.php">Register</a>
    </div>
    
</body>
</html>