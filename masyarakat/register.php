<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <title>Register Masyarakat</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="card mx-auto" style="width: 40em; margin-top: 6em">
                <h1 class="p-3 text-center">Register Masyarakat</h1>
                <div class="card-body">
                    <form action="../include/action/masyarakat/register-action.php" method="POST">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 form-group">
                                <label for="nik">NIK</label>
                                <input type="number" name="nik" id="nik" class="form-control" pattern="[0-9]{16}"
                                    required>
                            </div>
                            <div class=" col-lg-6 col-sm-12 form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" required>
                            </div>
                            <div class="col-lg-6 col-sm-12 form-group">
                                <label for="username">Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">@</div>
                                    </div>
                                    <input type="text" name="username" id="username" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 form-group">
                                <label for="phone">Number Phone</label>
                                <input type="tel" name="telp" id="phone" class="form-control" pattern="[0-9]{12}"
                                    placeholder="Format : 081234567890" required>
                            </div>
                            <div class="col-lg-6 col-sm-12 form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="col-lg-6 col-sm-12 form-group">
                                <label for="password">Re-type Password</label>
                                <input type="password" name="password2" id="password" class="form-control" required>
                            </div>
                            <div class=" col-12 form-group">
                                <button class="btn btn-primary btn-block"> Register </button>
                            </div>
                        </div>
                        <div class="text-center">Already have account ? <a href="../index.php">Click Here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/bootstrap.js"></script>
</body>

</html>