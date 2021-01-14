-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2020 at 08:44 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `bprecords`
--

CREATE TABLE `bprecords` (
  `uid` varchar(200) NOT NULL,
  `dateofrecord` date NOT NULL,
  `sys` int(10) NOT NULL,
  `dia` int(10) NOT NULL,
  `pulse` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bprecords`
--

INSERT INTO `bprecords` (`uid`, `dateofrecord`, `sys`, `dia`, `pulse`) VALUES
('Devanshu', '2020-07-08', 200, 100, 100),
('Aman', '2020-07-17', 200, 50, 75),
('Devanshu', '2020-07-30', 150, 170, 100),
('Rachna', '2020-07-26', 200, 100, 150);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `uid` varchar(255) NOT NULL,
  `dname` varchar(255) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `spl` varchar(255) NOT NULL,
  `qual` varchar(255) NOT NULL,
  `studied` varchar(255) NOT NULL,
  `exp` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `hospital` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(15) NOT NULL,
  `ppic` mediumtext NOT NULL,
  `cpic` mediumtext NOT NULL,
  `info` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`uid`, `dname`, `contact`, `email`, `spl`, `qual`, `studied`, `exp`, `website`, `hospital`, `address`, `city`, `state`, `zip`, `ppic`, `cpic`, `info`) VALUES
('', 'Bharat Bhushan', '8949671791', 'bharat@gmail.com', 'Neurologist', 'Bsc', 'Delhi', '10 years', 'www.bharat.com', 'Chintu hospital', 'Jandawali', 'Hanumangarh', 'Rajasthan', '335513', 'Screenshot (33).png', 'Screenshot (163).png', 'M bhut tkdo doctor hu'),
('Aman', 'Aman', '8523697412', 'aman@gmail.com', 'Ophthalmologist', 'Btech', 'Stanford', '10 years', '50', 'Instagram', 'Insta office', 'Insta office', 'Washington', '151001', 'Screenshot (12).png', 'Screenshot (33).png', 'I am awesome'),
('Devanshu', 'Devanshu 52', '8745696541', 'divanshudhandhal@gmail.com', 'Dermatologist', 'Btech', 'Stanford', '10 years', 'www.mrtechpedia.com', 'YouTube', 'California', 'California', 'Washington', '151001', 'Screenshot (35).png', 'Screenshot (193).png', 'U r a moron');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `problems` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`uid`, `name`, `contact`, `email`, `gender`, `age`, `city`, `address`, `problems`) VALUES
('Abcd', 'Devanshu', '7742247416', 'divanshudhandhal@gmail.com', 'Male', 20, 'California', 'California', 'fdhsjsjuw'),
('Aman', 'Aman', '8521479633', 'divanshudhandhal@gmail.com', 'Male', 20, 'Bathinda', 'California', 'I am a youtuber'),
('Amrit', 'Amrit', '7742247416', 'divanshudhandhal@gmail.com', 'Male', 20, 'California', 'California', 'dfndxfjmdxfkj'),
('Anubhav', 'Anubhav', '8527419632', 'anubhav@gmail.com', 'Male', 20, 'Mumbai', 'Thane, Mumbai', 'I am whatever you can imagine'),
('Devanshu3', 'Devanshu', '4567981234', 'devanshu3@gmail.com', 'Male', 25, 'Chandigarh', 'Chandigarh', 'hgkgfeklbea'),
('Meena', 'Meena Dhandhal', '8949671791', 'meenadhandhal@gmail.com', 'Female', 12, 'SGNR', 'Mahiyanwali', 'My other name is Jatin'),
('Naman', 'Naman', '8456125896', 'divanshudhandhal@gmail.com', 'Male', 18, 'California', 'Chandigarh', 'I am a winner'),
('Naman5', 'Naman', '7733947110', 'nchouhan56@gmail.com', 'Male', 18, 'Hanumangarh', 'Hanumangarh', 'I am a pro'),
('Rachna', 'Rachna', '8949671791', 'rachna@gmail.com', 'Female', 14, 'Hanumangarh', 'Hanumangarh', 'M syani hu'),
('Rahul', 'Rahul', '6549871231', 'rahul@gmail.com', 'Male', 25, 'California', 'California', 'vugvgkvugkvgukvku'),
('Sourabh', 'Sourabh', '7539512585', 'sourabh@gmail.com', 'Male', 20, 'Patna', 'Patna, Bihar', 'Designer');

-- --------------------------------------------------------

--
-- Table structure for table `slips`
--

CREATE TABLE `slips` (
  `rid` int(11) NOT NULL,
  `patientid` varchar(255) NOT NULL,
  `doctorname` varchar(50) NOT NULL,
  `dovisit` date NOT NULL,
  `city` varchar(50) NOT NULL,
  `hospital` varchar(100) NOT NULL,
  `nextdov` date NOT NULL,
  `problem` varchar(500) NOT NULL,
  `discussion` varchar(4000) NOT NULL,
  `slippic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slips`
--

INSERT INTO `slips` (`rid`, `patientid`, `doctorname`, `dovisit`, `city`, `hospital`, `nextdov`, `problem`, `discussion`, `slippic`) VALUES
(13, 'Devanshu', 'Dharampal', '2020-07-02', 'California', 'YouTube', '2020-07-15', 'No problem', 'Funny', 'Screenshot (36).png');

-- --------------------------------------------------------

--
-- Table structure for table `sugarrecord`
--

CREATE TABLE `sugarrecord` (
  `uid` varchar(25) NOT NULL,
  `dateofrecord` varchar(25) NOT NULL,
  `timeofrecord` varchar(30) NOT NULL,
  `sugartime` varchar(30) NOT NULL,
  `age` varchar(5) NOT NULL,
  `sugarresult` float DEFAULT NULL,
  `medintake` varchar(25) NOT NULL,
  `urineresult` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sugarrecord`
--

INSERT INTO `sugarrecord` (`uid`, `dateofrecord`, `timeofrecord`, `sugartime`, `age`, `sugarresult`, `medintake`, `urineresult`) VALUES
('Devanshu', '2020-07-09', '13:03', 'Before meal', '20', 50, 'whatever', 0),
('Devanshu', '2020-07-16', '13:07', 'Before meal', '20', 50, 'whatever', 50),
('Aman', '2020-07-26', '11:33', 'After meal', '20', 45, 'pta nhi', 50),
('Aman', '2020-07-24', '11:33', 'Bedtime', '20', 63, '', 0),
('Aman', '2020-07-24', '11:33', 'Bedtime', '', 0, 'pta h', 36),
('Rachna', '2020-07-26', '13:24', 'After meal', '14', 50, 'Paracetamol', 56);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` varchar(25) NOT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `mob` varchar(12) DEFAULT NULL,
  `dos` date NOT NULL,
  `category` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `pwd`, `mob`, `dos`, `category`) VALUES
('', '', '', '2020-07-24', ''),
('Abcd', 'Abcd1234$', '7425896325', '2020-07-22', 'patient'),
('Aman', 'Aman1234$', '8546123458', '2020-07-02', 'patient'),
('Amrit', 'Amrit1234$', '8541236974', '2020-07-22', 'patient'),
('Amrit12', 'Amrit123$', '8745696541', '2020-07-28', 'doctor'),
('Anubhav', 'Anubhav1234$', '8521479635', '2020-07-22', 'patient'),
('Bharat', 'Bharat1234$', '8949671791', '2020-07-26', 'doctor'),
('Devanshu', 'Devanshu1234$', '7742247416', '2020-07-02', 'doctor'),
('Devanshu2', 'Devanshu2134$', '7412589635', '2020-07-22', 'patient'),
('Devanshu3', 'Devanshu31234$', '5123645789', '2020-07-22', 'patient'),
('Jatin', 'Jatin1234$', '1234567891', '2020-07-22', 'patient'),
('Jatin2', 'Jatin21234$', '4567981238', '2020-07-22', 'patient'),
('Manish', 'Manish1234$', '8456912345', '2020-07-06', 'doctor'),
('Meena', 'Meena1234$', '8949671791', '2020-07-24', 'patient'),
('Mukul', 'Devanshu1234$', '7742247416', '2020-07-04', 'patient'),
('Naman', 'Naman1234$', '7733947110', '2020-07-29', 'patient'),
('Naman5', 'Naman51234$', '7733947110', '2020-07-29', 'patient'),
('pimin', 'Pimin1234$', '7412589633', '2020-07-24', 'patient'),
('Rachna', 'Rachna1234$', '8949671791', '2020-07-26', 'patient'),
('Rahul', 'Rahul1234$', '6549871236', '2020-07-22', 'patient'),
('Rajat', 'Rajat1234$', '8290907788', '2020-07-06', 'patient'),
('Raman', 'Raman1234$', '8456971235', '2020-07-04', 'doctor'),
('Siddharth', 'Sid1234$', '8546123695', '2020-07-04', 'doctor'),
('Sourabh', 'Sourabh1234$', '7539512585', '2020-07-22', 'patient');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `slips`
--
ALTER TABLE `slips`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `slips`
--
ALTER TABLE `slips`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
