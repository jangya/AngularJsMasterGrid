<?php
$json = file_get_contents('http://rest.com/comments.json');
$json_output = json_decode($json);
$houseSparrow = array_filter($json_output, function($obj)
{
    return $obj->SuggestReportID == $_GET['id'];
});
$data = json_encode($houseSparrow);
echo $data;