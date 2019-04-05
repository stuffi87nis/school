<?php


require_once 'class/School.class.php';

if ( isset($_POST['btn_add']) ) {
  $newSchool = new School();
  $newSchool->title = $_POST['school_title'];
  $newSchool->insert();
}



if ( isset($_POST['btn_delete']) ) {
  $schoolDelete = new School($_POST['school_id']);
  $schoolDelete->delete();
  }

$s = new School();
$schools = $s->all();


?>

<?php include 'inc/header.inc.php'; ?>


<h1 class="my-5">Add new school</h1>

<form action="" method="post">
  <div class="form-row">

    <div class="col-md-8 mb-3">
      <label for="inputTitle">Title</label>
      <input type="text" name="school_title" class="form-control" id="inputTitle" placeholder="Category title" required>
    </div>

    <div class="col-md-4 mb-3 d-flex justify-content-center align-items-end">
      <button class="btn btn-primary btn-block" name="btn_add">
        Add school
      </button>
    </div>

  </div>
</form>


<h2 class="my-5">Manage existing categories</h2>


<table class="table">
  <thead class="thead-dark">
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach($schools as $school) { ?>

      <tr>
        <th><?php echo $school->id; ?></th>
        <td><?php echo $school->title; ?></td>
        <td>
          <form action="" method="post">
            <input type="hidden" name="school_id" value="<?php echo $school->id; ?>" />
            <button class="btn btn-danger btn-sm" name="btn_delete">
              Delete
            </button>
          </form>
        </td>
      </tr>

    <?php } ?>

  </tbody>
</table>


<?php include 'inc/footer.inc.php'; ?>
