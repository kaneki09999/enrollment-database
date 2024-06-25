-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 07:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddCourse` (IN `programName` VARCHAR(255))   BEGIN
    INSERT INTO courses (program) VALUES (programName);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AddSubject` (IN `p_subject_code` VARCHAR(255), IN `p_description` VARCHAR(255), IN `p_units` VARCHAR(255))   BEGIN
    INSERT INTO subjects (subject_code, description, units)
    VALUES (p_subject_code, p_description, p_units);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AddSubjectByCourse` (IN `p_year_lvl` INT, IN `p_program` VARCHAR(255), IN `p_subject_code` VARCHAR(50), IN `p_description` TEXT, IN `p_unit` INT, IN `p_day` VARCHAR(50), IN `p_time` VARCHAR(50), IN `p_section` VARCHAR(50), IN `p_room` VARCHAR(50), IN `p_professor` VARCHAR(255))   BEGIN
    INSERT INTO subjects_by_course (year_lvl, program, subject_code, description, unit, day, time, section, room, professor)
    VALUES (p_year_lvl, p_program, p_subject_code, p_description, p_unit, p_day, p_time, p_section, p_room, p_professor);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_course` (IN `courseId` INT)   BEGIN
    DELETE FROM courses WHERE id = courseId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_prof` (IN `profId` INT)   BEGIN
    DELETE FROM professor WHERE id = profId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_schedules` (IN `schedule_id` INT)   BEGIN
    DELETE FROM subjects_by_course WHERE id = schedule_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_subject` (IN `subject_id` INT)   BEGIN
    DELETE FROM subjects WHERE id = subject_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllStudentLogs` ()   BEGIN
SELECT students_log.operation, students_log.changed_at, `students`.`id` AS `id`, `students`.`student_id` AS `student_id`, `students`.`firstname` AS `firstname`, `students`.`middlename` AS `middlename`, `students`.`lastname` AS `lastname`, `students`.`birthdate` AS `birthdate`, `students`.`birthplace` AS `birthplace`, `students`.`gender` AS `gender`, `students`.`address` AS `address`, `students`.`contact` AS `contact`, `students`.`documents` AS `documents`, `courses`.`program` AS `program`, `year_level`.`year_level` AS `year_level`, `student_login`.`email` AS `email`, `student_login`.`username` AS `username`, `students`.`status` AS `status`, `students`.`registration_date` AS `registration_date` FROM (((`students` join `courses` on(`students`.`program_id` = `courses`.`id`)) join `year_level` on(`students`.`year_id` = `year_level`.`id`)) join `student_login` on(`students`.`student_id` = `student_login`.`student_id`))
JOIN students_log ON students.student_id = students_log.student_id;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetCourses` ()   BEGIN
    SELECT id, program FROM courses;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetStudentDetails` (IN `student_id` INT)   BEGIN
  SELECT students.firstname, 
       students.middlename, 
       students.lastname, 
       courses.program, 
       year_level.year_level, 
       students.birthdate, 
       students.gender, 
       students.address, 
       students.birthplace, 
       students.contact, 
       students.*,
       student_login.username,
       section_tbl.section
FROM students
JOIN courses ON students.program_id = courses.id
JOIN year_level ON students.year_id = year_level.id 
JOIN student_login ON students.student_id = student_login.student_id
LEFT JOIN section_student ON students.student_id = section_student.student_id
LEFT JOIN section_tbl ON section_student.section = section_tbl.id
WHERE students.student_id = student_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetStudentSchedule` (IN `student_id` INT, IN `program_id` INT, IN `year_lvl_id` INT)   BEGIN
    SELECT 
        ss.student_id, 
        s.firstname, 
        s.lastname, 
        st.section, 
        yl.year_level, 
        c.program, 
        sbc.subject_code, 
        sbc.description, 
        sbc.unit, 
        sbc.day, 
        sbc.time, 
        sbc.room, 
        p.name,
        s.status
    FROM 
        subjects_by_course sbc
    JOIN 
        section_tbl st ON sbc.section = st.id
    JOIN 
        courses c ON sbc.program = c.id 
    JOIN 
        year_level yl ON sbc.year_lvl = yl.id
    JOIN 
        section_student ss ON st.id = ss.section
    JOIN 
        students s ON ss.student_id = s.student_id
    JOIN 
        professor p ON sbc.professor = p.id 
    WHERE 
        s.student_id = student_id AND sbc.program = program_id AND sbc.year_lvl = year_lvl_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetStudentScheduleGrading` (IN `student_id` INT, IN `program_id` INT, IN `year_lvl_id` INT)   BEGIN
SELECT
    sbc.id,
    ss.student_id,
    s.firstname,
    s.lastname,
    st.section,
    yl.year_level,
    c.program,
    sbc.subject_code,
    sbc.description,
    sbc.unit,
    sbc.day,
    sbc.time,
    sbc.room,
    p.name,
    s.status,
    g.midterm,
    g.finalterm,
    g.final_grades,
    g.remarks
FROM
    subjects_by_course sbc
JOIN
    section_tbl st ON sbc.section = st.id
JOIN
    courses c ON sbc.program = c.id
JOIN
    year_level yl ON sbc.year_lvl = yl.id
JOIN
    section_student ss ON st.id = ss.section
JOIN
    students s ON ss.student_id = s.student_id
JOIN
    professor p ON sbc.professor = p.id
LEFT JOIN
    grading g ON s.student_id = g.student_id AND sbc.id = g.subject_id
WHERE
        s.student_id = student_id AND sbc.program = program_id AND sbc.year_lvl = year_lvl_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetSubjects` ()   BEGIN
    SELECT id, subject_code, description, units
    FROM subjects;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_subjects` ()   BEGIN
    SELECT subject_code, description, units FROM subjects;
