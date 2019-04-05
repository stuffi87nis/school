<?php
    require_once 'class/Student.class.php';

$s = new Student();
$students = $s->all();
    
    
    include 'inc/header.inc.php';
?>



          <h1>CSM school</h1>
          
          <?php      foreach ($students as $student) { ?>
          <table class="table">
  <thead>
         
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">Grades</th>
      <th scope="col">Average</th>
      <th scope="col">Final grade</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $student->id; ?></td>
      <td><?php echo $student->first_name; ?></td>
      <td><?php echo $student->last_name;?></td>
      <td><?php echo $student->grades; ?></td>
      <td><?php echo $student->avg_grades; ?></td>
    </tr>
  </tbody>
</table>
           <?php } ?>
          
<?php          include_once 'inc/footer.inc.php'; ?>