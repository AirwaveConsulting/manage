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

<h2>Current Projects</h2>
<!-- ongoing projects table -->
<table>
<tbody>
<?php
$results = $db_handler->project_list($username,1);

if($results){
  foreach($results as $result){
    echo "<tr>";
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
<?php
$results = $db_handler->project_list($username,0);

if($results){
  foreach($results as $result){
    echo "<tr>";
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
