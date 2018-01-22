<?php
// THE NEW.PHP FILE FOR INVOICE APP

// set the page title for header
$page_title = 'Project';

// grab the header
include "../include/header.php";

if(isset($_GET['edit'])){
  $project = $db_handler->project_edit($_GET['edit']);
  $project_id = $project[0]['id'];
  $name = $project[0]['name'];
  $description = $project[0]['description'];
  $client = $project[0]['client'];
  $start_date = $project[0]['start_date'];
  $end_date = $project[0]['end_date'];
  $status = $project[0]['status'];
}
else{
  $project = '';$name = '';$description = '';$client = '';$start_date = '';$end_date = '';$status = '';
}
?>

<header class="content_header">
<?php
// check if new project or edit
if($project){
  echo '<h1>Edit Project&nbsp;&nbsp;&mdash;&nbsp;&nbsp;' . $project[0]['name'];
}
else{
  echo '<h1>Add New Project</h1>';
}
?>
</header>

<section class="content">
<form class="new" action="add.php" method="post">
<input type="text" value="<?php echo $name; ?>" id="name" name="name" placeholder="Project Name">
<textarea name="description" id="description" value="<?php echo $description; ?>" placeholder="Project Description" rows="5"><?php echo $description; ?></textarea>
<input type="text" value="<?php echo $client; ?>" id="client" name="client" placeholder="Client Name">
<input type="text" value="<?php echo $start_date; ?>" id="start_date" name="start_date" placeholder="Project Start Date (YYYY-MM-DD)">
<input type="text" value="<?php echo $end_date; ?>" id="end_date" name="end_date" placeholder="Project End Date (YYYY-MM-DD)">
<?php if(isset($_GET['edit'])): ?>
<input type="text" value="<?php echo $project_id; ?>" name="project_id" style="display:none;">
<?php endif; ?>
<div class="select_wrap">
<select id="status" name="status">
  <?php
  $options = array('select','current','archive');
  foreach($options as $option){
    if($option == $status){
      $selected = 'selected="selected"';
    }
    else{
      $selected = '';
    }
    if($option == 'current'){
      $option_title = 'Current Project';
    }
    else if($option == 'archive'){
      $option_title = 'Completed Project';
    }
    else{
      $option_title = 'Select Project Status';
    }
    echo '<option ' . $selected . ' value="' . $option . '">' . $option_title . '</option>';
  } ?>
</select>
</div>
<?php if(isset($_GET['edit'])){
  echo '<input type="submit" id="submit" value="Edit Project">';
}
else{
  echo '<input type="submit" id="submit" value="Create Project">';
}
?>

</form>
</section>

<?php
// grab the footer
include "../include/footer.php";
?>
