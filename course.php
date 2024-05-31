<?php
include "include/header.php";
?>

    <style>
        .top-bar {
            background-color: #529f37; /* Change to your desired color */
            color: #fff; /* Text color */
            padding: 10px 0; /* Adjust padding as needed */
        }

        .contact-info {
            margin: 0;
            text-align: center;
        }

        /* Add thicker and colored line below navbar */
        .navbar:after {
            content: '';
            display: block;
            width: 100%;
            border-bottom: 5px solid #e77d33; /* Change the color and thickness as needed */
            margin-top: 15px; /* Adjust spacing as needed */
        }

        /* Footer styles */
        footer {
            background-color: #529f37;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        
        .course-box {
            position: relative;
            text-align: center;
            color: white;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
        }

        .course-box img {
            width: 25%;
            height: auto;
            opacity: 0.8;
            float: left;
        }

        .course-box h2 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 1.5em;
            color: black;
            padding: 10px;
            border-radius: 5px;
        }

        /* Style for the heading "Courses Offered" */
        .course-heading {
            text-align: center;
            color: #e77d33; /* Change the color as needed */
        }

        .justified-text {
            text-align: justify;
        }




    </style>
    <br>
    <!-- Centered and styled heading for "Courses Offered" -->
    <div class="container">
        <h2 class="course-heading">Courses Offered</h2>
        <br>
        <!-- Course Boxes -->
        <div class="row">
            <div class="col-md-6">
                <div class="course-box" data-toggle="modal" data-target="#infoSysModal">
                    <img src="../enrollment-database/Course Logo/IS.png" alt="Information System">
                    <h2>Bachelor of Science in Information System</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="course-box" data-toggle="modal" data-target="#infoTechModal">
                    <img src="../enrollment-database/Course Logo/IT.png" alt="Information Technology">
                    <h2>Bachelor of Science in Information Technology</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="course-box" data-toggle="modal" data-target="#compSciModal">
                    <img src="../enrollment-database/Course Logo/CS.png" alt="Computer Science">
                    <h2>Bachelor of Science in Computer Science</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="course-box" data-toggle="modal" data-target="#entertainModal">
                    <img src="../enrollment-database/Course Logo/EMC.png" alt="Entertainment and Multimedia Computing">
                    <h2>Bachelor of Science in Entertainment and Multimedia Computing</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals for Course Details -->
    <!-- Bachelor of Science Information System Modal -->
    <div class="modal fade" id="infoSysModal" tabindex="-1" role="dialog" aria-labelledby="infoSysModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoSysModalLabel">Bachelor of Science Information System</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add course details here -->
                    <p class="justified-text">&nbsp;&nbsp;&nbsp;&nbsp;This 4-year program is a hybrid course combining the fundamentals of Computing Science with the basics of business courses like management, accounting, finance and other officemanagement essentials. Students are being honed to designing, developing systems and managing information system setups like transaction processing system, automation system,and other enterprise-based systems.</p>               
                    <h3 style="color: #e77d33;">Possible Career</h3>
                    <ul>
                    <li>Programmer</li>
                    <li>Computer Business Entrepreneur</li>
                    <li>Database Administrator/Designer</li>
                    <li>Systems Analyst</li>
                    <li>Technical Support</li>
                    <li>Information Systems Auditor</li>
                    <li>Computer Instructor</li>
                    </ul> 
                </div>
            </div>
        </div>
    </div>

    <!-- Bachelor of Science Information Technology Modal -->
    <div class="modal fade" id="infoTechModal" tabindex="-1" role="dialog" aria-labelledby="infoTechModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoTechModalLabel">Bachelor of Science Information Technology</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add course details here -->
                    <p class="justified-text">&nbsp;&nbsp;&nbsp;&nbsp;This 4-year program is a hybrid course combining the fundamentals of Computing Science with the basics of business courses like management, accounting, finance and other officemanagement essentials. Students are being honed to designing, developing systems and managing information system setups like transaction processing system, automation system,and other enterprise-based systems.</p>
                    <h3 style="color: #e77d33;">Possible Career</h3>
                    <ul>
                    <li>Programmer</li>
                    <li>Computer Business Entrepreneur</li>
                    <li>Database Administrator/Designer</li>
                    <li>Systems Analystr</li>
                    <li>Technical Support</li>
                    <li>Information Systems Auditor</li>
                    <li>Computer Instructor</li>
                    </ul> 
                </div>
            </div>
        </div>
    </div>

    <!-- Bachelor of Science Computer Science Modal -->
    <div class="modal fade" id="compSciModal" tabindex="-1" role="dialog" aria-labelledby="compSciModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="compSciModalLabel">Bachelor of Science Computer Science</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add course details here -->
                    <p class="justified-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Bachelor of Science in Computer Science combines a core of Computer Science subjects with substantial depth in other required minor subjects. This will ensuresthat students have the required tools to remain updated as technologies and trendschange. The program is design mainly to maintaining the technical knowledge of the students starting from first year up to the last semester of the year of their stay.The curriculum is packed with all the basic and advanced programming skills and necessary supporting computing science fundamentals.</p>                
                    <h3 style="color: #e77d33;">Possible Career</h3>
                    <ul>
                    <li>Programmer/application developer</li>
                    <li>Web developer/Game developer</li>
                    <li>Credit and Collection Assistant</li>
                    <li>Network Administrator</li>
                    <li>Database Administrator/Designer</li>
                    <li>Systems Analyst/Software Engineer</li>
                    <li>Technical Support</li>
                    <li>Information Systems Auditor</li>
                    <li>Computer Instructor</li>
                    </ul> 
                </div>
            </div>
        </div>
    </div>

    <!-- Bachelor of Science Entertainment and Multimedia Computing Modal -->
    <div class="modal fade" id="entertainModal" tabindex="-1" role="dialog" aria-labelledby="entertainModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="entertainModalLabel">Bachelor of Science Entertainment and Multimedia Computing</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add course details here -->
                    <p class="justified-text">&nbsp;&nbsp;&nbsp;&nbsp;The field of Entertainment and Multimedia Computing is the study and use of concepts, principles, and techniques of computing in the design and development of multimedia products and solutions. It includes various applications such as science, entertainment, education, simulations, and advertising.</p>
                    <p class="justified-text">&nbsp;&nbsp;&nbsp;&nbsp;The program enables the students to be knowledgeable of the whole pipeline of Game Development and Digital Animation projects. The students will acquire the independence and creative competencies to articulate project design and requirements of new projects, not necessarily based on standard templates.</p>
                    <h3 style="color: #e77d33;">Possible Career</h3>
                    <p>Specialized in Game Development</p>
                    <ul>
                    <li>Lead Game Programmer/ Developer/ Tools Developer</li>
                    <li>Associate Technical Director/ Game Designer</li>
                    <li>Associate Game Quality Assurance Specialist</li>
                    <li>Senior Interactive Software Developer</li>
                    <li>Associate Game Producer</li>
                    <li>Graphics Programmer</li>
                    <li>Associate Business Development Specialist for Entertainment and Multimedia Industries</li>
                    </ul> 
                </div>
            </div>
        </div>
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
