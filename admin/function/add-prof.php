<?php
include '../../connect/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = htmlspecialchars($_POST['name']);
    $major = htmlspecialchars($_POST['major']);
    $contact = htmlspecialchars($_POST['contact']);

    $sql = "CALL insert_professor(?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $name, $major, $contact);
        $stmt->execute();
        echo "<script>
                alert('Professor added successfully!');
                window.location.href = '../professor.php';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>

?>
