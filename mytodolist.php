<?php
$errors = "";
$db = mysqli_connect('localhost', 'root', '', 'my_utils');

if(isset($_POST['submit'])) {
  $task = $_POST['task'];
  if(empty($tasks)) {
    $errors = "Vous devez remplir une tâche à faire";
  }else {
    mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$task')");
    header('location: mytodolist.php') 
  
  }

if(isset($_GET['del_task'])) {
  $id = $_GET['del_task'];
  mysqli_query($db,"DELETE FROM tasks WHERE id=$id");
  header('location : mytodolist.php');

$tasks = mysqli_query($db, "SELECT * FROM task")

 ?>

<!DOCTYPE html>
<html>

    <header>
    <title>MY TO DO LIST</title>
    <link rel="stylesheet" type="text/css" href="mytodolist.css">

  </header>

<body>
  <div class="heading">
    <h2 align="center">MY TO DO LIST</h2>
</div>

<form method="POST" action="mytodolist1.php">
<?php if (isset($errors)) { ?>
  <p><?php echo $errors; ?></p>
  <?php } ?>


  <input type="text" name="task" class="task_input">
  <button type="submit" class="add_btn" name="submit">AJOUTER UNE TÂCHE</button>
</form>

<table>
  <thead>
    <tr>
      <th>N</th>
      <th>Task</th>
      <th>Action</th>
</tr>
</thead>

<tbody>
  <?php $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
   
    <tr>
    <td><?php echo $i; ?></td>
    <td class="task"><?php echo $row['task']; ?></td>
      <td class="delete">
        <a href="mytodolist.php?del_task=<?php echo $row['id']; ?>">X</a>
</td>
</tr>
  <?php $i++; } ?>
 
</tbody>
</table>


</body>
</html>