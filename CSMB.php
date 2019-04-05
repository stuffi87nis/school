<?php
    require_once 'class/Student.class.php';
    require_once 'class/School.class.php';
    
    
$school = new School();
    

$s = new Student();
$students = $s->all();
    
    
    include 'inc/header.inc.php';
?>



          <h1>CSM school</h1>
          
          <table class="table">
  <thead>
         
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">Grades</th>
      <th scope="col">Average</th>
      <th scope="col">Final grade</th>
      <th scope="col">School name</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php      foreach ($students as $student) { ?>  
      <td><?php echo $student->id; ?></td>
      <td><?php echo $student->first_name; ?></td>
      <td><?php echo $student->last_name;?></td>
      <td><?php echo $student->grades; ?></td>
      <td><?php echo $student->avg_grades; ?></td>
      <?php } ?>
      <td><?php echo $school->title; ?></td>
    </tr>
  </tbody>
</table>
          
<?php          include_once 'inc/footer.inc.php'; ?>