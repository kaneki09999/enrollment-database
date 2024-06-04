<?php
include '../../connect/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $yearLevel = $_POST['year_level'];
    $section = $_POST['section'];

    $conn->begin_transaction();

    try {
        $sql_insert = "INSERT INTO `section_student` (`student_id`, `section`, `year_level`) VALUES (?, ?, ?)";
        if ($stmt_insert = $conn->prepare($sql_insert)) {
            $stmt_insert->bind_param("sss", $student_id, $section, $yearLevel);
            $stmt_insert->execute();
            $stmt_insert->close();
        } else {
            throw new Exception($conn->error);
        }

        $sql_update = "UPDATE `students` SET `status` = 'Confirmed' WHERE `student_id` = ?";
        if ($stmt_update = $conn->prepare($sql_update)) {
            $stmt_update->bind_param("s", $student_id);
            $stmt_update->execute();
            $stmt_update->close();
        } else {
            throw new Exception($conn->error);
        }

        $conn->commit();
        echo "Section assigned and status updated successfully.";

        echo '<script>
                    alert("Section assigneds successfully!");
                    window.location.href = "http://localhost/enrollment/admin/new-enrollees.php";
                 </script>';
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

    $conn->close();
}
?>
