<?php
session_start(); 
include "include/header.php";
?>

<style>
    .top-bar {
        background-color: #529f37; /* Change to your desired color */
        color: #fff; /* Text color */
        padding: 10px 0; /* Adjust padding as needed */
    }

    /* Add thicker and colored line below navbar */
    .navbar:after {
        content: '';
        display: block;
        width: 100%;
        border-bottom: 5px solid #e77d33; /* Change the color and thickness as needed */
        margin-top: 15px; /* Adjust spacing as needed */
    }

    .contact-info {
        margin: 0;
        text-align: center;
    }

    /* Footer styles */
    footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #529f37;
        color: #fff;
        padding: 20px 0;
        text-align: center;
    }

    .main-content {
        margin-bottom: 100px; /* Adjust this value based on footer height */
    }
    
    .login-form {
        max-width: 500px;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        margin: 0 auto; /* Add this line to center horizontally */
        display: block; /* Change display property to block */
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"],
    select {
        width: calc(100% - 24px); /* Adjust width to fit container */
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    input[type="submit"] {
        width: calc(100% - 24px); /* Adjust width to fit container */
        padding: 10px;
        background-color: #529f37;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
<br><br>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login_username = isset($_POST['login_username']) ? $_POST['login_username'] : null;
    $login_password = isset($_POST['login_password']) ? $_POST['login_password'] : null;

    if ($login_username && $login_password) {
        // Ensure $conn is already defined and connected to your database
        $stmt = $conn->prepare("CALL student_login_proc(?)");
        $stmt->bind_param("s", $login_username);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (isset($row['password'])) {
                $hashed_password = $row['password']; 

                if (password_verify($login_password, $hashed_password)) {
                    $_SESSION['student_id'] = $row['student_id'];
                    echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Successful!',
                            text: 'You will be redirected shortly...',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = 'student/index.php';
                        });
                    </script>";
                    exit();
                } else {
                    $error_message = "Login Failed!";
                }
            } else {
                $error_message = "Incorrect username or password!";
            }
        } else {
            $error_message = "Login Failed!";
        }

        $stmt->close();
    } else {
        $error_message = "Username or password not provided!";
    }
    $conn->close();
}

    if (isset($error_message)) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '$error_message',
            });
        </script>";
    }
    ?>
<div class="container">
    <form class="login-form" action="" method="POST">
        <h2 class="text-center" style="color: #e77d33;">Login</h2>
        <div class="form-group">
            <label for="login_username">Username:</label>
            <input type="text" id="login_username" name="login_username" placeholder="Enter Username" required>
        </div>
        <div class="form-group">
            <label for="login_password">Password:</label>
            <input type="password" id="login_password" name="login_password" placeholder="Enter Password" required>
        </div>
        <input type="submit" value="Login">
    </form>
</div>
<footer>
    <div class="container">
        <p>&copy; 2024 Enrollment System. All rights reserved.</p>
    </div>
</footer>

<!-- Add Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
