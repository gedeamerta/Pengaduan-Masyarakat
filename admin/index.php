<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <title>Login Admin</title>
</head>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="card" style="width: 20em; margin-top: 8em">
                <h1 class="p-3 text-center">Login Petugas</h1>
                <div class="card-body">
                    <form action="../include/action/admin/login-action.php" method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>
                                </div>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block"> Login </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src="../assets/js/bootstrap.js"></script>
</body>

</html>