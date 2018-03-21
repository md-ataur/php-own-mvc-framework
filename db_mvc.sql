-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2018 at 12:43 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `title`) VALUES
(1, 'Health', 'Health Care'),
(2, 'Sports', 'Sports Cat'),
(3, 'Education', 'Education Success'),
(4, 'Javascript', 'Javascript Lang'),
(5, 'Language', 'Language UK');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `cat` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `cat`) VALUES
(3, 'Third Post title', '<p>Third Post content will be go here. Third Post content will be go here. Third Post content will be go here. Third Post content will be go here. Third Post content will be go here. Third Post content will be go here. Third Post content will be go here. Third Post content will be go here. Third Post content will be go here. Third Post content will be go here. </p>\r\n\r\n<p>Third Post content will be go here. Third Post content will be go here. Third Post content will be go here. Third Post content will be go here. Third Post content will be go here. Third Post content will be go here. Third Post content will be go here. Third Post content will be go here. Third Post content will be go here. Third Post content will be go here. </p>', 4),
(4, 'Fourth Post title', '<p>Fourth Post Content will be go here. Fourth Post Content will be go here. Fourth Post Content will be go here. Fourth Post Content will be go here. Fourth Post Content will be go here. Fourth Post Content will be go here. Fourth Post Content will be go here. Fourth Post Content will be go here. Fourth Post Content will be go here.<p>\r\n\r\n<p>Fourth Post Content will be go here. Fourth Post Content will be go here. Fourth Post Content will be go here. Fourth Post Content will be go here. Fourth Post Content will be go here. Fourth Post Content will be go here. Fourth Post Content will be go here. Fourth Post Content will be go here. Fourth Post Content will be go here.<p>', 4),
(5, 'Sports Post title', '<p>Sports Content will be go here. Sports Content will be go here. Sports Content will be go here. Sports Content will be go here. Sports Content will be go here. Sports Content will be go here. Sports Content will be go here. Sports Content will be go here.</p>\r\n\r\n<p>Sports Content will be go here. Sports Content will be go here. Sports Content will be go here. Sports Content will be go here. Sports Content will be go here. Sports Content will be go here. Sports Content will be go here. Sports Content will be go here.</p>\r\n\r\n<p>&nbsp;</p>', 2),
(8, 'Fast facts on health', '<p>Here are some key points about health. More detail is in the main article.</p>\r\n\r\n<ul>\r\n	<li>Health can be defined as physical, mental, and social wellbeing, and as a resource for living a full life.</li>\r\n	<li>It refers not only to the absence of disease, but the ability to recover and bounce back from illness and other problems.</li>\r\n	<li>Factors for good health include genetics, the environment, relationships, and education.</li>\r\n	<li>A healthful diet, exercise, screening for diseases, and coping strategies can all enhance a person&#39;s health.</li>\r\n</ul>', 1),
(9, 'What is health?', '<p>Ataur This means that health is a resource to support an individual&#39;s function in wider society. A healthful lifestyle provides the means to lead a full life.&nbsp;This means that health is a resource to support an individual&#39;s function in wider society. A healthful lifestyle provides the means to lead a full life.&nbsp;This means that health is a resource to support an individual&#39;s function in wider society. A healthful lifestyle provides the means to lead a full life.</p>\r\n\r\n<p>More recently, researchers have&nbsp;<a href="http://www.thelancet.com/journals/lancet/article/PIIS0140-6736(09)60456-6/abstract" target="_blank">defined</a>&nbsp;health as the ability of a body to adapt to new threats and infirmities. They base this on the idea that modern science has dramatically increased human awareness of diseases and how they work in the last few decades.</p>\r\n\r\n<p>This means that health is a resource to support an individual&#39;s function in wider society. A healthful lifestyle provides the means to lead a full life.</p>\r\n\r\n<p>More recently, researchers have&nbsp;<a href="http://www.thelancet.com/journals/lancet/article/PIIS0140-6736(09)60456-6/abstract" target="_blank">defined</a>&nbsp;health as the ability of a body to adapt to new threats and infirmities. They base this on the idea that modern science has dramatically increased human awareness of diseases and how they work in the last few decades.</p>', 1),
(11, 'Why is Education So Important in Our Life?', '<p>When I started thinking about why education is so important, I remembered my high school years when I used to spend almost five hours a month on math homework, wake up at 6:00 AM and get ready for my PSAL soccer game after school. I remembered my teachers, school subjects, the study and the fun! I never really hated school. But I have seen many of my peers who hated going to school; I have had some friends who did not like the idea of studying. Some needed to be up in summer school for recovery. I personally was always focused because I wanted to become a software engineer. I know it will be hard and very challenging. However I believe I can handle the challenge.</p>', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ui`
--

CREATE TABLE IF NOT EXISTS `ui` (
`id` int(1) NOT NULL,
  `color` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ui`
--

INSERT INTO `ui` (`id`, `color`) VALUES
(1, '#808000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(3, 'salman', '81dc9bdb52d04dc20036dbd8313ed055', 3),
(4, 'author', '81dc9bdb52d04dc20036dbd8313ed055', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ui`
--
ALTER TABLE `ui`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ui`
--
ALTER TABLE `ui`
MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
