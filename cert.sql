-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2021 at 01:17 PM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u214012117_cert`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `status`) VALUES
(21, 'Bhanu Mergoju', 'bhanumergoju', '0f9661a98f6eaaf71cc43b13ab68fbb5', 1),
(22, 'Bhanu Prasad', 'bhanuprasad', '35b526a57430237692d0ab8d7a3edc85', 1),
(23, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(24, 'Srinivas Siliveru', 'srinivas33', '0ef165001b35a8bef115ce2372c8f4fe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_cert`
--

CREATE TABLE `emp_cert` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(256) NOT NULL,
  `cert_id` varchar(256) NOT NULL,
  `name_on` varchar(256) NOT NULL,
  `issue_date` varchar(256) NOT NULL,
  `valid_till` varchar(256) NOT NULL,
  `comments` varchar(256) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_cert`
--

INSERT INTO `emp_cert` (`id`, `emp_id`, `cert_id`, `name_on`, `issue_date`, `valid_till`, `comments`, `added_on`) VALUES
(8, 'MSEMP00001', 'MADIN055230MSEMP00001', 'Swapnil Mane', '2021-06-17', 'Certificate of Internship', 'Swapnil Mane is truly an Innovative and sincere student while working at MadScientist', '2021-06-17 12:26:25'),
(9, 'MSEMP00001', 'MADIN061741MSEMP00001', 'Swapnil Mane', '2021-06-17', 'Letter Of Recomandation', 'MadScientist would highly recommend Swapnil Mane for his contribution to the Technology and he will be a great asset to your Institution/Organization.', '2021-06-17 12:51:55'),
(10, 'MSEMP00001', 'MADIN064014MSEMP00001', 'Swapnil Mane', '2021-06-17', 'Employee Appreciation Letter', '', '2021-06-17 13:10:29'),
(11, 'MSEMP00002', 'MADIN112520MSEMP00002', 'Manoj Bhargav Ram Ramineni', '2021-07-17', 'Certificate of Internship', 'Manoj Bhargav Ram Ramineni is dedicated and Hard working person. MadScientist found him truly skilled and remarkable person.', '2021-07-17 18:00:12'),
(12, 'MSEMP00002', 'MADIN123130MSEMP00002', 'Manoj Bhargav Ram Ramineni', '2021-07-17', 'Certificate of Internship', '', '2021-07-21 07:02:22'),
(13, 'MSEMP00002', 'MADIN123439MSEMP00002', 'Manoj Bhargav Ram Ramineni', '2021-07-17', 'Letter Of Recomandation', '', '2021-07-22 19:05:02'),
(14, 'MSEMP00003', 'MADIN110431MSEMP00003', 'Aditi Unnikrishnan', '2021-07-30', 'Certificate of Internship', 'We found her truly remarkable and sincere during the tenure.', '2021-07-30 17:35:14'),
(15, 'MSEMP00003', 'MADIN111509MSEMP00003', 'Aditi Unnikrishnan', '2021-07-30', 'Certificate of Internship', '', '2021-07-30 17:45:41'),
(16, 'MSEMP00003', 'MADIN112547MSEMP00003', 'Aditi Unnikrishnan', '2021-07-30', 'Letter Of Recomandation', '', '2021-07-30 17:56:15'),
(17, 'MSEMP00001', 'MADIN114637MSEMP00001', 'Swapnil Mane', '2021-06-17', 'Certificate of Internship', '', '2021-07-30 18:17:19'),
(18, 'MSEMP00001', 'MADIN120416MSEMP00001', 'Swapnil Mane', '2021-06-17', 'Letter Of Recomandation', '', '2021-07-30 18:34:56'),
(20, 'MSEMP00004', 'MADIN064835MSEMP00004', 'Alok Kumar', '2021-10-21', 'Certificate of Internship', 'Time and again, Alok Kumar proved his abilities, and he has proven to be an incredibly hard worker and passionate about his job. His energy and active moves contributed to our development at organizational level.', '2021-10-21 13:22:23'),
(21, 'MSEMP00004', 'MADIN070412MSEMP00004', 'Alok Kumar', '2021-10-21', 'Certificate of Internship', '', '2021-10-21 13:48:45'),
(22, 'MSEMP00004', 'MADIN072815MSEMP00004', 'Alok Kumar', '2021-10-21', 'Letter Of Recomandation', '', '2021-10-21 14:02:44'),
(23, 'MSEMP00005', 'MADIN075545MSEMP00005', 'Aryan Asgar', '2021-11-09', 'Certificate of Internship', 'Aryan Asgar interned at MadScientist for 2 months as a Full-Stack developer and we found him as truly remarkable and passionate.', '2021-11-09 14:33:03'),
(24, 'MSEMP00005', 'MADIN092117MSEMP00005', 'Aryan Asgar', '2021-11-09', 'Certificate of Internship', '', '2021-11-09 16:52:09'),
(25, 'MSEMP00005', 'MADIN102612MSEMP00005', 'Aryan Asgar', '2021-11-09', 'Letter Of Recomandation', '', '2021-11-09 16:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `emp_data`
--

CREATE TABLE `emp_data` (
  `id` int(20) NOT NULL,
  `emp_id` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `dob` varchar(256) NOT NULL,
  `gender` varchar(256) NOT NULL,
  `edudetails` varchar(256) NOT NULL,
  `experience` varchar(256) NOT NULL,
  `duration` varchar(256) NOT NULL,
  `emptype` varchar(256) NOT NULL,
  `role` varchar(256) NOT NULL,
  `salary` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phno` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `feedback` varchar(256) NOT NULL,
  `issue_date` varchar(256) NOT NULL,
  `valid_till` varchar(256) NOT NULL,
  `img` varchar(256) NOT NULL,
  `added_by` varchar(256) NOT NULL,
  `added_date` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_data`
--

INSERT INTO `emp_data` (`id`, `emp_id`, `name`, `dob`, `gender`, `edudetails`, `experience`, `duration`, `emptype`, `role`, `salary`, `email`, `phno`, `address`, `feedback`, `issue_date`, `valid_till`, `img`, `added_by`, `added_date`) VALUES
(24, 'MSEMP00001', 'Swapnil Mane', '19-12-2000', 'male', 'B.Tech Instrumentation and Control Engineering - VIT Pune', 'Robotics, Automation and Embedded Systems', 'Feb 5th 2021 to May 20th 2021 - 3 months  16 days', 'Intern', 'Robotics Research Intern', '5000/Month', 'im.smane19@gmail.com', '7030164849', 'Pirale, Tal-Malshiras, Solapur district, Pune, Maharashtra - 413109', '', '2021-06-17', 'Lifetime', '4ba2a8b363b566b985ed2e412894ec22.jpg', 'bhanumergoju', 2147483647),
(25, 'MSEMP00002', 'Manoj Bhargav Ram Ramineni', '29-05-2001', 'male', 'Computer Science Engineering IV year - CMR Technical Campus - Hyderabad', 'PHP, HTML, CSS, Javascript, mySQL', '2 months', 'Intern', 'PHP Developer', '5500/month - 1st month, 8000/month - 2nd month', 'manojbhargavram2014@gmail.com', '9154313796', 'H-No:1-127, Vill: Garlapadu, Manda: Kakumanu Dist: Guntur, Andhra Pradesh- 522235', '', '2021-07-17', 'Life Time', '0fb861998aa761c0f84cc15e57c753d9.png', 'bhanumergoju', 2147483647),
(26, 'MSEMP00003', 'Aditi Unnikrishnan', '', 'female', 'Pursuing BSc - Information Technology - 2nd year at Usha Pravin Gandhi College of Arts, Science and Commerce.', 'Creative Content Writing', '2 months - May 27, 2021 to July 27, 2021', 'Intern', 'Creative Content Writer', '4000 (Total)', 'aditiunni123@gmail.com', '9167525387', 'H-No: C-803, 8th floor Oberoi splendour, Jogeshwari East, Mumbai - 400060', '', '2021-07-30', '', '798ac5ed565b1d950ddc17a96057b4e1.png', 'bhanumergoju', 2147483647),
(27, 'MSEMP00004', 'Alok Kumar', '29-11-2001', 'male', 'B.Tech - CSE from Bakhtiyarpur college of engineering, Patna, Bihar.', 'Developed social media platforms and chat applications.', '2 months', 'Intern', 'Full stack Developer', '7000/month', 'alok.sonaili@gmail.com', '7903212438', 'Sonaili Bazar, Katihar, Bihar, India - 855114', '', '2021-10-21', 'Life time', 'bdee7236ab1f194ac59f9faca98f09ca.png', 'bhanumergoju', 2147483647),
(28, 'MSEMP00005', 'Aryan Asgar', '11-09-2000', 'male', 'B.Tech CSE - 4th year - NIST (National Institute of Science and Technology) - Orissa', 'Full Stack Development (server side)', '2 Months', 'Intern', 'Full stack developer Intern', '7000/month', 'aryanasgar1109@gmail.com', '620553871', 'College : Above Srinivas Pharmaceuticals, Maitri Vihar, Nabarangpur, Odisha –\r\n764059. Home : Flat No: AY 032, Ground floor, Ashiana Suncity, NH33 Baliguma,\r\nJhamshedpur, Jharkhand, India - 821018', '', '2021-11-09', 'Life time', 'acdcfff471874173c318b8c62f6ad5b2.png', 'bhanumergoju', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_cert`
--
ALTER TABLE `emp_cert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_data`
--
ALTER TABLE `emp_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `emp_cert`
--
ALTER TABLE `emp_cert`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `emp_data`
--
ALTER TABLE `emp_data`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
