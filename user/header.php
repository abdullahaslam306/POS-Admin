<?php 

include("connection.php"); 
include("auth.php"); 
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MACA DEBIT SYSTEM</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="data:image/x-icon;base64,AAABAAEAEBACAAAAAACwAAAAFgAAACgAAAAQAAAAIAAAAAEAAQAAAAAAQAAAAAAAAAAAAAAAAgAAAAAAAAAAAAAA/4QAAAAAAAAAAAAAQ94AAEJCAABCQgAAQkIAAEJCAABCQgAAel4AAEpQAABKUAAASlAAAEpQAAB73gAAAAAAAAAAAAD//wAA//8AALwhAAC9vQAAvb0AAL29AAC9vQAAvb0AAIWhAAC1rwAAta8AALWvAAC1rwAAhCEAAP//AAD//wAA" rel="icon" type="image/x-icon" />
</head>
<style type="text/css">

</style>
<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">User Type: <?php echo $_SESSION['type']; ?> </a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout.php">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              
              
             
               <li class="nav-item">
                <a class="nav-link" href="userTransaction.php">
                  <span data-feather="activity"></span>
                   Transactions Report
                </a>
              </li>
             
            </ul>
<?php if($_SESSION['type']=='Leader'){ ?>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Sale reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="concession.php">
                  <span data-feather="file-text"></span>
                  Concession
                </a>
              </li>

           
              
            </ul>
           <?php } ?>

          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
         
          
        