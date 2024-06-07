<?php
session_start();
include '../../connect/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    
    $stmt = $conn->prepare("CALL SelectAdmin(?)");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: ../home.php"); 
            exit();
        } else {
            echo "<script>
                    alert('Invalid username or password.');
                    window.location.href = '../index.php';
                  </script>";
        }
    } else {
        echo "<script>
        alert('Invalid username or password.');
        window.location.href = '../index.php';
      </script>";
    }

    $stmt->close();
}

$conn->close();
?>
