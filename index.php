<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="./css/styles.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white">
  <div class="container justify-content-lg-between">
    <a class="navbar-brand" href="#"><img src="./images/logo.png" ></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav ms-auto mb-2 gap-4 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">How It Works</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Database</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <?php if(isset($_SESSION['id'])): ?>
            <button id="logout-btn" class="bg-black text-white px-5 py-2 btn">Logout</button>
          <?php else: ?>
            <a href="./login.php"><button class="bg-black text-white px-5 py-2 btn">Start</button></a>
          <?php endif; ?>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="main-content bg-body-tertiary d-flex flex-column flex-lg-row flex-grow-1">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="d-flex flex-column gap-3">
            <h1 class="fw-bold">Welcome!</h1>
            <h3>For more information about us</h3>
            <button class="btn bg-black text-white px-5 py-3 w-50">Button</button>
        </div>
    </div>
    <div class="container bg-body-secondary d-flex align-items-center justify-content-center flex-grow-1">
        
    </div>
</div>

<div class="container max-h d-flex flex-column align-items-center justify-content-center gap-3">
  <h1>Device</h1>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  
  <div class="container d-flex">
    <div class="container d-flex justify-content-center align-items-center">
      <div class="container">
        <div class="position-relative" >
          <div class="bg-secondary box-one"></div>
          <div class="bg-secondary box-two"></div>
          <div class="bg-secondary box-three"></div>
        </div>
      </div>
      <div class="container d-flex flex-column align-items-start justify-content-center mt-5 pt-5">
        <p class="fs-4"><i class="fa-regular fa-circle-check"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
        <p class="fs-4"><i class="fa-regular fa-circle-check"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
        <p class="fs-4"><i class="fa-regular fa-circle-check"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
        <p class="fs-4"><i class="fa-regular fa-circle-check"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
        <button class="btn bg-black text-white px-5 py-3 w-25">Button</button>
      </div>
    </div>
  </div>
</div>

<div class="container d-flex align-items-center justify-content-between bg-black text-white p-3 rounded">
  <div>
    <h2 class="fw-bold">Need more information?</h2>
    <p>Write your concern to us and our specialist will get back to you.</p>
  </div>
  <button class="btn btn-light">Button</button>
</div>

<footer class="bg-body-tertiary p-5">
  <div class="container d-flex">
    <div class="container">
      <img src="./images/logo.png" >
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
    </div>
    <div class="container">
      <p class="fw-bold">Heading</p>
      <p>Link here</p>
      <p>Link here</p>
      <p>Link here</p>
      <p>Link here</p>
    </div>
    <div class="container">
      <p class="fw-bold">Heading</p>
      <p>Link here</p>
      <p>Link here</p>
      <p>Link here</p>
      <p>Link here</p>
    </div>
    <div class="container">
      <p class="fw-bold">Heading</p>
      <p>Link here</p>
      <p>Link here</p>
      <p>Link here</p>
      <p>Link here</p>
    </div>
    <div class="container">
      <p class="fw-bold">Connect with us</p>
    </div>
  </div>
</footer>
</body>
<script>
$('#logout-btn').on('click', function(e){
  $.ajax({
    url:'backend/ajax.php?action=logout',
    method:'POST',
    success:function(resp){
      console.log(resp);
      if(resp == 'logout-success'){
        window.location.href = './login.php';
      }else{
        Swal.fire({
          icon: 'error',
          title: 'Oops!',
          text: 'Something went wrong.',
          heightAuto: false
        });
      }
    }
  })
});
</script>
</html>