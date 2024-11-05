<?php 
session_start(); 
if(isset($_SESSION['id'])){
    header("location: ./index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/styles.css" rel="stylesheet">
    <link href="./css/loader.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="container-xl d-flex justify-content-center align-items-center h-100">
    <div class="border border-black rounded-5 w-md-50 shadow">
        <h1 class="fw-bold">Login</h1>
        <h3>to get started</h3>
        <form id="login-form" class="my-5">
            <input type="text" class="form-control rounded-3 mb-3 p-3" name="email" placeholder="Email">
            <input type="password" class="form-control rounded-3 mb-3 p-3" name="password" placeholder="Password">
            <p class="mb-3">Forgot Password?</p>
            <button type="submit" class="form-control rounded-3 bg-black text-white p-3">Continue</button>
        </form>
        <div class="d-flex justify-content-center gap-2">
            <p>New User?</p>
            <a href="./signup.php" class="text-decoration-none text-black"><p class="fw-bold">Register</p></a>
        </div>
    </div>
</div>
</body>
<script>
$('#login-form').submit(function(e){
    e.preventDefault();
    $.ajax({
        url:'backend/ajax.php?action=login',
        method:'POST',
        data:$(this).serialize(),
        beforeSend: function() {
            Swal.fire({
                html: '<center><div class="loader"></div><br><br><h5>Please Wait...</h5></center>',
                showConfirmButton: false,
            });
        },
        success:function(resp){
            console.log(resp)
            if(resp == 'login-success'){
                window.location.reload();
            }else if(resp == 'invalid-credentials'){
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Email and/or Password is incorrect.',
                    heightAuto: false
                });
            }else if(resp == 'user-not-found'){
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'User not found.',
                    heightAuto: false
                })
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
})
</script>
</html>