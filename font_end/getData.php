<?php
header('Content-Type: text/html; charset=utf-8');
// configuration
include '../config/db.php';


$row = $_POST['row'];
$rowperpage = 4;

// selecting posts
$query = 'SELECT * FROM post limit ' . $row . ',' . $rowperpage;
$result = mysqli_query($connect, $query);

$html = '';

while ($row = mysqli_fetch_array($result)) {
    $id = $row['id_p'];
    $title = $row['title'];
    $thumbnail = $row['thumbnail'];
    $update = $row['update_at'];
    // $link = $row['link'];

    // Creating HTML structure
    $html .= '<a>';
    $html .= '<div id="post_' . $id . '" class="post">';
    $html .= '<div class="tempvideo" style="float:left;margin-right: 15px;">
                  <img width="260" height="140" class=" lazyloaded" src="../uploads/' . $thumbnail . '">
              </div>';
    $html .= '<h3 class="titlecom" style="margin-top:10px;">' . $title . '</h3>';

    $html .= '  <div class="timepost">
                  <span style="margin-left: 5px;">' . $update . '</span>
                </div>';
    $html .= '</div>';
    $html .= '</a>';
}

echo $html;
