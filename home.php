<?php
include "include/header.php";
?>

        <!-- Add custom CSS for carousel -->
        <style>
        .carousel-item {
            height: 600px;
        }

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
            background-color: #529f37;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
    </style>
    <!-- Carousel -->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="pic.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="pic2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="pic3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <!-- Next and previous buttons -->
        <a class="carousel-control-prev" href="#carouselExampleSlidesOnly" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleSlidesOnly" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

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
