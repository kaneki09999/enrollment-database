<?php
include "include/header.php";
?>

<style>
    .contact-form {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }
    
    .contact-form label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }
    
    .contact-form input[type="text"],
    .contact-form input[type="email"],
    .contact-form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    
    .contact-form textarea {
        height: 150px;
    }
    
    .contact-form input[type="submit"] {
        background-color: #529f37;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }
    
    .contact-form input[type="submit"]:hover {
        background-color: #3c7625;
    }
    

    .info-container {
    float: left;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    margin-right: 20px; /* Adjust spacing between the containers */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}


    .contact-info {
        font-size: 20px; 
    }
</style>

<br>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="info-container">
                <!-- Your content for the container goes here -->
                <h2>Send us a message</h2>
                <p>This is additional information that can be displayed beside the contact form.</p>

                <div class="contact-info">
                    <i class="fa-solid fa-phone"></i>
                    +1 (123) 456-7890
                </div>
                <br>
                <div class="contact-info">
                    <i class="fa-solid fa-envelope"></i>
                    enrollmentsystem@gmail.com
                </div>
                <br>
                <div class="contact-info">
                    <i class="fa-brands fa-facebook"></i>
                    facebooknimelvin.com
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="contact-form">
                <h2>Contact Us</h2>
                <form action="process_contact.php" method="post">
                    <label for="name">Your Name:</label>
                    <input type="text" id="name" name="name" required>
                    
                    <label for="email">Your Email:</label>
                    <input type="email" id="email" name="email" required>
                    
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" required></textarea>
                    
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>

<br><br>

<!-- Footer -->
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
