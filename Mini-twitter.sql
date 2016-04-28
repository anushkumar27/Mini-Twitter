-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2016 at 05:14 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tweet`
--

-- --------------------------------------------------------

--
-- Table structure for table `follower`
--

CREATE TABLE IF NOT EXISTS `follower` (
  `uid` int(10) NOT NULL,
  `follow_uid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hashtags`
--

CREATE TABLE IF NOT EXISTS `hashtags` (
  `uid` int(10) NOT NULL,
  `tags` varchar(50) NOT NULL,
  `tag_id` int(10) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hashtags`
--

INSERT INTO `hashtags` (`uid`, `tags`, `tag_id`, `timestamp`) VALUES
(1, '#ICC-T20', 10, '2016-04-20 12:57:17.906268'),
(1, '#whatsUp', 12, '2016-04-21 02:57:31.701657'),
(1, '#goodMorning', 16, '2016-04-21 03:09:41.692538'),
(1, '#cricket\n', 20, '2016-04-21 03:14:24.363757'),
(1, '#winter', 22, '2016-04-21 03:22:14.294382'),
(1, '#PES', 23, '2016-04-21 03:26:47.567215'),
(1, '#PESU', 24, '2016-04-21 03:28:52.257133'),
(1, '#CSE', 25, '2016-04-21 03:31:19.880451'),
(1, '#boring', 27, '2016-04-21 03:33:11.616505'),
(1, '#Movie', 28, '2016-04-21 03:34:30.762239'),
(1, '#CSE-SEC', 29, '2016-04-21 04:27:37.020764'),
(1, '#INDIA', 30, '2016-04-21 04:34:27.717312'),
(5, '#OMG', 31, '2016-04-21 04:49:45.469929'),
(5, '#CrickInfo', 33, '2016-04-21 05:34:10.471309'),
(6, '#apple', 34, '2016-04-21 05:50:51.809066'),
(6, '#bollywood', 35, '2016-04-21 05:52:04.404091'),
(4, '#news_now', 36, '2016-04-21 05:54:21.834218'),
(4, '#pesu', 37, '2016-04-21 05:56:08.343277'),
(1, '#playbold', 38, '2016-04-21 05:57:13.790807'),
(1, '#mustang', 39, '2016-04-21 05:58:35.617376'),
(5, '#modi', 40, '2016-04-21 05:59:32.873689'),
(7, '#Welcome', 41, '2016-04-21 06:26:58.581068'),
(7, '#teamMini', 42, '2016-04-21 06:34:20.705572');

-- --------------------------------------------------------

--
-- Table structure for table `tweetcategory`
--

