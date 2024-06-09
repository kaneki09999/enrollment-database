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
    $section = $_POST['section'];
    $room = $_POST['room'];
    $professor = $_POST['professor'];

    $sql = "CALL AddSubjectByCourse(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("isssisssss", $yearLevel, $program, $subjectCode, $description, $unit, $day, $time, $section, $room, $professor);
        
        if ($stmt->execute()) {
            echo '<script>
                    alert("New subject added successfully!");
                    window.location.href = "../schedule.php";
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
