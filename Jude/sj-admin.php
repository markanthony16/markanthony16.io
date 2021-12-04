<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/colour.css">
  <link rel="stylesheet" href="css/gallery.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <title>Document</title>
</head>

<body class="">

  <nav class="navbar navbar-expand-lg nav_color navbar-dark nav_outline">
    <h3 class=""><img src="asset/logo.png" alt="Saint Jude Logo"
        style="width: 50px; padding-left: 10px; padding-top: 5px;"><a class="navbar-brand fw-bold c-white" href="#"
        style="padding-left: 15px;">St. Jude College</a></h3>
    <button style="margin-right: 20px;" class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end col-6" style="padding-right: 20px;" id="navbarNav">
    </div>
  </nav>

  <div class="container">
    <div class="div_outline div_background_light mx-auto mt-5 rounded-3" style="max-width: 450px;">
      <h4 class="pt-2 fw-bold pb-4 pt-3" style="color: white; text-align: center;">Admin Access</h4>
      <form action="php/admin-login-process.php" method="post">
        <div class="mx-auto" style="width: 90%;">
          <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <strong>Warning!</strong> This Page is for Authority Person only!
          </div>
          <!--inputfield-->
          <div class="input-group flex-nowrap mt-3">
            <span class="input-group-text" id="addon-wrapping">Username</span>
            <input type="text" class="form-control" name="username" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
          </div>
          <div class="input-group flex-nowrap mt-2">
            <span class="input-group-text" id="addon-wrapping">Password</span>
            <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Username" aria-describedby="addon-wrapping" required>
          </div>
          <div class="d-grid d-md-flex justify-content-center mt-5 pb-5 mb-3">
            <button class="btn btn-success" type="submit" name="admin-login">Login</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
      crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>
</body>

</html>