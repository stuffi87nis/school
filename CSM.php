<?php
    require_once 'class/Student.class.php';
    require_once 'class/School.class.php';
    
    $c = new School();
    
$s = new Student();
$students = $s->all();
    
    
    include 'inc/header.inc.php';
?>



          <h1>CSM school</h1>
          
          
  <table class="table">
  <thead class="thead-dark">
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

    <?php   foreach ($students as $student) { ?>

      <tr>
        <td><?php echo $student->id; ?></td>
        <td><?php echo $student->first_name; ?></td>
        <td><?php echo $student->last_name;?></td>
        <td><?php echo $student->grades; ?></td>
        <td><?php echo $student->avg_grades; ?></td>
        <td>
        </td>
      </tr>

    <?php } ?>

  </tbody>
</table>
          
<?php          include_once 'inc/footer.inc.php'; ?>