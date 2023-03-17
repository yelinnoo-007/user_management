<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        <h1 class="h3 mb-3">Register</h1>

        <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-warning">
                Cannot Create account: Please try again.
            </div>
        <?php endif ?>
        <form action="_actions/create.php" method="post">
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="mb-3">
                <input type="text" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="mb-3">
                <input type="text" name="phone" class="form-control" placeholder="Phone">
            </div>
            <div class="mb-3">
                <textarea name="address" class="form-control" placeholder="Address"></textarea>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="password">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <br>
        <a href="./index.php">Login</a>
    </div>
</body>
</html>