<?php
    require_once 'class/Student.class.php';
    require_once 'class/School.class.php';
    
    $s = new School();
    $schools = $s->all();
    
    if(isset($_POST['add_std'])){
        $insert = new Student();
        $insert->first_name = $_POST['first_name'];
        $insert->last_name = $_POST['last_name'];
        $insert->grades = $_POST['grades'];
        $insert->school_name = $_POST['school_name'];
        $insert->insert();
    }
    
    

    include 'inc/header.inc.php';
?>

<h1>Insert grades</h1>


<form action="" method="post">
  <div class="form-group">
    <label for="firstName">First name</label>
    <input type="text" name="first_name" class="form-control" id="firstName" placeholder="First name">
  </div>
  <div class="form-group">
      <div class="form-group">
    <label for="lastName">First name</label>
    <input type="text" name="last_name" class="form-control" id="lastName" placeholder="Last name">
  </div>
  <div class="form-group">
    <label for="schoolName">School name</label>
    <select class="form-control" name="school_name" id="schoolName">
        <?php        foreach ($schools as $school) { ?>
               <option value="<?php echo $school->id; ?>"><?php echo $school->title; ?></option>
        <?php } ?>
    </select>
    
  </div>
      <div class="form-group">
    <label for="grades">Grades</label>
    <input type="number" name="grades" class="form-control" id="grades" placeholder="Grades">
  </div>
      <button type="submit" name="add_std" class="btn btn-primary">ADD</button>
  </div>
</form>




<?phpinclude 'inc/footer.inc.php';