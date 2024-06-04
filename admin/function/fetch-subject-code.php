<?php
include '../../connect/connection.php';

$sql = "CALL get_subjects()";
$result = $conn->query($sql);

$subjects = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $subjects[] = $row;
    }
}
echo json_encode($subjects);
?>