END$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_grading` (IN `p_subject_id` INT, IN `p_student_id` INT, IN `p_midterm` DECIMAL(10,2), IN `p_finalterm` DECIMAL(10,2), IN `p_final_grade` VARCHAR(255), IN `p_remarks` VARCHAR(255), IN `p_date` VARCHAR(255))   BEGIN
    INSERT INTO grading (subject_id, student_id, midterm, finalterm, final_grades, remarks, date)
    VALUES (p_subject_id, p_student_id, p_midterm, p_finalterm, p_final_grade, p_remarks, p_date);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_professor` (IN `name_param` VARCHAR(255), IN `major_param` VARCHAR(255), IN `contact_param` VARCHAR(255), IN `date_added_param` VARCHAR(255))   BEGIN
    INSERT INTO professor (name, major, contact, add_date) VALUES (name_param, major_param, contact_param, date_added_param);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_section_student` (IN `student_id_param` VARCHAR(255), IN `section_param` VARCHAR(255), IN `year_level_param` VARCHAR(255))   BEGIN
    INSERT INTO section_student (student_id, section, year_level) VALUES (student_id_param, section_param, year_level_param);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectAdmin` (IN `p_username` VARCHAR(255))   BEGIN
    SELECT * FROM tbladmin WHERE username = p_username;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectAllProfessors` ()   BEGIN
    SELECT * FROM professor;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectAllSubjectsByCourseLog` ()   SELECT subjects_by_course_log.operation, subjects_by_course_log.changed_at, `subjects_by_course`.`id` AS `subject_id`, `courses`.`program` AS `program`, `year_level`.`year_level` AS `year_level`, `subjects_by_course`.`subject_code` AS `subject_code`, `subjects_by_course`.`description` AS `description`, `subjects_by_course`.`unit` AS `unit`, `subjects_by_course`.`day` AS `day`, `subjects_by_course`.`time` AS `time`, `section_tbl`.`section` AS `section`, `subjects_by_course`.`room` AS `room`, `professor`.`name` AS `name` FROM ((((`subjects_by_course` join `section_tbl` on(`subjects_by_course`.`section` = `section_tbl`.`id`)) join `courses` on(`subjects_by_course`.`program` = `courses`.`id`)) join `year_level` on(`subjects_by_course`.`year_lvl` = `year_level`.`id`)) join `professor` on(`subjects_by_course`.`professor` = `professor`.`id`))  
JOIN subjects_by_course_log ON subjects_by_course.id = subjects_by_course_log.id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectAllSubjectsLog` ()   BEGIN
    SELECT * FROM subjects_log;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectProf` ()   BEGIN
    SELECT * FROM professor;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateSubject` (IN `p_id` INT, IN `p_subject_code` VARCHAR(255), IN `p_description` VARCHAR(255), IN `p_units` VARCHAR(255))   BEGIN
    UPDATE subjects 
    SET 
        subject_code = p_subject_code,
        description = p_description,
        units = p_units
    WHERE 
        id = p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_counts` ()   BEGIN
    DECLARE p_professor_count INT;
    DECLARE p_student_count INT;
    DECLARE p_pending_student_count INT;
    DECLARE p_schedule_count INT;
    DECLARE p_course_count INT;
    DECLARE p_subject_count INT;

    -- Fetch counts
    SELECT COUNT(*) INTO p_professor_count FROM professor;
    SELECT COUNT(*) INTO p_student_count FROM confirmed_students;
    SELECT COUNT(*) INTO p_pending_student_count FROM pending_students;
    SELECT COUNT(*) INTO p_schedule_count FROM schedules;
    SELECT COUNT(*) INTO p_course_count FROM courses;
    SELECT COUNT(*) INTO p_subject_count FROM subjects;

    -- Insert or update counts in the counts table
    REPLACE INTO counts (id, professor_count, student_count, pending_student_count, schedule_count, course_count, subject_count)
    VALUES (1, p_professor_count, p_student_count, p_pending_student_count, p_schedule_count, p_course_count, p_subject_count);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_student_status` (IN `student_id_param` VARCHAR(255))   BEGIN
    UPDATE students SET status = 'Confirmed' WHERE student_id = student_id_param;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_subject_by_course` (IN `p_year_lvl` INT, IN `p_program` VARCHAR(255), IN `p_subject_code` VARCHAR(255), IN `p_description` VARCHAR(255), IN `p_unit` INT, IN `p_day` VARCHAR(255), IN `p_time` VARCHAR(255), IN `p_section` VARCHAR(255), IN `p_room` VARCHAR(255), IN `p_professor` VARCHAR(255), IN `p_id` INT)   BEGIN
    UPDATE subjects_by_course SET 
        year_lvl = p_year_lvl, 
        program = p_program, 
        subject_code = p_subject_code, 
        description = p_description, 
        unit = p_unit, 
        day = p_day, 
        time = p_time,
        section = p_section,
        room = p_room,
        professor = p_professor
    WHERE id = p_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `confirmed_students`
