<?php
// THE INDEX.PHP FILE FOR PROJECT APP

// set the page title for header
$page_title = 'Project';

// grab the header
include "/var/www/tools.airwaveconsult.com/manage/include/header.php";
?>

<header class="content_header">
<h1>Projects <a href="new.php"><i class="fa fa-plus-square-o"></i></a></h1>
</header>

<section class="content">

<!-- setup the 'project added' alert box -->
<?php if(isset($_GET['add']) && $_GET['add'] == 'good'): ?>
<div class="add">Project added successfully.<i class="fa fa-times"></i></div>

<!-- hide the box on 'x' click or after 3 seconds -->
<script type="text/javascript">
$(function(){
  setTimeout(function(){
    $('div.add').fadeOut('600',function(){
      $('div.add').remove();
    })
  }, 3000);
});
$('div.add i').click(function(){
  $('div.add').remove();
});
</script>
<?php endif; ?>

<h2>Current Projects</h2>
<!-- ongoing projects table -->
<table>
<tbody>
<tr><th>Project Name</th><th>Client</th><th>Start Date</th><th>End Date</th></tr>
<?php
$results = $db_handler->project_list($username,'current');

if($results){
  $row = '';
  foreach($results as $result){
    if($row == ''){$row = 'class="alt"';}else{$row = '';}
    echo "<tr $row>";
    echo "<td>" . $result['name'] . "</td>";
    echo "<td>" . $result['client'] . "</td>";
    echo "<td>" . $result['start_date'] . "</td>";
    echo "<td>" . $result['end_date'] . "</td>";
    echo "</tr>";
  }
}
else{
  echo "<tr><td>No current projects. Start one?</td></tr>";
}
?>
</tbody>
</table>

<h2>Completed Projects</h2>
<!-- ongoing projects table -->
<table>
<tbody>
<tr><th>Project Name</th><th>Client</th><th>Start Date</th><th>End Date</th></tr>
<?php
$results = $db_handler->project_list($username,'archive');

if($results){
  $row = '';
  foreach($results as $result){
    if($row == ''){$row = 'class="alt"';}else{$row = '';}
    echo "<tr $row>";
    echo "<td>" . $result['name'] . "</td>";
    echo "<td>" . $result['client'] . "</td>";
    echo "<td>" . $result['start_date'] . "</td>";
    echo "<td>" . $result['end_date'] . "</td>";
    echo "</tr>";
  }
}
else{
  echo "<tr><td>No completed projects. Get something done!</td></tr>";
}
?>
</tbody>
</table>
</section>

<?php
// grab the footer
include "../include/footer.php";
?>
