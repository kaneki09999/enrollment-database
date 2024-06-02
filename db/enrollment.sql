-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 01:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enrollment`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertStudent` (IN `p_student_id` INT, IN `p_program_id` INT, IN `p_year_level` INT, IN `p_firstname` VARCHAR(255), IN `p_middlename` VARCHAR(255), IN `p_lastname` VARCHAR(255), IN `p_birthdate` DATE, IN `p_gender` VARCHAR(255), IN `p_address` TEXT, IN `p_birthplace` VARCHAR(255), IN `p_contact` BIGINT, IN `p_documents` TEXT, IN `p_status` VARCHAR(255), IN `p_registration_date` VARCHAR(255))   BEGIN
    INSERT INTO students (
        student_id, 
        program_id, 
        year_id,
        firstname, 
        middlename, 
        lastname, 
        birthdate, 
        gender, 
        address, 
        birthplace, 
        contact, 
        documents, 
        status,
        registration_date
    ) VALUES (
        p_student_id, 
        p_program_id, 
        p_year_level, 
        p_firstname, 
        p_middlename, 
        p_lastname, 
        p_birthdate, 
        p_gender, 
        p_address, 
        p_birthplace, 
        p_contact, 
        p_documents, 
        p_status,
        p_registration_date
    );
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertStudentLogin` (IN `p_student_id` INT, IN `p_email` VARCHAR(255), IN `p_username` VARCHAR(255), IN `p_password` VARCHAR(255))   BEGIN
    INSERT INTO student_login (
        student_id, 
        email, 
        username, 
        password
    ) VALUES (
        p_student_id, 
        p_email, 
        p_username, 
        p_password
    );
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectAllStudents` ()   BEGIN
    SELECT students.firstname, students.middlename, students.lastname, courses.program, year_level.year_level, 
    students.birthdate, students.gender, students.address, students.birthplace, students.contact, students.* FROM students
    JOIN courses ON students.program_id = courses.id
    JOIN year_level ON students.year_id = year_level.id;
    
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectSubject` ()   BEGIN
    SELECT subjects_by_course.*, year_level.year_level FROM subjects_by_course
    JOIN year_level ON subjects_by_course.year_lvl = year_level.year_id;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `student_login_proc` (IN `p_username` VARCHAR(255))   BEGIN
    DECLARE v_student_id INT;
    DECLARE v_email VARCHAR(255);
    DECLARE v_password VARCHAR(255);

    -- Check if the username matches a record in the student_login table
    SELECT student_id, email, password INTO v_student_id, v_email, v_password
    FROM student_login
    WHERE username = p_username;

    -- Check if a matching record was found
    IF v_student_id IS NOT NULL THEN
        -- Return student details along with hashed password
        SELECT 'Login Attempt' AS status, v_student_id AS student_id, v_email AS email, v_password AS password;
    ELSE
        -- Return failure status
        SELECT 'Login Failed' AS status;
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `program` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `program`) VALUES
(1, 'Bachelor of Science Information System'),
(2, 'Bachelor of Science Information Technology'),
(3, 'Bachelor of Science Computer Science'),
(4, 'Bachelor of Science Entertainment and Multimedia Computing');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_subject`
--

CREATE TABLE `enrolled_subject` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `professor` varchar(255) NOT NULL,
  `register_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section_tbl`
--

