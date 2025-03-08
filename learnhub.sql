--
-- Database: `learnhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `Answer_ID` int(11) NOT NULL,
  `AnswerText` text DEFAULT NULL,
  `Question_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`Answer_ID`, `AnswerText`, `Question_ID`) VALUES
(1, 'HyperText Makeup Language', 1),
(2, 'HyperText Markup Language', 1),
(3, 'HyperText Modern Language', 1),
(4, 'HyperText Multiple Language', 1),
(5, 'link', 2),
(6, 'a', 2),
(7, 'href', 2),
(8, 'url', 2),
(13, 'To contain the main content of the webpage', 4),
(14, 'To include metadata and links to stylesheets or scripts', 4),
(15, 'To define the body of the document', 4),
(16, 'To display the title of the webpage in the browser', 4),
(17, 'ol', 5),
(18, 'ul', 5),
(19, 'li', 5),
(20, 'list', 5),
(21, 'Colorful Style Sheets', 6),
(22, 'Cascading Style Sheets', 6),
(23, 'Computer Style Sheets', 6),
(24, 'Creative Style Sheets', 6),
(25, 'font-weight', 7),
(26, 'font-size', 7),
(27, 'text-size', 7),
(28, 'font-style', 7),
(29, 'hide', 8),
(30, 'display', 8),
(31, 'invisible', 8),
(32, 'hidden', 8),
(33, 'setText', 9),
(34, 'text', 9),
(35, 'innerHTML', 9),
(36, 'updateText', 9),
(37, 'Personal Hypertext Processor', 10),
(38, 'Preprocessor Hypertext Pages', 10),
(39, 'PHP: Hypertext Preprocessor', 10),
(40, 'Programming Hypertext Pages', 10),
(41, 'include', 11),
(42, 'import', 11),
(43, 'require_once', 11),
(44, 'includeq', 11),
(45, 'isset', 12),
(46, 'empty', 12),
(47, 'is_null', 12),
(48, 'exists', 12),
(49, 'string_length', 13),
(50, 'len', 13),
(51, 'strlen', 13),
(52, 'size', 13),
(53, 'btn-primary', 14),
(54, 'btn-main', 14),
(55, 'btn-default', 14),
(56, 'btn-primary-lg', 14),
(57, 'container-fluid', 15),
(58, 'container', 15),
(59, 'row', 15),
(60, 'grid', 15),
(61, 'center-block', 16),
(62, 'text-center', 16),
(63, 'align-center', 16),
(64, 'block-center', 16),
(65, '768px', 17),
(66, '992px', 17),
(67, '576px', 17),
(68, '1200px', 17);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Course_ID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Picture` varchar(100) DEFAULT NULL,
  `Deadline` date DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Course_ID`, `Title`, `Picture`, `Deadline`, `User_ID`) VALUES
(1, 'HTML', 'uploads/1732490063-html.png', '2024-12-31', 3),
(2, 'CSS', 'uploads/1732490105-css.png', '2024-12-31', 3),
(3, 'jQuery', 'uploads/1732490155-jquery.png', '2024-12-31', 3),
(4, 'PHP', 'uploads/1732490208-php.jpg', '2024-12-31', 3),
(5, 'Bootstrap 3', 'uploads/1732493710-bootstrap-3.png', '2025-01-25', 4),
(6, 'Bootstrap 5', 'uploads/1732493746-bootstrap5.jpg', '2025-01-31', 4);

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `Enrollment_ID` int(255) NOT NULL,
  `User_ID` int(255) NOT NULL,
  `Course_ID` int(255) NOT NULL,
  `Enrolled_At` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`Enrollment_ID`, `User_ID`, `Course_ID`, `Enrolled_At`) VALUES
