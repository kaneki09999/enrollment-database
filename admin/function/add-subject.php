<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../../connect/connection.php';

    $subjectCode = $_POST['subjectcode'];
    $description = $_POST['description'];
    $unit = $_POST['unit'];

   
$sql = "CALL AddSubject(?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("sss", $subjectCode, $description, $unit);

    if ($stmt->execute()) {
        echo '<script>
                alert("New subject added successfully!");
                window.location.href = "../subjects.php";
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
