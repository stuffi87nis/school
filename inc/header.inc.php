<?php
    require_once 'class/Helper.class.php';
    
    $messageToShow = Helper::getMessage();
    $errorToShow = Helper::getError();

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    
    <title>Hello, world!</title>
  </head>
  <body>

      <?php include 'inc/navbar.inc.php'; ?>
 
    
      <div class="container">
          
          
    <?php if( $errorToShow ) { ?>
          <div class="alert alert-danger my-4">
            <b>Error!</b>
            <?php echo $errorToShow; ?>
          </div>
        <?php } ?>

        <?php if( $messageToShow ) { ?>
          <div class="alert alert-success my-4">
            <b>Success!</b>
            <?php echo $messageToShow; ?>
          </div>
        <?php } ?>