(1, 2, 4, '2024-11-25'),
(2, 2, 3, '2024-11-25'),
(3, 2, 5, '2024-11-25'),
(4, 2, 2, '2024-11-25'),
(5, 10, 1, '2024-11-25'),
(6, 10, 2, '2024-11-25'),
(7, 10, 3, '2024-11-25'),
(8, 10, 4, '2024-11-25'),
(9, 10, 5, '2024-11-25'),
(10, 10, 6, '2024-11-25'),
(11, 9, 5, '2024-11-25'),
(12, 9, 6, '2024-11-25'),
(13, 6, 1, '2024-11-25'),
(14, 6, 2, '2024-11-25'),
(15, 6, 3, '2024-11-25'),
(16, 6, 4, '2024-11-25'),
(17, 12, 5, '2024-11-25'),
(18, 12, 6, '2024-11-25'),
(19, 9, 4, '2024-11-25'),
(20, 2, 1, '2024-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `Question_ID` int(11) NOT NULL,
  `QuestionText` text DEFAULT NULL,
  `CorrectAnswer` text DEFAULT NULL,
  `Quiz_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`Question_ID`, `QuestionText`, `CorrectAnswer`, `Quiz_ID`) VALUES
(1, 'What does HTML stand for?', 'HyperText Markup Language', 1),
(2, 'Which HTML tag is used to create a hyperlink?', 'a', 1),
(4, 'What is the purpose of the <head> tag in an HTML document?', 'To include metadata and links to stylesheets or scripts', 1),
(5, 'Which of the following tags is used to create an ordered list in HTML?', 'ol', 1),
(6, 'What does CSS stand for?', 'Cascading Style Sheets', 2),
(7, 'Which CSS property is used to control the font size of an element?', 'font-size', 2),
(8, 'Which of the following jQuery methods is used to hide an element?', 'hide', 3),
(9, 'Which jQuery method is used to change the text of an element?', 'text', 3),
(10, 'What does PHP stand for?', 'PHP: Hypertext Preprocessor', 4),
(11, 'Which of the following is used to include a file in PHP?', 'include', 4),
(12, 'Which function is used to check if a variable is set and not NULL in PHP?', 'isset', 4),
(13, 'Which PHP function is used to get the length of a string?', 'strlen', 4),
(14, 'Which class is used in Bootstrap 3 to create a primary button?', 'btn-primary', 5),
(15, 'In Bootstrap 5, which of the following is used to define the grid container?', 'container', 6),
(16, 'Which Bootstrap 3 class is used to center a block element horizontally?', 'center-block', 5),
(17, 'In Bootstrap 5, which of the following is the default breakpoint for the medium-sized screen?', '992px', 6);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `Quiz_ID` int(11) NOT NULL,
  `QuizName` varchar(255) DEFAULT NULL,
  `AssignedDate` date DEFAULT NULL,
  `DueDate` date DEFAULT NULL,
  `Course_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`Quiz_ID`, `QuizName`, `AssignedDate`, `DueDate`, `Course_ID`) VALUES
(1, 'Basic HTML', '2024-12-01', '2024-12-02', 1),
(2, 'CSS Basics', '2024-12-01', '2024-12-05', 2),
(3, 'jQuery Basics', '2024-12-20', '2024-12-23', 3),
(4, 'PHP Basics', '2024-12-10', '2024-12-12', 4),
(5, 'Bootstrap 3 Basics', '2025-01-01', '2025-01-05', 5),
(6, 'Bootstrap 5 Basics', '2025-01-10', '2025-01-15', 6);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `Result_ID` int(11) NOT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Submission_ID` int(11) DEFAULT NULL,
  `Score_Percentage` decimal(5,2) DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`Result_ID`, `User_ID`, `Submission_ID`, `Score_Percentage`, `Date`) VALUES
(1, 2, 1, 75.00, '2024-11-25'),
(2, 2, 2, 50.00, '2024-11-25'),
(3, 9, 3, 0.00, '2024-11-25'),
(4, 6, 4, 25.00, '2024-11-25'),
(5, 6, 5, 0.00, '2024-11-25'),
(6, 6, 6, 50.00, '2024-11-25'),
(7, 9, 7, 50.00, '2024-11-25'),
(8, 2, 8, 25.00, '2024-11-25'),
(9, 10, 9, 50.00, '2024-11-25'),
(10, 10, 10, 0.00, '2024-11-25'),
(11, 10, 11, 0.00, '2024-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `submissiondetails`
--

CREATE TABLE `submissiondetails` (
  `Detail_ID` int(11) NOT NULL,
  `Comment` text DEFAULT NULL,
  `Submission_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `submissiondetails`
--

