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
    <title>Sign Up</title>
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
        <h1 class="fw-bold">Signup</h1>
        <h3>to get started</h3>
        <form id="signup-form" class="my-5">
            <input type="text" class="form-control rounded-3 mb-3 p-3" name="username" placeholder="Username">
            <input type="text" class="form-control rounded-3 mb-3 p-3" name="email" placeholder="Email">
            <input type="password" class="form-control rounded-3 mb-3 p-3" name="password" placeholder="Password">
            <input type="password" class="form-control rounded-3 mb-3 p-3" name="cpassword" placeholder="Confirm Password">
            <div class="form-check ms-3 mb-3 p-3">
                <input class="form-check-input" type="checkbox" value="">
                <label class="form-check-label" for="flexCheckIndeterminate">
                    Agree to terms and conditions.
                </label>
            </div>
            <button type="submit" class="form-control rounded-3 bg-black text-white p-3">Continue</button>
        </form>
        <div class="d-flex justify-content-center gap-2">
            <p>Already Registered?</p>
            <a href="./login.php" class="text-decoration-none text-black"><p class="fw-bold">Login</p></a>
        </div>
    </div>
</div>
</body>
<script>
$('#signup-form').submit(function(e){
    e.preventDefault();
    $.ajax({
        url:'backend/ajax.php?action=signup',
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
            if(resp == 'email-taken'){
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Email is already taken.',
                    heightAuto: false
                });
            }else if(resp == 'password-unmatched'){
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Password and Confirm Password do not match.',
                    heightAuto: false
                });
            }else if(resp == 'reg-success'){
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Registration successful. You may now login.',
                    heightAuto: false
                }).then(function() {
                    window.location.href = './login.php';
                });
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