<?php
include '../../connect/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $yearLevel = $_POST['yearLevel'];
    $program = $_POST['program'];
    $subjectCode = $_POST['subjectcode'];
    $description = $_POST['description'];
    $unit = $_POST['unit'];
    $day = $_POST['day'];
    $time = $_POST['time'];
    $professor = $_POST['professor'];

    $sql = "CALL AddSubjectByCourse(?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("isssisss", $yearLevel, $program, $subjectCode, $description, $unit, $day, $time, $professor);
        
        if ($stmt->execute()) {
            echo '<script>
                    alert("New subject added successfully!");
                    window.location.href = "http://localhost/enrollment/admin/subject.php";
                 </script>';
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
