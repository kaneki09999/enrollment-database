<?php 
include "include/header.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Animation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
       body {
            background-color: white;
            background-size: cover; 
            background-repeat: no-repeat;
            background-attachment: fixed; 
            overflow-x: hidden;
            }

        .image-container {
            float: left;
            margin: 10px;
            margin-left: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);
            width: 45%;
            border: 2px solid black;
            border-radius: 12px;
            overflow: hidden;
            opacity: 0;
            transform: translateY(100px);
            transition: opacity 0.5s, transform 0.5s;
        }

        .image-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
        }

        .image-wrapper img {
            max-width: 100%;
            max-height: 100%;
        }

        .gallery {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px;
            flex-wrap: wrap;
            opacity: 0;
            transform: scale(0.8);
            transition: opacity 0.7s, transform 0.7s;
        }

        .gallery img {
            width: 100%;
            height: auto;
            max-width: 400px;
            max-height: 300px;
            margin: 7px;
            border: 1px solid black;
            border-radius: 5px;
        }

        .gallery img:hover {
            transform: scale(1.1);
            transition: transform 0.3s ease-in-out;
        }

        h3, h4 {
            text-align: center;
            color: #529f37;
            font-weight: bold;
            opacity: 0;
            transform: translateY(100px);
            transition: opacity 0.5s, transform 0.5s;
        }

        h3 {
            font-size: 50px;
        }

        h4 {
            font-size: 30px;
        }

        h5 {
            font-weight: bold;
            font-size: 30px;
            color: #529f37;
            margin-left: 60px;
            margin-top: 20px;
        }

        .carousel-item {
            height: 600px;
        }

        .top-bar {
            background-color: #529f37;
            color: #fff;
            padding: 10px 0;
        }

        .navbar:after {
            content: '';
            display: block;
            width: 100%;
            border-bottom: 5px solid #e77d33;
            margin-top: 15px;
        }

        .contact-info {
            margin: 0;
            text-align: center;
        }

        .description-container {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 15px 20px rgba(0, 0, 0, 1);
            border: 2px solid black;
            width: 45%;
            float: right;
            margin-right: 30px;
            opacity: 0;
            transform: translateX(100px);
            transition: opacity 0.5s, transform 0.5s;
        }

        .visible {
            opacity: 1;
            transform: translateY(0);
        }

        .gallery-visible {
            opacity: 1;
            transform: scale(1);
        }

        .description-container h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
            text-align: justify;
        }

        .description-container p {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
            text-align: justify;
        }

        .custom-hr {
            height: 15px;
            border: none;
            background-color: #FF6400;
        }

        .gallery2 {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px;
        flex-wrap: wrap;
        opacity: 1;
        transform: scale(0.8);
        transition: opacity 0.7s, transform 0.7s;
        padding: 10px;
    }

    .gallery2 img {
        width: 100%;
        height: 100%;
        max-width: 600px;
        max-height: 400px;
        margin: 10px;
        border: 1px solid black;
        border-radius: 5px;
        object-fit: cover;
    }

 
    .gallery2 img:hover {
        transform: scale(1.1);
        transition: transform 0.5s ease-in-out;
    }


    @media (max-width: 576px) {
        .gallery2 img {
            width: 80%; 
        }
    }

        footer {
            background-color: #529f37;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            clear: both;
        }

      
         .carousel {
            width: 100%;
            height: 500px;
        }
        .carousel-inner {
            width: 100%;
            height: 100%;
        }
        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 30px;
            height: 30px;
        }


        @media (max-width: 1100px) {
            h3 {
                font-size: 36px;
            }

            h4 {
                font-size: 24px;
            }

            h5 {
                font-size: 20px;
                margin-left: 30px;
            }

            .carousel-item {
                height: 300px;
            }

            .description-container, .image-container {
                width: 80%;
                margin: 20px auto;
                float: none;
            }
        }

        @media (max-width: 576px) {
            h3 {
                font-size: 28px;
            }

            h4 {
                font-size: 20px;
            }

            h5 {
                font-size: 18px;
                margin-left: 20px;
            }

            .carousel-item {
                height: 200px;
            }
        }


    .containercsd {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        height: 100vh; 
    }

    .center-image {
        max-width: 100%;
        height: auto;
        margin-right: 20px; 
        margin-left: 65px;
    }

    .description-container {
    /* Add styling for the description container */
}

.animated {
    animation-name: slideFromLeft;
    animation-duration: 1s; /* Adjust duration as needed */
}