-- (See below for the actual view)
--
CREATE TABLE `confirmed_students` (
`section` varchar(255)
,`student_id` int(11)
,`firstname` varchar(255)
,`middlename` varchar(255)
,`lastname` varchar(255)
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
,`status` varchar(255)
,`registration_date` varchar(255)
,`program_id` int(11)
,`year_id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `counts`
--

CREATE TABLE `counts` (
  `id` int(11) NOT NULL,
  `professor_count` int(11) DEFAULT NULL,
  `student_count` int(11) DEFAULT NULL,
  `pending_student_count` int(11) DEFAULT NULL,
  `schedule_count` int(11) DEFAULT NULL,
  `course_count` int(11) DEFAULT NULL,
  `subject_count` int(11) DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `counts`
--

INSERT INTO `counts` (`id`, `professor_count`, `student_count`, `pending_student_count`, `schedule_count`, `course_count`, `subject_count`, `last_updated`) VALUES
(1, 3, 10, 0, 19, 4, 12, '2024-06-25 03:35:57');

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
-- Table structure for table `grading`
--

CREATE TABLE `grading` (
  `id` int(11) NOT NULL,
  `subject_id` int(25) NOT NULL,
  `student_id` int(255) NOT NULL,
  `midterm` varchar(25) NOT NULL,
  `finalterm` varchar(25) NOT NULL,
  `final_grades` varchar(25) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grading`
--

INSERT INTO `grading` (`id`, `subject_id`, `student_id`, `midterm`, `finalterm`, `final_grades`, `remarks`, `date`) VALUES
(3, 28, 20246553, '1.00', '1.00', '1.00', 'Passed', '2024-06-16 04:35:57'),
(5, 28, 20246139, '1.25', '2.00', '1.75', 'Passed', '2024-06-16 04:43:44'),
(7, 29, 20246139, '1.25', '1.75', '1.50', 'Passed', '2024-06-16 06:01:24'),
(8, 43, 20241836, '2.25', '1.00', '1.50', 'Passed', '2024-06-16 06:02:36'),
(9, 46, 20241836, '2.25', '2.75', '2.50', 'Passed', '2024-06-16 06:03:16'),
(10, 31, 20246139, '1.25', '1.75', '1.50', 'Passed', '2024-06-16 06:04:45'),
(11, 34, 20246139, '2.25', '2.00', '2.00', 'Passed', '2024-06-16 06:05:01'),
(12, 30, 20246139, '1.25', '1.00', '1.00', 'Passed', '2024-06-16 06:11:13'),
(13, 32, 20246139, '1.5', '1.75', '1.75', 'Passed', '2024-06-16 06:11:40'),
(14, 48, 20247369, '1.25', '2.75', '2.25', 'Passed', '2024-06-16 06:12:22'),
(15, 40, 20245266, '2.25', '1.00', '1.50', 'Passed', '2024-06-16 06:15:13'),
(16, 29, 20246553, '1.25', '1.00', '1.00', 'Passed', '2024-06-19 13:03:18'),
(17, 30, 20246553, '2.50', '1.00', '1.50', 'Passed', '2024-06-19 13:03:41'),
(18, 34, 20246553, '1.25', '1.00', '1.00', 'Passed', '2024-06-19 13:03:58'),
(19, 31, 20246553, '2.25', '1.75', '2.00', 'Passed', '2024-06-19 13:04:53'),
(20, 32, 20246553, '2.25', '1.00', '1.50', 'Passed', '2024-06-19 13:05:10'),
(21, 35, 20246553, '1.25', '1.00', '1.00', 'Passed', '2024-06-19 13:05:22'),
(22, 33, 20246553, '2.25', '1.00', '1.50', 'Passed', '2024-06-19 13:05:39'),
(23, 33, 20246139, '1.25', '4.00', '3.00', 'Passed', '2024-06-19 13:27:36'),
(24, 35, 20246139, '1.25', '4.00', '3.00', 'Passed', '2024-06-19 13:28:02'),
(25, 28, 20247484, '1.25', '1.00', '1.00', 'Passed', '2024-06-24 13:06:41');

--
-- Triggers `grading`
--
DELIMITER $$
CREATE TRIGGER `grading_after_delete` AFTER DELETE ON `grading` FOR EACH ROW BEGIN
  INSERT INTO `grading_log` (
    `operation`, `changed_at`, `id`, `subject_id`, `student_id`, `midterm`,
    `finalterm`, `final_grades`, `remarks`, `date`
  ) VALUES (
    'DELETE', NOW(), OLD.id, OLD.subject_id, OLD.student_id, OLD.midterm,
    OLD.finalterm, OLD.final_grades, OLD.remarks, OLD.date
  );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `grading_after_insert` AFTER INSERT ON `grading` FOR EACH ROW BEGIN
  INSERT INTO `grading_log` (
    `operation`, `changed_at`, `id`, `subject_id`, `student_id`, `midterm`,
    `finalterm`, `final_grades`, `remarks`, `date`
  ) VALUES (
    'INSERT', NOW(), NEW.id, NEW.subject_id, NEW.student_id, NEW.midterm,
    NEW.finalterm, NEW.final_grades, NEW.remarks, NEW.date
  );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `grading_after_update` AFTER UPDATE ON `grading` FOR EACH ROW BEGIN
  INSERT INTO `grading_log` (
    `operation`, `changed_at`, `id`, `subject_id`, `student_id`, `midterm`,
    `finalterm`, `final_grades`, `remarks`, `date`
  ) VALUES (
    'UPDATE', NOW(), OLD.id, OLD.subject_id, OLD.student_id, OLD.midterm,
    OLD.finalterm, OLD.final_grades, OLD.remarks, OLD.date
  );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `grading_log`
--

CREATE TABLE `grading_log` (
  `log_id` int(11) NOT NULL,
  `operation` varchar(10) NOT NULL,
  `changed_at` datetime NOT NULL,
  `id` int(11) DEFAULT NULL,
  `subject_id` int(25) DEFAULT NULL,
  `student_id` int(255) DEFAULT NULL,
  `midterm` varchar(25) DEFAULT NULL,
  `finalterm` varchar(25) DEFAULT NULL,
  `final_grades` varchar(25) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `date` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grading_log`
--

INSERT INTO `grading_log` (`log_id`, `operation`, `changed_at`, `id`, `subject_id`, `student_id`, `midterm`, `finalterm`, `final_grades`, `remarks`, `date`) VALUES
(1, 'UPDATE', '2024-06-24 08:56:22', 16, 29, 20246553, '1.25', '2.00', '1.75', 'Passed', '2024-06-19 13:03:18'),
(3, 'INSERT', '2024-06-24 19:06:41', 25, 28, 20247484, '1.25', '1.00', '1.00', 'Passed', '2024-06-24 13:06:41');

-- --------------------------------------------------------

--
-- Stand-in structure for view `grading_logs`
-- (See below for the actual view)
--
CREATE TABLE `grading_logs` (
`firstname` varchar(255)
,`lastname` varchar(255)
,`log_id` int(11)
,`operation` varchar(10)
,`changed_at` datetime
,`id` int(11)
,`subject_id` int(25)
,`student_id` int(255)
,`midterm` varchar(25)
,`finalterm` varchar(25)
,`final_grades` varchar(25)
,`remarks` varchar(255)
,`date` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pending_students`
-- (See below for the actual view)
--
CREATE TABLE `pending_students` (
`id` int(11)
,`student_id` int(11)
,`firstname` varchar(255)
,`middlename` varchar(255)
,`lastname` varchar(255)
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
,`status` varchar(255)
,`registration_date` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `contact` bigint(255) NOT NULL,
  `add_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`id`, `name`, `major`, `contact`, `add_date`) VALUES
(5, 'Christian Dave Bernal', 'Frontend Developer', 9358706908, '2024-06-06 03:05:43'),
(6, 'Ajhay Ramos Arendayen', 'Backend Developer', 9358706908, '2024-06-06 03:10:22'),
(7, 'Melvin Marvin Custodio', 'CSS', 9358706908, '2024-06-07 08:09:53');

-- --------------------------------------------------------

--
-- Stand-in structure for view `schedules`
-- (See below for the actual view)
--
CREATE TABLE `schedules` (
`subject_id` int(11)
,`program` varchar(255)
,`year_level` varchar(255)
,`subject_code` varchar(255)
,`description` varchar(255)
,`unit` int(11)
,`day` varchar(255)
,`time` varchar(255)
,`section` varchar(255)
,`room` varchar(255)
,`name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `section_student`
--

CREATE TABLE `section_student` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `year_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section_student`
--

INSERT INTO `section_student` (`id`, `student_id`, `section`, `year_level`) VALUES
(9, '20246553', '1', '1'),
(10, '20243240', '2', '1'),
(11, '20241836', '2', '1'),
(12, '20245266', '1', '2'),
(13, '20241478', '1', '1'),
(14, '20246483', '2', '1'),
(15, '20246139', '1', '1'),
(16, '20247369', '1', '3'),
(17, '20246808', '1', '1'),
(18, '20243959', '1', '4'),
(19, '20247484', '1', '1');

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

INSERT INTO `students` (`id`, `student_id`, `program_id`, `year_id`, `firstname`, `middlename`, `lastname`, `birthdate`, `gender`, `address`, `birthplace`, `contact`, `documents`, `status`, `registration_date`) VALUES
(25, 20241478, 4, 1, 'Christian Dave', '', 'Bernal', '2024-05-22', 'Male', '925 ilang ilang st. bo. concepcion tala', 'sadsadsad', 9123456789, 'uploads/registration_form_praticum_vin.pdf;uploads/Enrollment Admin (1).pdf;uploads/ARENDAYEN-REGFORM-PRACTICUM1.pdf;', 'Confirmed', '2024-06-07 07:42:15'),
(23, 20241836, 2, 1, 'Melvin', 'M.', 'Custodio', '2024-05-28', 'Male', '925 ilang ilang st. bo. concepcion tala', 'Caloocan City', 9123456789, 'uploads/registration_form_praticum_vin.pdf;', 'Confirmed', '2024-06-07 04:00:21'),
(30, 20243959, 2, 4, 'asdsdsd', 'dasdasdsadasd', 'asdsadsa', '2024-06-14', 'Female', 'Ph9, Pkg6, Blk10, Lot4 Bagong Silang Caloocan City', 'Bagong Silang', 9123456789, 'uploads/MOA-UNDERGRAD-EDITED-2.docx-1.docx;', 'Confirmed', '2024-06-16 04:05:25'),
(24, 20245266, 3, 2, 'Ricky James', '', 'Molina', '2024-05-28', 'Male', 'Ph12, BLK20 LOT2', 'Caloocan City', 0, 'uploads/Enrollment Admin.pdf;uploads/OJT-DOCUMENTS-VIN.docx;', 'Confirmed', '2024-06-07 05:04:26'),
(28, 20246139, 1, 1, 'Jan Jan', '', 'Santiago', '2024-06-04', 'Male', 'Ph9, Pkg6, Blk10, Lot4', 'Bagong Silang', 9123456789, 'uploads/QUESTIONNAIRES WITH ANSWERS.pdf;', 'Confirmed', '2024-06-09 09:31:03'),
(26, 20246483, 2, 1, 'brian', 'Q', 'bucio', '2024-05-29', 'Female', '925 ilang ilang st. bo. concepcion tala', 'Caloocan City', 9123456789, 'uploads/Enrollment Admin.pdf;', 'Confirmed', '2024-06-07 08:11:33'),
(21, 20246553, 1, 1, 'Ajhay', 'R', 'Arendayen', '2024-05-15', 'Male', 'Ph9, Bagong Silang, Caloocan City', 'Caloocan City', 9123456789, 'uploads/ARENDAYEN-REGFORM-PRACTICUM1.pdf;', 'Confirmed', '2024-06-07 03:06:10'),
(31, 20246808, 1, 1, 'asdasd', 'sdsadasdsd', 'asdasd', '2024-06-02', 'Male', 'asdasd', 'Bagong Silang', 9123456789, 'uploads/MOA-UNDERGRAD-EDITED-2.docx-1.docx;', 'Confirmed', '2024-06-19 13:30:36'),
(29, 20247369, 1, 3, 'asdsadas', '', 'dasdsadasdsadasd', '2024-06-04', 'Male', 'sadsadsadasdad', 'Bagong Silang', 9123456789, 'uploads/MOA-UNDERGRAD-EDITED-2.docx-1.docx;', 'Confirmed', '2024-06-09 09:50:03'),
(32, 20247484, 1, 1, 'Mark', '', 'Tonio', '2020-02-24', 'Male', 'Ph9, Pkg6, Blk10, Lot4', 'Bagong Silang', 9123456789, 'uploads/Anser-key.pdf;', 'Confirmed', '2024-06-24 13:03:53');

--
-- Triggers `students`
--
DELIMITER $$
CREATE TRIGGER `students_after_delete` AFTER DELETE ON `students` FOR EACH ROW BEGIN
  INSERT INTO `students_log` (
    `operation`, `changed_at`, `id`, `student_id`, `program_id`, `year_id`, `firstname`,
    `middlename`, `lastname`, `birthdate`, `gender`, `address`, `birthplace`,
    `contact`, `documents`, `status`, `registration_date`
  ) VALUES (
    'DELETE', NOW(), OLD.id, OLD.student_id, OLD.program_id, OLD.year_id, OLD.firstname,
    OLD.middlename, OLD.lastname, OLD.birthdate, OLD.gender, OLD.address, OLD.birthplace,
    OLD.contact, OLD.documents, OLD.status, OLD.registration_date
  );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `students_after_insert` AFTER INSERT ON `students` FOR EACH ROW BEGIN
  INSERT INTO `students_log` (
    `operation`, `changed_at`, `id`, `student_id`, `program_id`, `year_id`, `firstname`,
    `middlename`, `lastname`, `birthdate`, `gender`, `address`, `birthplace`,
    `contact`, `documents`, `status`, `registration_date`
  ) VALUES (
    'INSERT', NOW(), NEW.id, NEW.student_id, NEW.program_id, NEW.year_id, NEW.firstname,
    NEW.middlename, NEW.lastname, NEW.birthdate, NEW.gender, NEW.address, NEW.birthplace,
    NEW.contact, NEW.documents, NEW.status, NEW.registration_date
  );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `students_after_update` AFTER UPDATE ON `students` FOR EACH ROW BEGIN
  INSERT INTO `students_log` (
    `operation`, `changed_at`, `id`, `student_id`, `program_id`, `year_id`, `firstname`,
    `middlename`, `lastname`, `birthdate`, `gender`, `address`, `birthplace`,
    `contact`, `documents`, `status`, `registration_date`
  ) VALUES (
    'UPDATE', NOW(), OLD.id, OLD.student_id, OLD.program_id, OLD.year_id, OLD.firstname,
    OLD.middlename, OLD.lastname, OLD.birthdate, OLD.gender, OLD.address, OLD.birthplace,
    OLD.contact, OLD.documents, OLD.status, OLD.registration_date
  );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `students_log`
--

CREATE TABLE `students_log` (
  `log_id` int(11) NOT NULL,
  `operation` varchar(10) NOT NULL,
  `changed_at` datetime NOT NULL,
  `id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `birthplace` varchar(255) DEFAULT NULL,
  `contact` bigint(20) DEFAULT NULL,
  `documents` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `registration_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students_log`
--

INSERT INTO `students_log` (`log_id`, `operation`, `changed_at`, `id`, `student_id`, `program_id`, `year_id`, `firstname`, `middlename`, `lastname`, `birthdate`, `gender`, `address`, `birthplace`, `contact`, `documents`, `status`, `registration_date`) VALUES
(1, 'INSERT', '2024-06-24 19:03:53', 32, 20247484, 1, 1, 'Mark', '', 'Tonio', '2020-02-24', 'Male', 'Ph9, Pkg6, Blk10, Lot4', 'Bagong Silang', 9123456789, 'uploads/Anser-key.pdf;', 'Pending', '2024-06-24 13:03:53'),
(2, 'UPDATE', '2024-06-24 19:06:08', 32, 20247484, 1, 1, 'Mark', '', 'Tonio', '2020-02-24', 'Male', 'Ph9, Pkg6, Blk10, Lot4', 'Bagong Silang', 9123456789, 'uploads/Anser-key.pdf;', 'Pending', '2024-06-24 13:03:53');

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
(20241478, 'bernal@gmail.com', 'berns', '$2y$10$w1OBOQaQbMpWQWLTPV97Lu5ivG7X797C7Qd8OeZUzCIEeAoDT7ls2'),
(20241836, 'cstd09@gmail.com', 'vin', '$2y$10$Lcmi20sSmQ714N1N0i4mg.3183.2ItKnUG.vZtl.4HYPNNd.BiJK2'),
(20243959, 'tanjirowkamado@gmail.com', 'ajhay21', '$2y$10$tQo8bPV4w44GJtppryOJ6uChXm0m41unZbC6vV3kFWT87HhDn66n.'),
(20245266, 'rickyjames@gmail.com', 'ricky', '$2y$10$rDxd1WYL4j7pa.GiHoWC4.nzmBoXbCwRAbdLcmYMA2JM0j8LxQh5C'),
(20246139, 'asdsadsadn@gmail.com', 'janjan', '$2y$10$Fwr7Z0iGT2qM8d64KLQbkeeqtqYGv/Gk5stgkUQOftNZivezP8vb6'),
(20246483, 'brian@gmail.com', 'brian', '$2y$10$P3NrQPQL40ZCaw60fjBAvez/LHlotfjfZPQPZpA2/NKcuFSNP4Boe'),
(20246553, 'ajhayarendayen@gmail.com', 'ajhay', '$2y$10$v9C1dLx5cPh709j6NQGBauGH1d8l.zJo0vTWRsj56EwYb.orJH9ZK'),
(20246808, 'tanjirowkamado@gmail.com', 'admin123', '$2y$10$9bD7GDk5xunN4KoZMaMKKObGXIU9S6149WMcRofB9qVyIp3hpjC..'),
(20247369, 'ajhayarendayen@gmail.com', 'ajhay111', '$2y$10$cWx8T7j6Bq0GAcOr.CLVL.RIW6tVKqwCzUbFjRdPHab6VFJ6zAklm'),
(20247484, 'asdsadasdsadn@gmail.com', 'mark', '$2y$10$fIHs4IhhTc0KkuoljXq./uuqb06nUY3U9Mjr60pjIeNW6BPQVSamO');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `units` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_code`, `description`, `units`) VALUES
(2, 'CCS 101', 'Introduction to Computing', '3'),
(3, 'CCS 102', 'Computer Programming 1', '5'),
(4, 'CCS 109', 'Business Application Software', '3'),
(5, 'PATHFit 1', 'Movement Competency Training', '3'),
(6, 'NSTP 111', 'NSTP (CWTS) 1', '3'),
(7, 'GEC 001', 'Understanding the Self', '3'),
(8, 'GEC 002', 'Readings in the Philippine History', '3'),
(9, 'GEC 003', 'Contemporary World', '3'),
(10, 'GEC 004', 'Mathematics of the modern world', '3'),
(11, 'CSS 102', 'Fundamentals of Programming', '5'),
(12, 'GEC 005', 'Purposive Communication', '3'),
(13, 'EMC 101', 'Drafting', '3');

--
-- Triggers `subjects`
--
DELIMITER $$
CREATE TRIGGER `subjects_after_delete` AFTER DELETE ON `subjects` FOR EACH ROW BEGIN
  INSERT INTO `subjects_log` (
    `operation`, `changed_at`, `id`, `subject_code`, `description`, `units`
  ) VALUES (
    'DELETE', NOW(), OLD.id, OLD.subject_code, OLD.description, OLD.units
  );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `subjects_after_insert` AFTER INSERT ON `subjects` FOR EACH ROW BEGIN
  INSERT INTO `subjects_log` (
    `operation`, `changed_at`, `id`, `subject_code`, `description`, `units`
  ) VALUES (
    'INSERT', NOW(), NEW.id, NEW.subject_code, NEW.description, NEW.units
  );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `subjects_after_update` AFTER UPDATE ON `subjects` FOR EACH ROW BEGIN
  INSERT INTO `subjects_log` (
    `operation`, `changed_at`, `id`, `subject_code`, `description`, `units`
  ) VALUES (
    'UPDATE', NOW(), OLD.id, OLD.subject_code, OLD.description, OLD.units
  );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `subjects_by_course`
--

CREATE TABLE `subjects_by_course` (
  `year_lvl` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `program` varchar(255) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `unit` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `professor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects_by_course`
--

INSERT INTO `subjects_by_course` (`year_lvl`, `id`, `program`, `subject_code`, `description`, `unit`, `day`, `time`, `section`, `room`, `professor`) VALUES
(1, 28, '1', 'CCS 101', 'Introduction to Computing', 3, 'Monday', '7:00 AM - 10:00 AM', '1', '302', '5'),
(1, 29, '1', 'CCS 102', 'Computer Programming 1', 5, 'Tuesday', '10:00 AM - 1:00 PM', '1', '303', '6'),
(1, 30, '1', 'GEC 001', 'Understanding the Self', 3, 'Wednesday', '10:00 AM - 1:00 PM', '1', '304', '5'),
(1, 31, '1', 'PATHFit 1', 'Movement Competency Training', 3, 'Thursday', '4:00 PM - 7:00 PM', '1', 'Court', '5'),
(1, 32, '1', 'GEC 003', 'Contemporary World', 3, 'Saturday', '10:00 AM - 1:00 PM', '1', '302', '6'),
(1, 33, '1', 'GEC 002', 'Readings in the Philippine History', 3, 'Friday', '10:00 AM - 1:00 PM', '1', '302', '5'),
(1, 34, '1', 'NSTP 111', 'NSTP (CWTS) 1', 3, 'Friday', '10:00 AM - 1:00 PM', '1', 'TBA', '6'),
(1, 35, '1', 'CCS 109', 'Business Application Software', 3, 'Monday', '1:00 PM - 4:00 PM', '1', '302', '6'),
(1, 36, '1', 'CCS 101', 'Introduction to Computing', 3, 'Sunday', '10:00 AM - 1:00 PM', '2', '302', '5'),
(1, 37, '1', 'CCS 101', 'Introduction to Computing', 3, 'Thursday', '7:00 AM - 10:00 AM', '2', '302', '6'),
(1, 38, '1', 'CCS 102', 'Computer Programming 1', 5, 'Thursday', '7:00 AM - 10:00 AM', '2', '302', '5'),
(2, 40, '3', 'CSS 102', 'Fundamentals of Programming', 5, 'Monday', '10:00 AM - 1:00 PM', '1', '302', '6'),
(2, 41, '3', 'GEC 005', 'Purposive Communication', 3, 'Friday', '4:00 PM - 7:00 PM', '2', '304', '6'),
(1, 42, '2', 'CCS 101', 'Introduction to Computing', 3, 'Tuesday', '1:00 PM - 4:00 PM', '3', '302', '6'),
(1, 43, '2', 'GEC 001', 'Understanding the Self', 3, 'Tuesday', '1:00 PM - 4:00 PM', '2', '302', '6'),
(1, 44, '2', 'CCS 102', 'Computer Programming 1', 5, 'Thursday', '10:00 AM - 1:00 PM', '1', '304', '5'),
(1, 45, '2', 'CCS 102', 'Computer Programming 1', 5, 'Wednesday', '1:00 PM - 4:00 PM', '1', '303', '6'),
(1, 46, '2', 'CCS 102', 'Computer Programming 1', 5, 'Saturday', '7:00 AM - 10:00 AM', '2', '304', '5'),
(2, 49, '1', 'GEC 004', 'Mathematics of the modern world', 3, 'Tuesday', '7:00 AM - 10:00 AM', '1', '302', '6');

--
-- Triggers `subjects_by_course`
--
DELIMITER $$
CREATE TRIGGER `subjects_by_course_after_delete` AFTER DELETE ON `subjects_by_course` FOR EACH ROW BEGIN
  INSERT INTO `subjects_by_course_log` (
    `operation`, `changed_at`, `year_lvl`, `id`, `program`, `subject_code`, `description`,
    `unit`, `day`, `time`, `section`, `room`, `professor`
  ) VALUES (
    'DELETE', NOW(), OLD.year_lvl, OLD.id, OLD.program, OLD.subject_code, OLD.description,
    OLD.unit, OLD.day, OLD.time, OLD.section, OLD.room, OLD.professor
  );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `subjects_by_course_after_insert` AFTER INSERT ON `subjects_by_course` FOR EACH ROW BEGIN
  INSERT INTO `subjects_by_course_log` (
    `operation`, `changed_at`, `year_lvl`, `id`, `program`, `subject_code`, `description`,
    `unit`, `day`, `time`, `section`, `room`, `professor`
  ) VALUES (
    'INSERT', NOW(), NEW.year_lvl, NEW.id, NEW.program, NEW.subject_code, NEW.description,
    NEW.unit, NEW.day, NEW.time, NEW.section, NEW.room, NEW.professor
  );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `subjects_by_course_after_update` AFTER UPDATE ON `subjects_by_course` FOR EACH ROW BEGIN
  INSERT INTO `subjects_by_course_log` (
    `operation`, `changed_at`, `year_lvl`, `id`, `program`, `subject_code`, `description`,
    `unit`, `day`, `time`, `section`, `room`, `professor`
  ) VALUES (
    'UPDATE', NOW(), OLD.year_lvl, OLD.id, OLD.program, OLD.subject_code, OLD.description,
    OLD.unit, OLD.day, OLD.time, OLD.section, OLD.room, OLD.professor
  );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `subjects_by_course_log`
--

CREATE TABLE `subjects_by_course_log` (
  `log_id` int(11) NOT NULL,
  `operation` varchar(10) NOT NULL,
  `changed_at` datetime NOT NULL,
  `year_lvl` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `program` varchar(255) DEFAULT NULL,
  `subject_code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `room` varchar(255) DEFAULT NULL,
  `professor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects_by_course_log`
--

INSERT INTO `subjects_by_course_log` (`log_id`, `operation`, `changed_at`, `year_lvl`, `id`, `program`, `subject_code`, `description`, `unit`, `day`, `time`, `section`, `room`, `professor`) VALUES
(1, 'INSERT', '2024-06-25 10:37:19', 2, 49, '1', 'GEC 004', 'Mathematics of the modern world', 3, 'Tuesday', '7:00 AM - 10:00 AM', '1', '302', '6'),
(2, 'DELETE', '2024-06-25 10:42:36', 3, 48, '1', 'CCS 109', 'Business Application Software', 3, 'Monday', '10:00 AM - 1:00 PM', '1', '302', '7');

-- --------------------------------------------------------

--
-- Table structure for table `subjects_log`
--

CREATE TABLE `subjects_log` (
  `log_id` int(11) NOT NULL,
  `operation` varchar(10) NOT NULL,
  `changed_at` datetime NOT NULL,
  `id` int(11) DEFAULT NULL,
  `subject_code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `units` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects_log`
--

INSERT INTO `subjects_log` (`log_id`, `operation`, `changed_at`, `id`, `subject_code`, `description`, `units`) VALUES
(1, 'INSERT', '2024-06-25 10:05:03', 15, 'CCS 1123', 'Programming 2', '5'),
(2, 'UPDATE', '2024-06-25 10:16:23', 3, 'CCS 102', 'Computer Programming 1', '5'),
(3, 'UPDATE', '2024-06-25 10:16:29', 3, 'CCS 102', 'Computer Programming 1', '3'),
(4, 'DELETE', '2024-06-25 10:16:55', 15, 'CCS 1123', 'Programming 2', '5'),
(5, 'UPDATE', '2024-06-25 10:27:08', 7, 'GEC 001', 'Understanding the Self', '3'),
(6, 'UPDATE', '2024-06-25 10:27:26', 7, 'GEC 001', 'Understanding the Selfish', '3');

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

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `name`, `username`, `password`) VALUES
(1, 'admin', 'admin', '$2y$10$bSz7JIiW4VpNQFuSH.osfucP3U2ufLWLUlW9u.VNcpEDQM4zkVTjO');

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
-- Structure for view `confirmed_students`
--
DROP TABLE IF EXISTS `confirmed_students`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `confirmed_students`  AS SELECT `section_student`.`section` AS `section`, `students`.`student_id` AS `student_id`, `students`.`firstname` AS `firstname`, `students`.`middlename` AS `middlename`, `students`.`lastname` AS `lastname`, `students`.`birthdate` AS `birthdate`, `students`.`birthplace` AS `birthplace`, `students`.`gender` AS `gender`, `students`.`address` AS `address`, `students`.`contact` AS `contact`, `students`.`documents` AS `documents`, `courses`.`program` AS `program`, `year_level`.`year_level` AS `year_level`, `student_login`.`email` AS `email`, `student_login`.`username` AS `username`, `students`.`status` AS `status`, `students`.`registration_date` AS `registration_date`, `students`.`program_id` AS `program_id`, `students`.`year_id` AS `year_id` FROM ((((`students` join `courses` on(`students`.`program_id` = `courses`.`id`)) join `year_level` on(`students`.`year_id` = `year_level`.`id`)) join `student_login` on(`students`.`student_id` = `student_login`.`student_id`)) join `section_student` on(`students`.`student_id` = `section_student`.`student_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `grading_logs`
--
DROP TABLE IF EXISTS `grading_logs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `grading_logs`  AS SELECT `students`.`firstname` AS `firstname`, `students`.`lastname` AS `lastname`, `grading_log`.`log_id` AS `log_id`, `grading_log`.`operation` AS `operation`, `grading_log`.`changed_at` AS `changed_at`, `grading_log`.`id` AS `id`, `grading_log`.`subject_id` AS `subject_id`, `grading_log`.`student_id` AS `student_id`, `grading_log`.`midterm` AS `midterm`, `grading_log`.`finalterm` AS `finalterm`, `grading_log`.`final_grades` AS `final_grades`, `grading_log`.`remarks` AS `remarks`, `grading_log`.`date` AS `date` FROM (`grading_log` join `students` on(`grading_log`.`student_id` = `students`.`student_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `pending_students`
--
DROP TABLE IF EXISTS `pending_students`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pending_students`  AS SELECT `students`.`id` AS `id`, `students`.`student_id` AS `student_id`, `students`.`firstname` AS `firstname`, `students`.`middlename` AS `middlename`, `students`.`lastname` AS `lastname`, `students`.`birthdate` AS `birthdate`, `students`.`birthplace` AS `birthplace`, `students`.`gender` AS `gender`, `students`.`address` AS `address`, `students`.`contact` AS `contact`, `students`.`documents` AS `documents`, `courses`.`program` AS `program`, `year_level`.`year_level` AS `year_level`, `student_login`.`email` AS `email`, `student_login`.`username` AS `username`, `students`.`status` AS `status`, `students`.`registration_date` AS `registration_date` FROM (((`students` join `courses` on(`students`.`program_id` = `courses`.`id`)) join `year_level` on(`students`.`year_id` = `year_level`.`id`)) join `student_login` on(`students`.`student_id` = `student_login`.`student_id`)) WHERE `students`.`status` = 'Pending\'Pending' ;

-- --------------------------------------------------------

--
-- Structure for view `schedules`
--
DROP TABLE IF EXISTS `schedules`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `schedules`  AS SELECT `subjects_by_course`.`id` AS `subject_id`, `courses`.`program` AS `program`, `year_level`.`year_level` AS `year_level`, `subjects_by_course`.`subject_code` AS `subject_code`, `subjects_by_course`.`description` AS `description`, `subjects_by_course`.`unit` AS `unit`, `subjects_by_course`.`day` AS `day`, `subjects_by_course`.`time` AS `time`, `section_tbl`.`section` AS `section`, `subjects_by_course`.`room` AS `room`, `professor`.`name` AS `name` FROM ((((`subjects_by_course` join `section_tbl` on(`subjects_by_course`.`section` = `section_tbl`.`id`)) join `courses` on(`subjects_by_course`.`program` = `courses`.`id`)) join `year_level` on(`subjects_by_course`.`year_lvl` = `year_level`.`id`)) join `professor` on(`subjects_by_course`.`professor` = `professor`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `counts`
--
ALTER TABLE `counts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grading`
--
ALTER TABLE `grading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grading_log`
--
ALTER TABLE `grading_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_student`
--
ALTER TABLE `section_student`
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
-- Indexes for table `students_log`
--
ALTER TABLE `students_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects_by_course`
--
ALTER TABLE `subjects_by_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects_by_course_log`
--
ALTER TABLE `subjects_by_course_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `subjects_log`
--
ALTER TABLE `subjects_log`
  ADD PRIMARY KEY (`log_id`);

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
-- AUTO_INCREMENT for table `counts`
--
ALTER TABLE `counts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `grading`
--
ALTER TABLE `grading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `grading_log`
--
ALTER TABLE `grading_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `section_student`
--
ALTER TABLE `section_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `section_tbl`
--
ALTER TABLE `section_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `students_log`
--
ALTER TABLE `students_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subjects_by_course`
--
ALTER TABLE `subjects_by_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `subjects_by_course_log`
--
ALTER TABLE `subjects_by_course_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects_log`
--
ALTER TABLE `subjects_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `update_counts_event` ON SCHEDULE EVERY 1 SECOND STARTS '2024-06-19 18:51:01' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    CALL update_counts();
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
