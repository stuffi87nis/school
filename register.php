<?php
    require_once 'class/Helper.class.php';
    require_once 'class/User.class.php';

    if(isset($_POST['reg_btn'])){
        $newUser = new User();
        $newUser->name = $_POST['name'];
        $newUser->email = $_POST['email'];
        $newUser->new_password = $_POST['password'];
        $newUser->password_repeat = $_POST['repeat_password'];
        if($newUser->insert()){
            Helper::addMessage("YOU ARE REGISTERED");
        }
    }


    include 'inc/header.inc.php';
?>



          <h1>Registration page</h1>
          
          
<div class="col-md-5">         
<form action="" method="post"> 
  <div class="form-group">
    <label for="inputName">Name</label>
    <input type="text" name="name" class="form-control" id="inputName" aria-describedby="emailHelp" placeholder="Name">
  </div>  
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>  
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="inputPasswordRepeat">Password repeat</label>
    <input type="password" name="repeat_password" name="password" class="form-control" id="inputPasswordRepeat" placeholder="Password repeat">
  </div>  
  <button type="submit" name="reg_btn" class="btn btn-primary">REGISTRATION</button>
</form>
</div>      
          
          
          
<?php          include_once 'inc/footer.inc.php'; ?>