@keyframes slideFromLeft {
    from {
        transform: translateX(-100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}
    </style>
</head>
<body>

<!-- Carousel -->
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./Course Logo/school.jpg" class="d-block w-100" alt="First slide">
        </div>
        <div class="carousel-item">
            <img src="./Course Logo/school1.jpg" class="d-block w-100" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img src="./Course Logo/school2.jpg" class="d-block w-100" alt="Third slide">
        </div>
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

<br><br>
<!-- Image container -->
<div class="image-container">
    <div class="image-wrapper">
        <img src="./Course Logo/campus.jpg" alt="Descriptive Alt Text" class="float-left-shadow">
    </div>
</div>

<div class="description-container">
    <h2>Campus History</h2>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec feugiat magna. Sed vestibulum ligula eget velit eleifend luctus.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec feugiat magna. Sed vestibulum ligula eget velit eleifend luctus.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec feugiat magna. Sed vestibulum ligula eget velit eleifend luctus.
    </p>
    <p>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec feugiat magna. Sed vestibulum ligula eget velit eleifend luctus.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec feugiat magna. Sed vestibulum ligula eget velit eleifend luctus.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec feugiat magna. Sed vestibulum ligula eget velit eleifend luctus.
    </p>
</div>

<div style="clear: both;"></div>

<br><br><br><br>
<hr class="custom-hr">
<h3>School Activities</h3>
<hr class="custom-hr">


<br>
<hr style="width: 35%; background-color: black;">
<h4>Computer Studies Fair</h4>
<hr style="width: 35%; background-color: black;">
<br>
<h5>Sports</h5>
<div class="gallery">
    <img src="./Course Logo/iamge.jpg" alt="Image 1">
    <img src="./Course Logo/image 2.jpg" alt="Image 2">
    <img src="./Course Logo/image3.jpg" alt="Image 3">
    <img src="./Course Logo/iamge.jpg" alt="Image 1">
    <img src="./Course Logo/image 2.jpg" alt="Image 2">
    <img src="./Course Logo/image3.jpg" alt="Image 3">
</div>

<br><br>

<h5>Student Skills</h5>
<div class="gallery">
    <img src="./Course Logo/iamge.jpg" alt="Image 1">
    <img src="./Course Logo/image 2.jpg" alt="Image 2">
    <img src="./Course Logo/image3.jpg" alt="Image 3">
    <img src="./Course Logo/iamge.jpg" alt="Image 1">
    <img src="./Course Logo/image 2.jpg" alt="Image 2">
    <img src="./Course Logo/image3.jpg" alt="Image 3">
</div>

<br><br>
<hr style="width: 35%; background-color: black;">
<h4>Computer Studies Exhibits</h4>
<hr style="width: 35%; background-color: black;">

<br>
<h5>Capstone Thesis</h5>
<div class="gallery">
    <img src="./Course Logo/iamge.jpg" alt="Image 1">
    <img src="./Course Logo/image 2.jpg" alt="Image 2">
    <img src="./Course Logo/image3.jpg" alt="Image 3">
    <img src="./Course Logo/iamge.jpg" alt="Image 1">
    <img src="./Course Logo/image 2.jpg" alt="Image 2">
    <img src="./Course Logo/image3.jpg" alt="Image 3">
</div>



<br><br><br><br>
<hr class="custom-hr">
<h3>School Facilities</h3>
<hr class="custom-hr">

<br>    
<h5>Classrooms</h5>
<div class="gallery2">
    <img src="./Course Logo/school1.jpg" alt="Image 1">
    <img src="./Course Logo/school2.jpg" alt="Image 2">
    <img src="./Course Logo/school1.jpg" alt="Image 1">
    <img src="./Course Logo/school2.jpg" alt="Image 2">
    <!-- Add more images as needed -->
</div>





<h5>About Computer Studies Department</h5>
<div class="containercsd">

        <img src="./Course Logo/csd.png" alt="Department Image" class="center-image animated">
   
    <div class="description-container">
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec feugiat magna. Sed vestibulum ligula eget velit eleifend luctus.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec feugiat magna. Sed vestibulum ligula eget velit eleifend luctus.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec feugiat magna. Sed vestibulum ligula eget velit eleifend luctus.</p>
        <!-- Add more content here as needed -->
    </div>
</div>



<!-- Footer -->
<footer>
    <div class="container">
        <p>&copy; 2024 Enrollment System. All rights reserved.</p>
    </div>
</footer>

<!-- SCRIPT FOR SCROLLING -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const options = {
        threshold: 0.1
    };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                if (entry.target.classList.contains('gallery')) {
                    entry.target.classList.add('gallery-visible');
                } else {
                    entry.target.classList.add('visible');
                }
            } else {
                if (entry.target.classList.contains('gallery')) {
                    entry.target.classList.remove('gallery-visible');
                } else {
                    entry.target.classList.remove('visible');
                }
            }
        });
    }, options);

    const elements = document.querySelectorAll('.description-container, .image-container, h3, h4, .gallery');
    elements.forEach(element => {
        observer.observe(element);
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const options = {
        threshold: 0.1
    };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.intersectionRatio > 0) {
                if (entry.target.classList.contains('gallery')) {
                    entry.target.classList.add('gallery-visible');
                } else {
                    entry.target.classList.add('visible');
                }
            } else {
                if (entry.target.classList.contains('gallery')) {
                    entry.target.classList.remove('gallery-visible');
                } else {
                    entry.target.classList.remove('visible');
                }
            }
        });
    }, options);

    const elements = document.querySelectorAll('.description-container, .image-container, h3, h4, .gallery');
    elements.forEach(element => {
        observer.observe(element);
    });
});
</script>

<!-- Add Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