INSERT INTO `submissiondetails` (`Detail_ID`, `Comment`, `Submission_ID`) VALUES
(1, 'Good Job!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `Submission_ID` int(11) NOT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Quiz_ID` int(11) DEFAULT NULL,
  `SubmissionDate` date DEFAULT NULL,
  `ScoreCounter` decimal(5,2) DEFAULT NULL,
  `TotalCounter` decimal(19,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`Submission_ID`, `User_ID`, `Quiz_ID`, `SubmissionDate`, `ScoreCounter`, `TotalCounter`) VALUES
(1, 2, 4, '2024-11-25', 3.00, 4.00),
(2, 2, 5, '2024-11-25', 1.00, 2.00),
(3, 9, 6, '2024-11-25', 0.00, 2.00),
(4, 6, 1, '2024-11-25', 1.00, 4.00),
(5, 6, 2, '2024-11-25', 0.00, 2.00),
(6, 6, 3, '2024-11-25', 1.00, 2.00),
(7, 9, 4, '2024-11-25', 2.00, 4.00),
(8, 2, 1, '2024-11-25', 1.00, 4.00),
(9, 10, 1, '2024-11-25', 2.00, 4.00),
(10, 10, 3, '2024-11-25', 0.00, 2.00),
(11, 10, 6, '2024-11-25', 0.00, 2.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Role` enum('student','teacher','admin') NOT NULL,
  `PhoneNo` varchar(15) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Picture` varchar(100) DEFAULT NULL,
  `Major` varchar(100) DEFAULT NULL,
  `Status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Name`, `Email`, `Password`, `Role`, `PhoneNo`, `Address`, `Picture`, `Major`, `Status`) VALUES
(1, 'Test 1', 'test1@learnhub.com', '123456', 'admin', '9876543210', 'Surrey, BC', NULL, NULL, 'Active'),
(2, 'Test 2', 'test2@learnhub.com', '123456', 'student', '9876543210', 'Surrey BC', 'uploads/no-img.jpg', '', 'Active'),
(3, 'Mike K', 'mike@learnhub.com', '123456', 'teacher', '9876543210', 'Vancouver', 'uploads/1732513417-1732498148-OIP.jpeg', 'PHP', 'Active'),
(4, 'John D', 'john@learnhub.com', '123456', 'teacher', '9876543210', 'Delta', 'uploads/no-img.jpg', 'Bootstrap', 'Active'),
(5, 'Test 3', 'test3@learnhub.com', '123456', 'student', '9876543210', 'Langley, BC', 'uploads/no-img.jpg', '', 'Active'),
(6, 'Test 4 ', 'test4@gmail.com', 'Parp56', 'student', '6565565556', 'surrey ', 'uploads/1732498148-OIP.jpeg', '', 'Active'),
(7, 'Test 5', 'test5@gmail.com', '@Pawan@123', 'student', '5656565656', 'Surrey \r\n', NULL, '', 'Active'),
(9, 'Test 6', 'test6@gmail.com', 'Komal@123', 'student', '6565645456', 'surrey \r\n', 'uploads/1732498295-OIP (1).jpeg', '', 'Active'),
(10, 'Test 7', 'test7@gmail.com', '123456789', 'student', '121212121212', 'surrey \r\n', NULL, '', 'Active'),
(11, 'Test 8', 'test8@gmail.com', '123456', 'student', '2582582589', 'ny', 'uploads/1732499722-OIP.jpeg', '', 'Active'),
(12, 'Test 9', 'test9@gmail.com', '123456', 'student', '2525252525', 'surrey ', 'uploads/no-img.jpg', '', 'Active'),
(13, 'Test 10 ', 'test10@gmail.com', '123456', 'teacher', '6969696969', 'mortel', NULL, 'Woman', 'Inactive'),
(14, 'Test 11', 'test11@gmail.com', '123456', 'student', '9876543210', 'Surrey', NULL, '', 'Inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`Answer_ID`),
  ADD KEY `Question_ID` (`Question_ID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Course_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`Enrollment_ID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`Question_ID`),
  ADD KEY `Quiz_ID` (`Quiz_ID`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`Quiz_ID`),
  ADD KEY `Course_ID` (`Course_ID`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`Result_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Submission_ID` (`Submission_ID`);

--
-- Indexes for table `submissiondetails`
--
ALTER TABLE `submissiondetails`
  ADD PRIMARY KEY (`Detail_ID`),
  ADD KEY `Submission_ID` (`Submission_ID`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`Submission_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Quiz_ID` (`Quiz_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `Answer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `Course_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `Enrollment_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `Question_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `Quiz_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `Result_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `submissiondetails`
--
ALTER TABLE `submissiondetails`
  MODIFY `Detail_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `Submission_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`Question_ID`) REFERENCES `questions` (`Question_ID`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `Courses_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `Questions_ibfk_1` FOREIGN KEY (`Quiz_ID`) REFERENCES `quizzes` (`Quiz_ID`);

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `Quizzes_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `courses` (`Course_ID`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `Results_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`),
  ADD CONSTRAINT `Results_ibfk_2` FOREIGN KEY (`Submission_ID`) REFERENCES `submissions` (`Submission_ID`);

--
-- Constraints for table `submissiondetails`
--
ALTER TABLE `submissiondetails`
  ADD CONSTRAINT `SubmissionDetails_ibfk_1` FOREIGN KEY (`Submission_ID`) REFERENCES `submissions` (`Submission_ID`);

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `Submissions_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`),
  ADD CONSTRAINT `Submissions_ibfk_2` FOREIGN KEY (`Quiz_ID`) REFERENCES `quizzes` (`Quiz_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
