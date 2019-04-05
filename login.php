<?php
    require_once 'class/User.class.php';

    if(isset($_POST['log_btn'])){
        $logUser = new User();
        $logUser->email = $_POST['email'];
        $logUser->password = $_POST['password'];
        if($logUser->login()){
        header("Location: index.php");
        die();
        }
    }


    include 'inc/header.inc.php';
?>



          <h1>Login page</h1>
          
          
<div class="col-md-5">         
<form action="" method="post"> 
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>  
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" name="log_btn" class="btn btn-primary">LOGIN</button>
</form>
</div>      
          
          
          
<?php          include_once 'inc/footer.inc.php'; ?>