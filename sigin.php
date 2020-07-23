<?php include("connection.php"); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">
    <link href="data:image/x-icon;base64,AAABAAEAEBACAAAAAACwAAAAFgAAACgAAAAQAAAAIAAAAAEAAQAAAAAAQAAAAAAAAAAAAAAAAgAAAAAAAAAAAAAA/4QAAAAAAAAAAAAAQ94AAEJCAABCQgAAQkIAAEJCAABCQgAAel4AAEpQAABKUAAASlAAAEpQAAB73gAAAAAAAAAAAAD//wAA//8AALwhAAC9vQAAvb0AAL29AAC9vQAAvb0AAIWhAAC1rwAAta8AALWvAAC1rwAAhCEAAP//AAD//wAA" rel="icon" type="image/x-icon" />
    
    <title>Admin Sign In</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="post">
      <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Admin Sign In</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>

      <p class="mt-5 mb-3 text-muted">&copy; 2020-2021</p>
    <?php session_start();
    if(isset($_POST['submit'])){
      $con=con_function();
$mail=$_POST['email'];
$pass=$_POST['password'];
$s=0;
$sql ="SELECT * FROM login where username='$mail' and password='$pass' ";
$r=$con->query($sql);
 $numrows = mysqli_num_rows($r);

        
        if ($numrows ==1){
          $row = mysqli_fetch_assoc($r);
          
          $_SESSION['username'] = $mail;
          $_SESSION['type']=$row['type'];
          $_SESSION['userid']=$row['userid'];
             if($row['type']=='Analyst')
             {
            header('location:viewBalance.php');              
             }

          header('location:index.php');
        }else{
          echo "<center style='color:black'> Wrong Email/Password </center>"; 
        }
            }


 ?>

    </form>
   


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>