<?php

require_once  '../../functions/db.php';

$table = $_GET['table'];
$id = $_GET['item_id'];
$field = $_GET['field'];

$conn = new db;
$result = $conn->db_delete($table, $field, $id);

if($result)
{
    $data['message'] = "success";
}
else 
{
    $data['message'] = "error";
}

echo json_encode($data);

?>