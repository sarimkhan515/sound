-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 11:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sound`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_album`
--

CREATE TABLE `tbl_album` (
  `id` int(11) NOT NULL,
  `album` varchar(500) NOT NULL,
  `artistname` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_album`
--

INSERT INTO `tbl_album` (`id`, `album`, `artistname`) VALUES
(1, 'Coke Studio', 1),
(2, 'English Hip Hops', 2),
(3, 'Tadipaar', 3),
(4, 'talha anjum', 3),
(5, 'afsaanay', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artist`
--

CREATE TABLE `tbl_artist` (
  `id` int(11) NOT NULL,
  `artist_name` varchar(200) NOT NULL,
  `artist_category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_artist`
--

INSERT INTO `tbl_artist` (`id`, `artist_name`, `artist_category`) VALUES
(1, 'Atif Aslam', 'Sufi'),
(2, 'The Weekend', 'English Hip hop'),
(3, 'MC STAN', 'Hip Hop');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_favourites`
--

CREATE TABLE `tbl_favourites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `saved_songs` varchar(1000) NOT NULL,
  `music_id` int(11) NOT NULL,
  `music_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_favourites`
--

INSERT INTO `tbl_favourites` (`id`, `user_id`, `saved_songs`, `music_id`, `music_title`) VALUES
(1, 2, './musicfiles/The Weeknd - Starboy ft. Daft Punk (Official Video) (64 kbps).mp3', 1, ''),
(5, 2, './musicfiles/The Weeknd - Starboy ft. Daft Punk (Official Video) (64 kbps).mp3', 1, 'Starboy'),
(6, 2, './musicfiles/y2mate.com - Besharam Rang Song  Pathaan  Shah Rukh Khan Deepika Padukone  Vishal  Sheykhar  Shilpa Kumaar.mp3', 2, 'besharam'),
(8, 2, './musicfiles/y2mate.com - Besharam Rang Song  Pathaan  Shah Rukh Khan Deepika Padukone  Vishal  Sheykhar  Shilpa Kumaar.mp3', 3, 'aaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_music`
--

CREATE TABLE `tbl_music` (
  `id` int(11) NOT NULL,
  `music_title` varchar(200) NOT NULL,
  `artistname` int(11) NOT NULL,
  `music_banner` varchar(500) NOT NULL,
  `music_file` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL,
  `album` int(11) NOT NULL,
  `artist_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_music`
--

INSERT INTO `tbl_music` (`id`, `music_title`, `artistname`, `music_banner`, `music_file`, `date`, `album`, `artist_category`) VALUES
(1, 'Starboy', 2, './musicbanner/download.jpg', './musicfiles/The Weeknd - Starboy ft. Daft Punk (Official Video) (64 kbps).mp3', '2023-05-02', 2, 2),
(2, 'besharam', 1, './musicbanner/WhatsApp Image 2023-04-25 at 8.50.08 PM.jpeg', './musicfiles/y2mate.com - Besharam Rang Song  Pathaan  Shah Rukh Khan Deepika Padukone  Vishal  Sheykhar  Shilpa Kumaar.mp3', '2023-05-24', 1, 2),
(3, 'aaaaaaa', 1, './musicbanner/instagram.png', './musicfiles/y2mate.com - Besharam Rang Song  Pathaan  Shah Rukh Khan Deepika Padukone  Vishal  Sheykhar  Shilpa Kumaar.mp3', '2023-05-16', 1, 1),
(4, 'bbbbbb', 2, './musicbanner/sebastiaan-stam-WUQtrfm0cTU-unsplash.jpg', './musicfiles/y2mate.com - Besharam Rang Song  Pathaan  Shah Rukh Khan Deepika Padukone  Vishal  Sheykhar  Shilpa Kumaar.mp3', '2023-05-18', 1, 1),
(11, 'AIK DIN PYAAR', 3, './musicbanner/Ek-Din-Pyaar-Lyrics-–-MC-Stan.jpg', './musicfiles/y2mate.com - MC STΔN  EK DIN PYAAR  TADIPAAR  2K20.mp3', '2023-05-27', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reviews`
--

CREATE TABLE `tbl_reviews` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(500) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `video_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `pfp` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_reviews`
--

INSERT INTO `tbl_reviews` (`id`, `date`, `name`, `message`, `video_id`, `rating`, `pfp`) VALUES
(1, '2023-05-22', 'Rafay Khan', 'Good', 2, 4, 'unnamed(1).jpg'),
(2, '2023-05-22', 'Rafay Khan', 'good', 2, 5, 'unnamed(1).jpg'),
(3, '2023-05-22', 'Rafay Khan', 'good', 2, 5, 'unnamed(1).jpg'),
(4, '2023-05-22', '', '', 0, 4, ''),
(5, '2023-05-22', '', '', 0, 5, ''),
(6, '2023-05-22', '', '', 0, 5, ''),
(7, '2023-05-22', '', '', 0, 5, ''),
(8, '2023-05-22', '', '', 0, 5, ''),
(9, '2023-05-22', '', '', 0, 3, ''),
(10, '2023-05-22', '', '', 0, 3, ''),
(11, '2023-05-22', '', '', 0, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `p_pic` varchar(1000) NOT NULL DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `uname`, `lastname`, `email`, `password`, `p_pic`) VALUES
(2, 'Rafay', 'Khan', 'rafay@gmail.com', '12345', './profilepic/'),
(3, 'sarim', 'khan', 'sarim@gmail.com', '123', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `music_name` varchar(200) NOT NULL,
  `video_file` varchar(500) NOT NULL,
  `artistname` int(11) NOT NULL,
  `album` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`id`, `date`, `music_name`, `video_file`, `artistname`, `album`) VALUES
(3, '2023-05-02', 'Starboy', './musicvideo/y2mate.com - The Weeknd  Starboy ft Daft Punk Official Video_v720P.mp4', 2, 2),
(5, '2023-05-27', 'AIK DIN PYAAR', './musicvideo/y2mate.com - MC STΔN  EK DIN PYAAR  TADIPAAR  2K20_480p.mp4', 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_album`
--
ALTER TABLE `tbl_album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foreign key` (`artistname`);

--
-- Indexes for table `tbl_artist`
--
ALTER TABLE `tbl_artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_favourites`
--
ALTER TABLE `tbl_favourites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `music_title` (`music_title`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `music_id` (`music_id`);

--
-- Indexes for table `tbl_music`
--
ALTER TABLE `tbl_music`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album` (`album`),
  ADD KEY `artist category` (`artist_category`),
  ADD KEY `artist name` (`artistname`);

--
-- Indexes for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_id` (`video_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist` (`artistname`),
  ADD KEY `album` (`album`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_album`
--
ALTER TABLE `tbl_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_artist`
--
ALTER TABLE `tbl_artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_favourites`
--
ALTER TABLE `tbl_favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_music`
--
ALTER TABLE `tbl_music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_album`
--
ALTER TABLE `tbl_album`
  ADD CONSTRAINT `Foreign key` FOREIGN KEY (`artistname`) REFERENCES `tbl_artist` (`id`);

--
-- Constraints for table `tbl_favourites`
--
ALTER TABLE `tbl_favourites`
  ADD CONSTRAINT `tbl_favourites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `tbl_favourites_ibfk_2` FOREIGN KEY (`music_id`) REFERENCES `tbl_music` (`id`);

--
-- Constraints for table `tbl_music`
--
ALTER TABLE `tbl_music`
  ADD CONSTRAINT `tbl_music_ibfk_1` FOREIGN KEY (`album`) REFERENCES `tbl_album` (`id`),
  ADD CONSTRAINT `tbl_music_ibfk_2` FOREIGN KEY (`artist_category`) REFERENCES `tbl_artist` (`id`),
  ADD CONSTRAINT `tbl_music_ibfk_3` FOREIGN KEY (`artistname`) REFERENCES `tbl_artist` (`id`);

--
-- Constraints for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD CONSTRAINT `tbl_video_ibfk_1` FOREIGN KEY (`artistname`) REFERENCES `tbl_artist` (`id`),
  ADD CONSTRAINT `tbl_video_ibfk_2` FOREIGN KEY (`album`) REFERENCES `tbl_album` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