CREATE TABLE IF NOT EXISTS `tweetcategory` (
  `cat_id` int(10) NOT NULL,
  `cat_text` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tweetcategory`
--

INSERT INTO `tweetcategory` (`cat_id`, `cat_text`) VALUES
(1, 'Sports'),
(2, 'General'),
(3, 'Bollywood'),
(4, 'Politics'),
(5, 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `tweetlikes`
--

CREATE TABLE IF NOT EXISTS `tweetlikes` (
  `tweet_id` int(10) NOT NULL,
  `tweet_likes` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tweetlikes`
--

INSERT INTO `tweetlikes` (`tweet_id`, `tweet_likes`) VALUES
(36, 5),
(37, 3),
(38, 6),
(39, 1),
(40, 0),
(41, 0),
(42, 1),
(43, 4),
(44, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tweetlocation`
--

CREATE TABLE IF NOT EXISTS `tweetlocation` (
  `loc_id` int(10) NOT NULL,
  `loc_text` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tweetlocation`
--

INSERT INTO `tweetlocation` (`loc_id`, `loc_text`) VALUES
(1, 'Bangalore'),
(3, 'Chennai'),
(5, 'Delhi'),
(2, 'Mumbai'),
(4, 'Orrisa');

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE IF NOT EXISTS `tweets` (
  `uid` int(10) NOT NULL,
  `tweet_id` int(10) NOT NULL,
  `tweet_text` varchar(500) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `loc_id` int(10) NOT NULL,
  `tweet_trending` int(11) NOT NULL,
  `tag_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`uid`, `tweet_id`, `tweet_text`, `cat_id`, `loc_id`, `tweet_trending`, `tag_id`) VALUES
(5, 36, '#CrickInfo India Wins !', 1, 3, 0, 33),
(6, 37, '#apple apple releases its new macbook in rose gold with better battery life !!!', 5, 1, 0, 34),
(6, 38, '#bollywood ki and ka is the best movie ever !!!', 3, 2, 0, 35),
(4, 39, '#pesu pisat a great sucess', 2, 3, 0, 24),
(1, 40, 'watching rcb match #playbold', 1, 1, 0, 38),
(1, 41, 'ford releases #mustang', 2, 5, 0, 39),
(5, 42, 'modi likes his wax statue #modi', 4, 4, 0, 40),
(7, 43, 'Hi mini twittwer #Welcome', 2, 2, 0, 41),
(7, 44, 'Anush #teamMini', 2, 1, 0, 42);

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE IF NOT EXISTS `userlogin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `uid` int(10) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`username`, `password`, `uid`, `timestamp`) VALUES
('anush', 'anush', 1, '2016-04-20 09:54:33.449860'),
('akash', 'akash', 4, '2016-04-20 10:01:00.561751'),
('bhavik', 'bhavik', 5, '2016-04-20 10:23:20.919842'),
('po', 'po', 6, '2016-04-21 05:45:14.430765'),
('ramesh', 'ramesh', 7, '2016-04-21 06:26:03.528725');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `follower`
--
ALTER TABLE `follower`
  ADD KEY `follower_fk0` (`uid`);

--
-- Indexes for table `hashtags`
--
ALTER TABLE `hashtags`
  ADD PRIMARY KEY (`tag_id`), ADD KEY `hashTags_fk0` (`uid`);

--
-- Indexes for table `tweetcategory`
--
ALTER TABLE `tweetcategory`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tweetlikes`
--
ALTER TABLE `tweetlikes`
  ADD PRIMARY KEY (`tweet_id`);

--
-- Indexes for table `tweetlocation`
--
ALTER TABLE `tweetlocation`
  ADD PRIMARY KEY (`loc_id`), ADD UNIQUE KEY `loc_text` (`loc_text`);

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`tweet_id`), ADD KEY `tweets_fk0` (`uid`), ADD KEY `tweets_fk1` (`cat_id`), ADD KEY `tweets_fk2` (`loc_id`), ADD KEY `tweets_fk3` (`tag_id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`uid`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hashtags`
--
ALTER TABLE `hashtags`
  MODIFY `tag_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tweetcategory`
--
ALTER TABLE `tweetcategory`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tweetlikes`
--
ALTER TABLE `tweetlikes`
  MODIFY `tweet_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `tweetlocation`
--
ALTER TABLE `tweetlocation`
  MODIFY `loc_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `tweet_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `follower`
--
ALTER TABLE `follower`
ADD CONSTRAINT `follower_fk0` FOREIGN KEY (`uid`) REFERENCES `userlogin` (`uid`);

--
-- Constraints for table `hashtags`
--
ALTER TABLE `hashtags`
ADD CONSTRAINT `hashTags_fk0` FOREIGN KEY (`uid`) REFERENCES `userlogin` (`uid`);

--
-- Constraints for table `tweetlikes`
--
ALTER TABLE `tweetlikes`
ADD CONSTRAINT `tweetLikes_fk0` FOREIGN KEY (`tweet_id`) REFERENCES `tweets` (`tweet_id`);

--
-- Constraints for table `tweets`
--
ALTER TABLE `tweets`
ADD CONSTRAINT `tweets_fk0` FOREIGN KEY (`uid`) REFERENCES `userlogin` (`uid`),
ADD CONSTRAINT `tweets_fk1` FOREIGN KEY (`cat_id`) REFERENCES `tweetcategory` (`cat_id`),
ADD CONSTRAINT `tweets_fk2` FOREIGN KEY (`loc_id`) REFERENCES `tweetlocation` (`loc_id`),
ADD CONSTRAINT `tweets_fk3` FOREIGN KEY (`tag_id`) REFERENCES `hashtags` (`tag_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
