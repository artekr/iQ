-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 29, 2013 at 10:26 PM
-- Server version: 5.6.12
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iqdb`
--
CREATE DATABASE IF NOT EXISTS `iqdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `iqdb`;

-- --------------------------------------------------------

--
-- Table structure for table `map_survey_question`
--

CREATE TABLE IF NOT EXISTS `map_survey_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_fk` int(11) NOT NULL,
  `question_fk` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `survey_fk` (`survey_fk`),
  KEY `question_fk` (`question_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=143 ;

--
-- Dumping data for table `map_survey_question`
--

INSERT INTO `map_survey_question` (`id`, `survey_fk`, `question_fk`) VALUES
(1, 1, 81),
(2, 1, 82),
(19, 1, 83),
(20, 1, 84),
(21, 1, 85),
(22, 1, 86),
(23, 1, 87),
(24, 1, 88),
(25, 1, 89),
(26, 1, 90),
(39, 4, 9),
(40, 4, 12),
(41, 4, 13),
(42, 4, 14),
(43, 4, 15),
(44, 4, 16),
(45, 4, 17),
(46, 4, 18),
(47, 4, 19),
(48, 4, 20),
(49, 6, 54),
(50, 6, 55),
(51, 6, 56),
(52, 6, 57),
(53, 6, 58),
(54, 6, 59),
(55, 6, 60),
(56, 6, 61),
(57, 6, 62),
(58, 6, 63),
(80, 7, 47),
(81, 7, 46),
(82, 7, 45),
(83, 7, 44),
(84, 7, 43),
(85, 7, 42),
(86, 7, 41),
(87, 7, 40),
(88, 7, 39),
(89, 7, 38),
(90, 8, 24),
(91, 8, 25),
(92, 8, 26),
(93, 8, 27),
(94, 8, 28),
(95, 8, 29),
(96, 8, 30),
(97, 8, 31),
(98, 8, 32),
(99, 8, 33),
(100, 9, 19),
(101, 9, 20),
(102, 9, 21),
(103, 9, 22),
(104, 9, 23),
(105, 9, 3),
(106, 9, 5),
(107, 9, 8),
(108, 9, 61),
(109, 9, 62),
(110, 10, 100),
(111, 10, 101),
(112, 10, 102),
(113, 10, 103),
(114, 10, 104),
(115, 10, 105),
(116, 10, 106),
(117, 10, 107),
(118, 10, 108),
(119, 10, 109),
(120, 10, 110),
(121, 11, 113),
(122, 11, 114),
(123, 11, 115),
(124, 11, 116),
(125, 11, 117),
(126, 11, 118),
(127, 11, 119),
(128, 11, 120),
(129, 11, 121),
(130, 11, 122),
(131, 16, 46),
(132, 16, 47),
(133, 16, 56),
(134, 16, 88),
(135, 16, 89),
(136, 16, 90),
(137, 16, 91),
(138, 16, 92),
(139, 16, 93),
(140, 16, 94),
(141, 33, 124),
(142, 33, 125);

-- --------------------------------------------------------

--
-- Table structure for table `map_user_survey`
--

CREATE TABLE IF NOT EXISTS `map_user_survey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fk` int(11) NOT NULL,
  `survey_fk` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_fk` (`user_fk`,`survey_fk`),
  KEY `survey_fk` (`survey_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `map_user_survey`
--

INSERT INTO `map_user_survey` (`id`, `user_fk`, `survey_fk`, `published`) VALUES
(1, 1, 16, 0),
(42, 1, 9, 1),
(43, 2, 1, 0),
(44, 2, 29, 0),
(45, 2, 10, 1),
(46, 2, 30, 0),
(47, 3, 6, 0),
(48, 3, 31, 0),
(49, 2, 7, 1),
(50, 1, 32, 0),
(51, 1, 33, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `template` tinyint(1) NOT NULL DEFAULT '1',
  `username` varchar(100) NOT NULL,
  `description` varchar(150) NOT NULL,
  `options` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=126 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `type`, `template`, `username`, `description`, `options`) VALUES
(1, 'general', 1, 'admin', 'How often do you use our product? ', 'Every day,>=4/week,>=2/week,once a week,Never '),
(2, 'general', 1, 'admin', 'How satisfied are you with our product?', 'Very satisfied,Somewhat satisfied,Neutral,Somewhat dissatisfied,Very dissatisfied'),
(3, 'general', 1, '', 'How did you learn of our product?', 'Search Engine,Existing Customer,Friend/colleague,Company materials,Employees'),
(5, 'general', 1, '', 'Would you recommend our product to a friend?', 'Definitely,Probably,No,I don''t know'),
(6, 'general', 1, '', 'Where do you primarily use our product?', 'At home,At the office,Another location out side the house,Not using it'),
(8, 'general', 1, '', 'Do you typically read the back and side panel of the products package?', 'Yes,No,Not Sure'),
(9, 'general', 1, '', 'How familiar are you with our product?', 'Very familiar (use on a regular basis),Somewhat familiar (use it only sometimes),Familiar but never used it,Never heard of product before'),
(12, 'general', 1, '', 'Based on your experience with product, how likely are you to buy our product again?', 'Definitely will,Probably will,Might or might not,Probably will not,Definitely will not'),
(13, 'QUIS', 1, '', 'How do you feel about reading characters on the screen?', 'Very hard,Hard,Normal,Easy,Very easy'),
(14, 'QUIS', 1, '', 'How is the organization of the information?', 'Very confusing,Confusing,Normal,Clear,Very clear'),
(15, 'QUIS', 1, '', 'How do you feel about learning to operate the product?', 'Very difficult,Difficult,Normal,Easy,Very easy'),
(16, 'QUIS', 1, '', 'How do you feel about remembering names and use of commands?', 'Very difficult,Difficult,Normal,Easy,Very easy'),
(17, 'QUIS', 1, '', 'Is the product performance straightforward?', 'Always,Often,Sometimes,Never'),
(18, 'QUIS', 1, '', 'How about the help messages on the screen?', 'Very helpful,Helpful,Normal,Unhelpful'),
(19, 'PUEU', 1, '', 'Using the system in my job would enable me to accomplish tasks more quickly?', 'Very likely,Likely,Normal,Unlikely'),
(20, 'PUEU', 1, '', 'Using the system would improve my job performance?', 'Very likely,Likely,Normal,Unlikely'),
(21, 'PUEU', 1, '', 'Learning to operate the system would be easy for me?', 'Very likely,Likely,Norma,Unlikely'),
(22, 'PUEU', 1, '', 'My interaction with the system would be clear and understandable?', 'Very likely,Likely,Norma,Unlikely'),
(23, 'CSUQ', 1, '', 'Overall, I am satisfied with how easy it is to use this system?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(24, 'CSUQ', 1, '', 'It was simple to use this system?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(25, 'CSUQ', 1, '', 'I can effectively complete my work using this system?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(26, 'CSUQ', 1, '', 'I am able to complete my work quickly using this system?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(27, 'CSUQ', 1, '', 'I am able to efficiently complete my work using this system?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(28, 'CSUQ', 1, '', 'I feel comfortable using this system?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(29, 'CSUQ', 1, '', 'Whenever I make a mistake using the system, I recover easily and quickly?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(30, 'CSUQ', 1, '', 'It is easy to find the information I needed?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(31, 'CSUQ', 1, '', 'The information provided for the system is easy to understand?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(32, 'CSUQ', 1, '', 'Overall, I am satisfied with how easy it is to use this system?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(33, 'CSUQ', 1, '', 'It was simple to use this system?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(34, 'CSUQ', 1, '', 'I can effectively complete my work using this system?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(35, 'CSUQ', 1, '', 'I am able to complete my work quickly using this system?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(36, 'CSUQ', 1, '', 'I am able to efficiently complete my work using this system?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(37, 'CSUQ', 1, '', 'I feel comfortable using this system?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(38, 'CSUQ', 1, '', 'Whenever I make a mistake using the system, I recover easily and quickly?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(39, 'CSUQ', 1, '', 'It is easy to find the information I needed?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(40, 'CSUQ', 1, '', 'The information provided for the system is easy to understand?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(41, 'CSUQ', 1, '', 'The information is effective in helping me complete the tasks and scenarios?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(42, 'CSUQ', 1, '', 'The organization of information on the system screens is clear?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(43, 'CSUQ', 1, '', 'The interface of this system is pleasant?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(44, 'CSUQ', 1, '', 'This system has all the functions and capabilities I expect it to have?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(45, 'ASQ', 1, '', 'Overall, I am satisfied with the ease of completing the tasks in this scenario?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(46, 'ASQ', 1, '', 'Overall, I am satisfied with the amount of time it took to complete the tasks in this scenario?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(47, 'ASQ', 1, '', 'Overall, I am satisfied with the support information (online-line help, messages, documentation) when completing the tasks?', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(54, 'PHUE', 1, '', 'Help and Documentation \r\n(Design for use without documentation. Provide easy-to-use task-oriented help)', 'Very good,Good,Normal,Bad,Very bad'),
(55, 'PHUE', 1, '', 'Adopt the User''s Viewpoint \r\n(Speak the user''s language (avoid jargon). Make use of existing knowledge (familiar mental models).)', 'Very good,Good,Normal,Bad,Very bad'),
(56, 'PHUE', 1, '', 'Simple and Natural Dialogue \r\n(Avoid extraneous information, steps, actions. Information should be in a logical, natural order.)', 'Very good,Good,Normal,Bad,Very bad'),
(57, 'PHUE', 1, '', 'Design for Advancement \r\n(Provide shortcuts (quick keys, customization).)', 'Very good,Good,Normal,Bad,Very bad'),
(58, 'PHUE', 1, '', 'Provide Maps and a Trail \r\n(Give the user a way to preview where to go, what will happen. Give the user a way to review / return-to previous contexts.', 'Very good,Good,Normal,Bad,Very bad'),
(59, 'PHUE', 1, '', 'Show the User What is (Not) Possible \r\n(Provide affordances to indicate what can be done.)', 'Very good,Good,Normal,Bad,Very bad'),
(60, 'PHUE', 1, '', 'Intuitive Mappings \r\n(Design good response compatibility between controls/actions.)', 'Very good,Good,Normal,Bad,Very bad'),
(61, 'PHUE', 1, '', 'Minimize Memory Load \r\n(Remove the need to remember across dialogues. Provide multiple views for easy comparisons.)', 'Very good,Good,Normal,Bad,Very bad'),
(62, 'PHUE', 1, '', 'Consistency in the System and to Standards \r\n(Make sure the same term/action has one meaning. When there is no better way, conform to a standard.)', 'Very good,Good,Normal,Bad,Very bad'),
(63, 'PHUE', 1, '', 'Feedback \r\n(Provide timely feedback about all processes, system status.)', 'Very good,Good,Normal,Bad,Very bad'),
(64, 'PHUE', 1, '', 'Prevent Errors \r\n(Make it difficult to make errors.)', 'Very good,Good,Normal,Bad,Very bad'),
(65, 'PHUE', 1, '', 'Error Messages \r\n(Diagnose the source and cause of a problem and suggest a solution.)', 'Very good,Good,Normal,Bad,Very bad'),
(66, 'PHUE', 1, '', 'Clearly Marked Exits and Error Recovery \r\n(Make sure the user can get out of an undesirable state easily. Design assuming that people will make errors', 'Very good,Good,Normal,Bad,Very bad'),
(67, 'USE', 1, '', 'It helps me be more effective.', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(68, 'USE', 1, '', 'It helps me be more productive.', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(69, 'USE', 1, '', 'It is useful.', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(70, 'USE', 1, '', 'It gives me more control over the activities in my life.', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(71, 'USE', 1, '', 'It makes the things I want to accomplish easier to get done.', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(72, 'USE', 1, '', 'It saves me time when I use it.', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(73, 'USE', 1, '', 'It does everything I would expect it to do.', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(74, 'USE', 1, '', 'It requires the fewest steps possible to accomplish what I want to do with it.', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(75, 'USE', 1, '', 'I can use it without written instructions.', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(76, 'USE', 1, '', 'I don''t notice any inconsistencies as I use it.', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(77, 'USE', 1, '', 'Both occasional and regular users would like it. ', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(78, 'USE', 1, '', 'I can recover from mistakes quickly and easily.', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(79, 'USE', 1, '', 'It is easy to use.', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(80, 'USE', 1, '', 'It is user friendly.', 'Strongly agree,Agree,Neutral,Disagree,Strongly Disagree'),
(81, 'PUTQ', 1, '', 'Is the control of cursor compatible with movement?', 'Very good,Good,Normal,Bad,Very bad'),
(82, 'PUTQ', 1, '', 'Are the results of control entry compatible with user expectations?', 'Very good,Good,Normal,Bad,Very bad'),
(83, 'PUTQ', 1, '', 'Is the control matched to user skill?', 'Very good,Good,Normal,Bad,Very bad'),
(84, 'PUTQ', 1, '', 'Are the coding compatible with familiar conventions?', 'Very good,Good,Normal,Bad,Very bad'),
(85, 'PUTQ', 1, '', 'Is the wording familiar?', 'Very good,Good,Normal,Bad,Very bad'),
(86, 'PUTQ', 1, '', 'Is the assignment of colour codes conventional?', 'Very good,Good,Normal,Bad,Very bad'),
(87, 'PUTQ', 1, '', 'Is the coding consistent across displays, menu options?', 'Very good,Good,Normal,Bad,Very bad'),
(88, 'PUTQ', 1, '', 'Is the cursor placement consistent?', 'Very good,Good,Normal,Bad,Very bad'),
(89, 'PUTQ', 1, '', 'Is the display format consistent?', 'Very good,Good,Normal,Bad,Very bad'),
(90, 'PUTQ', 1, '', 'Is the feedback consistent?', 'Very good,Good,Normal,Bad,Very bad'),
(91, 'PUTQ', 1, '', 'Is the format within data fields consistent? ', 'Very good,Good,Normal,Bad,Very bad'),
(92, 'PUTQ', 1, '', 'Is the label format consistent?', 'Very good,Good,Normal,Bad,Very bad'),
(93, 'PUTQ', 1, '', 'Is the data display consistent with entry requirements? ', 'Very good,Good,Normal,Bad,Very bad'),
(94, 'PUTQ', 1, '', 'Are symbols for graphic data standard?', 'Very good,Good,Normal,Bad,Very bad'),
(95, 'PUTQ', 1, '', 'Is the option wording consistent with command language?', 'Very good,Good,Normal,Bad,Very bad'),
(96, 'PUTQ', 1, '', 'Is the wording consistent with user guidance?', 'Very good,Good,Normal,Bad,Very bad'),
(97, 'PUTQ', 1, '', 'Does it have by-passing menu selection with command entry?', 'Very good,Good,Normal,Bad,Very bad'),
(98, 'PUTQ', 1, '', 'Does it have direct manipulation capability?', 'Very good,Good,Normal,Bad,Very bad'),
(99, 'PUTQ', 1, '', 'Is the design for data entry flexible?', 'Very good,Good,Normal,Bad,Very bad'),
(100, 'PUTQ', 1, '', 'Can the display be controlled by user flexibly?', 'Very good,Good,Normal,Bad,Very bad'),
(101, 'PUTQ', 1, '', 'Does it provide flexible sequence control?', 'Very good,Good,Normal,Bad,Very bad'),
(102, 'PUTQ', 1, '', 'Are the menu options dependent on context?', 'Very good,Good,Normal,Bad,Very bad'),
(103, 'PUTQ', 1, '', 'Can user name displays and elements according to their needs? ', 'Very good,Good,Normal,Bad,Very bad'),
(104, 'PUTQ', 1, '', 'Does it provide good training for different users?', 'Very good,Good,Normal,Bad,Very bad'),
(105, 'PUTQ', 1, '', 'Are users allowed to customize windows?', 'Very good,Good,Normal,Bad,Very bad'),
(106, 'PUTQ', 1, '', 'Can users assign command names?', 'Very good,Good,Normal,Bad,Very bad'),
(107, 'PUTQ', 1, '', 'Does it provide user selection of data for display?', 'Very good,Good,Normal,Bad,Very bad'),
(108, 'PUTQ', 1, '', 'Does it provide zooming for display expansion?', 'Very good,Good,Normal,Bad,Very bad'),
(109, 'PUTQ', 1, '', 'Is the data grouping reasonable for easy learning?', 'Very good,Good,Normal,Bad,Very bad'),
(110, 'PUTQ', 1, '', 'Is the ordering of menu options logical?', 'Very good,Good,Normal,Bad,Very bad'),
(111, 'PUTQ', 1, '', 'Are the command names meaningful?', 'Very good,Good,Normal,Bad,Very bad'),
(112, 'PUTQ', 1, '', 'Does it provide combined entry of related data?', 'Very good,Good,Normal,Bad,Very bad'),
(113, 'PUTQ', 1, '', 'Is the menu selection by pointing? -- primary means of sequence control.', 'Very good,Good,Normal,Bad,Very bad'),
(114, 'PUTQ', 1, '', 'Does it require minimal cursor positioning?', 'Very good,Good,Normal,Bad,Very bad'),
(115, 'PUTQ', 1, '', 'Is the return to higher-level menus required only one simple key action? ', 'Very good,Good,Normal,Bad,Very bad'),
(116, 'PUTQ', 1, '', 'How are abbreviations and acronyms used? ', 'Very good,Good,Normal,Bad,Very bad'),
(117, 'PUTQ', 1, '', 'Does it provide aids for entering hierarchic data?', 'Very good,Good,Normal,Bad,Very bad'),
(118, 'PUTQ', 1, '', 'Does it provide hierarchic menus for sequential selection?', 'Very good,Good,Normal,Bad,Very bad'),
(119, 'PUTQ', 1, '', 'Are selected data highlighted?', 'Very good,Good,Normal,Bad,Very bad'),
(120, 'PUTQ', 1, '', 'Does it indicate current position in menu structure?', 'Very good,Good,Normal,Bad,Very bad'),
(121, 'PUTQ', 1, '', 'Is the format for user guidance distinctive?', 'Very good,Good,Normal,Bad,Very bad'),
(122, 'PUTQ', 1, '', 'Is the spelling distinctive for commands?', 'Very good,Good,Normal,Bad,Very bad'),
(123, 'PUTQ', 1, '', 'System feedback: How helpful is the error message?', 'Very good,Good,Normal,Bad,Very bad'),
(124, 'self', 0, ' ', 'How old are you?', '20,21,24,25'),
(125, 'self', 0, ' ', 'You gender?', 'Male,Female');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE IF NOT EXISTS `survey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `template` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id`, `name`, `template`) VALUES
(1, 'Usability Testing Survey', 1),
(4, 'User Interface Satisfaction Survey', 1),
(6, 'Usability Evaluation', 1),
(7, 'After Scenario Questionnaire', 1),
(8, 'Computer System Usability Survey', 1),
(9, 'Perceived Usefulness and Ease of Use', 1),
(10, 'User Interaction Survey', 1),
(11, 'Product Performance Evaluation', 1),
(16, 'Test', 0),
(29, 'New Survey from Heng', 0),
(30, 'new survey', 0),
(31, 'New survey from Kamthan', 0),
(32, 'just test', 0),
(33, 'Blalalalala', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'heng', 'kevinwang264@gmail.com', '2eaf24a903c3b6e4fecc0543498ff209'),
(3, 'kamthan', 'Kamthan@concordia.ca', '21232f297a57a5a743894a0e4a801fc3');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `map_survey_question`
--
ALTER TABLE `map_survey_question`
  ADD CONSTRAINT `map_survey_question_ibfk_1` FOREIGN KEY (`survey_fk`) REFERENCES `survey` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `map_survey_question_ibfk_2` FOREIGN KEY (`question_fk`) REFERENCES `question` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `map_user_survey`
--
ALTER TABLE `map_user_survey`
  ADD CONSTRAINT `map_user_survey_ibfk_1` FOREIGN KEY (`user_fk`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `map_user_survey_ibfk_2` FOREIGN KEY (`survey_fk`) REFERENCES `survey` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
