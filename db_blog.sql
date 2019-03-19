-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 19, 2019 at 05:19 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(1, 'Home'),
(2, 'Family'),
(3, 'Friends'),
(4, 'Brothers'),
(6, 'Cousinssshgg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(111) NOT NULL,
  `lastname` varchar(111) NOT NULL,
  `email` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `firstname`, `lastname`, `email`, `body`, `time`, `status`) VALUES
(1, 'Ahmed', 'Afzal', 'darkcoder71@gmail.com', 'hi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezing', '2019-03-18 12:37:31', 0),
(2, 'Millat', 'Hossain', 'admin@sdf.com', 'hi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezing', '2019-03-18 12:37:31', 0),
(3, 'asdf', 'Masud', 'asdfasdf@lksfasdfsd.cim', 'adfsadhi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezinghi, is this your first project\r\nits ust amezing', '2019-03-18 12:37:31', 0),
(4, 'Newaz', 'Sarkar', 'newa@gmai.com', 'I live with my parents. I have one brother and one sister. They are students too. My father is a businessman. My mother is a housewife. On holidays, she cooks special dishes. She works at home. My hobby is gardening. I work in my garden in the afternoon. I enjoy cricket very much. During leisure I read novels , story books an watch T.V. I always help the poor. I teach the illiterate when I go to my village home during holidays.', '2019-03-18 12:37:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE `tbl_footer` (
  `id` int(1) NOT NULL,
  `note` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `note`) VALUES
(1, 'http://www.github.com/imtiaze');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `name`, `body`) VALUES
(1, 'Portfolio', '<p>Hello I am Ahammed Imtiaze,&nbsp; Welcome to my <a href=\"https://imtiaze.github.io/cuda_portfolio_page_design/\" target=\"_blank\">website</a></p>\r\n<p>From Dhaka, Bangladesh.</p>'),
(2, 'Privacy', '<p>Internet Privacy The concern about privacy on the Internet is increasingly becoming an issue of international dispute. ?Citizens are becoming concerned that the most intimate details of their daily lives are being monitored, searched and recorded.? (www.britannica.com) 81% of Net users are concerned about threats to their privacy while online. The greatest threat to privacy comes from the construction of e-commerce alone, and not from state agents. E-commerce is structured on the copy and</p>'),
(3, 'Masud', '<p>description</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `title`, `body`, `image`, `author`, `tags`, `date`) VALUES
(1, 3, 'My Friend Billal', '<p>Friendship is a bond that is built carefully and treasured fiercely. It is a bond that you would not let go easily; you will defend it at all cost. It takes time to nurture a friendship. It is not created for the nonce. It is cultivated with much love and care over time. There is a great deal that goes into building and keeping a friendship. It is love and care that keep a friendship going. Where there is no love but only greed and selfishness there is no friendship at all. A friend is one who will sacrifice anything for you and yet not feel it a sacrifice at all, for there is love and concern for the other in a true friendship. When there is love in a friendship it can last a lifetime. A true friend is one who will share in your joys and in your troubles. Your friend will feel joy in your enjoyment and pain in your time of trouble. It is heart-warming and comforting to have a real friend. You know you will have a shoulder to weep on if sorrow or failure comes your way. Just as you will be assured of a hand to share a high five with in your joy and success. A friend is one who shares with you with no expectations. There is no quid pro quo in such a friendship. Friendship gives true happiness, because when you have a real friend you have all their love.</p>', 'upload/f7c9dd9596.jpg', 'Imtiaze', 'friend, friends, marriage, reunion, selfie, billal, sohan, imtiaze', '2019-02-28 17:48:51'),
(2, 3, 'My Friend Ahsanul Haque Milllat', '<p>Friendship is a bond that is built carefully and treasured fiercely. It is a bond that you would not let go easily; you will defend it at all cost. It takes time to nurture a friendship. It is not created for the nonce. It is cultivated with much love and care over time. There is a great deal that goes into building and keeping a friendship. It is love and care that keep a friendship going. Where there is no love but only greed and selfishness there is no friendship at all. A friend is one who will sacrifice anything for you and yet not feel it a sacrifice at all, for there is love and concern for the other in a true friendship. When there is love in a friendship it can last a lifetime. A true friend is one who will share in your joys and in your troubles. Your friend will feel joy in your enjoyment and pain in your time of trouble. It is heart-warming and comforting to have a real friend. You know you will have a shoulder to weep on if sorrow or failure comes your way. Just as you will be assured of a hand to share a high five with in your joy and success. A friend is one who shares with you with no expectations. There is no quid pro quo in such a friendship. Friendship gives true happiness, because when you have a real friend you have all their love.</p>', 'upload/77164e3ee8.jpg', 'Imtiaze', 'friend, friends, birthday, reunion, selfie, millat, sneher ador, zakir, Jakir', '2019-02-28 18:15:54'),
(3, 1, 'My Self Ahammed Imtiaze', '<p>My name is Imtiaze. I am 13 years old. I live in Dhaka city. I am a student of class 7. I read in Shahajuddin Sarker Model School. My school starts at 8 am and finishes at 1 p.m. I am studying Bangla , English, Math, Social science, General science, Religion in the school. I go to school on foot and return home by rickshaw. All the teachers of my school are very friendly and helpful. I love my school very much.<br /> I live with my parents. I have one brother and one sister. They are students too. My father is a businessman. My mother is a housewife. On holidays, she cooks special dishes. She works at home. My hobby is gardening. I work in my garden in the afternoon. I enjoy cricket very much. During leisure I read novels , story books an watch T.V. I always help the poor. I teach the illiterate when I go to my village home during holidays.</p>', 'upload/b7d1f59c45.jpg', 'Admin', 'Ahammed , imti,imtiaze, khorrom, myself, bhairab, kishoregonj, jagannathpur', '2019-03-06 06:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `facebook` varchar(111) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `facebook`, `twitter`, `linkedin`, `google`) VALUES
(1, 'https://www.facebook.com/darkcoderimti', 'https://www.twitter.com/ahammed', 'https://www.linkedin.com/in/ahammed-imtiaze-a41537100/', 'https://plus.google.com/u/1/102012694928751463305');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_title`
--

CREATE TABLE `tbl_title` (
  `id` int(11) NOT NULL,
  `title` varchar(111) NOT NULL,
  `slogan` varchar(111) NOT NULL,
  `logo` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_title`
--

INSERT INTO `tbl_title` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'Masudur R', 'My First Blog', 'upload/logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_title`
--
ALTER TABLE `tbl_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_title`
--
ALTER TABLE `tbl_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
