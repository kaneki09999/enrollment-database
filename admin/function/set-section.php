<?php
include '../../connect/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $yearLevel = $_POST['year_level'];
    $section = $_POST['section'];

    $conn->begin_transaction();

    try {
        $sql_call = "CALL insert_section_student(?, ?, ?)";
        if ($stmt_call = $conn->prepare($sql_call)) {
            $stmt_call->bind_param("sss", $student_id, $section, $yearLevel);
            $stmt_call->execute();
            $stmt_call->close();
        } else {
            throw new Exception($conn->error);
        }
        
        $sql_call = "CALL update_student_status(?)";
        if ($stmt_call = $conn->prepare($sql_call)) {
            $stmt_call->bind_param("s", $student_id);
            $stmt_call->execute();
            $stmt_call->close();
        } else {
            throw new Exception($conn->error);
        }
        
        $conn->commit();
        echo '<script>
                    alert("Section assigneds successfully!");
                    window.location.href = "../new-enrollees.php";
                 </script>';
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

    $conn->close();
}
?>