CREATE TABLE `section_tbl` (
  `id` int(11) NOT NULL,
  `year_lvl` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section_tbl`
--

INSERT INTO `section_tbl` (`id`, `year_lvl`, `section`) VALUES
(1, '1', 'A'),
(2, '1', 'B'),
(3, '1', 'C'),
(4, '2', 'A'),
(5, '2', 'B'),
(6, '2', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `documents` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `registration_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `program_id`, `year_id`, `section`, `firstname`, `middlename`, `lastname`, `birthdate`, `gender`, `address`, `birthplace`, `contact`, `documents`, `status`, `registration_date`) VALUES
(9, 20247845, 2, 1, '', 'Ajhay', '', 'Arendayen', '2024-06-21', 'Male', 'Ph9, Pkg6, Blk10, Lot4', 'Bagong Silang', 9123456789, 'uploads/MOA-UNDERGRAD-EDITED-2.docx-1.docx;', 'Pending', '2024-06-01 14:27:20'),
(10, 20248681, 1, 1, '', 'Dave', '', 'Bernal', '2021-03-02', 'Male', 'TAGA WALANG USA', 'Bagong Silang', 9123456789, 'uploads/MOA-UNDERGRAD-EDITED-2.docx-1.docx;', 'Pending', '2024-06-02 09:21:29');

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_information`
-- (See below for the actual view)
--
CREATE TABLE `student_information` (
`student_id` int(11)
,`firstname` varchar(255)
,`lastname` varchar(255)
,`middlename` varchar(255)
,`birthdate` date
,`birthplace` varchar(255)
,`gender` varchar(255)
,`address` text
,`contact` bigint(20)
,`documents` text
,`program` varchar(255)
,`year_level` varchar(255)
,`email` varchar(255)
,`username` varchar(255)
,`registration_date` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `student_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`student_id`, `email`, `username`, `password`) VALUES
(20247845, 'ajhayarendayen@gmail.com', 'ajhay', '$2y$10$GvYvK/N34IgtI0N0R7QZMOXjWN5ijA7iAJ2eUB9jK6aXUiVFWg6BC'),
(20248681, 'dave@gmail.com', 'dave', '$2y$10$8t036sUe0zHKDo4SJ8S2IeNpRuaw/SBw7miGEqUe8vUj.o0Arf4t2');

-- --------------------------------------------------------

--
-- Table structure for table `subjects_by_course`
--

CREATE TABLE `subjects_by_course` (
  `year_lvl` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `unit` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `professor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects_by_course`
--

INSERT INTO `subjects_by_course` (`year_lvl`, `id`, `subject_code`, `description`, `unit`, `day`, `time`, `professor`) VALUES
(1, 1, 'CSS 101', 'Introduction to Computing', 3, 'Monday', '7:00 AM - 10:00 AM', ''),
(1, 2, 'CCS 102', 'Computer Programming 1', 5, 'Tuesday', '10:00 AM - 1:00 PM', ''),
(1, 4, 'CCS 109', 'Business Application Software', 3, 'Tuesday', '1:00 PM - 4:00 PM', ''),
(1, 5, 'NSTP 111', 'NSTP - CTWTS1', 3, '', '', ''),
(1, 6, 'GEC 001', 'Understanding the Self', 3, 'Friday', '4:00 PM - 7:00 PM', ''),
(1, 7, 'GEC 002', 'Reading in the Philippine History', 3, 'Saturday', '10:00 AM - 1:00 PM', ''),
(1, 8, 'GEC 003', 'Contemporary World', 3, 'Sunday', '7:00 AM - 10:00 AM', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `year_level`
--

CREATE TABLE `year_level` (
  `id` int(11) NOT NULL,
  `year_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `year_level`
--

INSERT INTO `year_level` (`id`, `year_level`) VALUES
(1, '1st Year'),
(2, '2nd Year'),
(3, '3rd Year'),
(4, '4th Year');

-- --------------------------------------------------------

--
-- Structure for view `student_information`
--
DROP TABLE IF EXISTS `student_information`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_information`  AS SELECT `students`.`student_id` AS `student_id`, `students`.`firstname` AS `firstname`, `students`.`lastname` AS `lastname`, `students`.`middlename` AS `middlename`, `students`.`birthdate` AS `birthdate`, `students`.`birthplace` AS `birthplace`, `students`.`gender` AS `gender`, `students`.`address` AS `address`, `students`.`contact` AS `contact`, `students`.`documents` AS `documents`, `courses`.`program` AS `program`, `year_level`.`year_level` AS `year_level`, `student_login`.`email` AS `email`, `student_login`.`username` AS `username`, `students`.`registration_date` AS `registration_date` FROM (((`students` join `student_login` on(`students`.`student_id` = `student_login`.`student_id`)) join `courses` on(`students`.`program_id` = `courses`.`id`)) join `year_level` on(`students`.`year_id` = `year_level`.`id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enrolled_subject`
--
ALTER TABLE `enrolled_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_tbl`
--
ALTER TABLE `section_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subjects_by_course`
--
ALTER TABLE `subjects_by_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `year_level`
--
ALTER TABLE `year_level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrolled_subject`
--
ALTER TABLE `enrolled_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `section_tbl`
--
ALTER TABLE `section_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subjects_by_course`
--
ALTER TABLE `subjects_by_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `year_level`
--
ALTER TABLE `year_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_login`
--
ALTER TABLE `student_login`
  ADD CONSTRAINT `fk_student_login_student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
