<?php
// THE NEW.PHP FILE FOR INVOICE APP

// set the page title for header
$page_title = 'Project';

// grab the header
include "../include/header.php";
?>

<header class="content_header">
<h1>Add New Project</h1>
</header>

<section class="content">
<form class="new" action="add.php" method="post">
<input type="text" id="name" name="name" placeholder="Project Name">
<textarea name="description" id="description" placeholder="Project Description" rows="5"></textarea>
<input type="text" id="client" name="client" placeholder="Client Name">
<input type="text" id="start_date" name="start_date" placeholder="Project Start Date (YYYY-MM-DD)">
<input type="text" id="end_date" name="end_date" placeholder="Project End Date (YYYY-MM-DD)">
<input type="checkbox" value="archive" id="status" name="status"><label id="status_label" for="status">Add to completed projects?</label>
<input type="submit" id="submit" value="Create Project">
</form>
</section>

<?php
// grab the footer
include "../include/footer.php";
?>
