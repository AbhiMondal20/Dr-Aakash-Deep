-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 02:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `draakashdeep`
--

-- --------------------------------------------------------

--
-- Table structure for table `appt`
--

CREATE TABLE `appt` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `services` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appt`
--

INSERT INTO `appt` (`id`, `name`, `phone`, `email`, `services`, `message`, `date`) VALUES
(1, 'Abhi', '8101202074', 'abhitechbot@gmail.com', 'Macular Hole', '', '2023-12-05 16:24:43'),
(2, 'Abhi', '8101202074', 'abhitechbot@gmail.com', 'Retinitis Pigmentosa', 'Hello Index', '2023-12-05 16:27:27'),
(3, 'Demo', '8101202074', 'demo@gmail.com', 'Macular Degeneration', 'contact page', '2023-12-05 16:28:14');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `page_type` varchar(255) DEFAULT NULL,
  `arc_images` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `upload_date` varchar(255) DEFAULT NULL,
  `dr_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `added_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modified_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `page_type`, `arc_images`, `images`, `upload_date`, `dr_id`, `status`, `date`, `added_by`, `modified_by`, `modified_date`) VALUES
(1, 'Understanding and Managing Conjunctivitis (Red Eye)', '<div>The vibrant world of eye care encounters its fair share of challenges, and one common ailment that often paints the eyes red is conjunctivitis, colloquially known as \"red eye.\" In this blog, we\'ll delve into the intricacies of conjunctivitis, exploring its causes, symptoms, and effective management strategies with the expert guidance of Dr. Aakash Deep.</div>\n<br>\n<h2><strong>Unmasking the Culprit: What is Conjunctivitis?</strong></h2>\n<div>Conjunctivitis, commonly referred to as \"pink eye\" or \"red eye,\" is an inflammation of the conjunctiva&mdash;the thin, transparent layer covering the white part of the eye and the inner surface of the eyelids. Dr. Aakash Deep sheds light on the diverse causes behind this eye condition, ranging from viral and bacterial infections to allergic reactions.</div>\n<br>\n<h2>Seeing Red: Recognizing the Symptoms:</h2>\n<div>The hallmark of conjunctivitis is, undoubtedly, the redness in the eyes. Dr. Aakash Deep guides us through a comprehensive understanding of the symptoms, which may also include itching, tearing, discharge, and light sensitivity. Unraveling the specifics of these symptoms aids in accurate diagnosis and targeted treatment.</div>\n<br>\n<h2>Types of Conjunctivitis:</h2>\n<div>Our expert, Dr. Aakash Deep, distinguishes between the various types of conjunctivitis&mdash;viral, bacterial, and allergic. Each type presents unique challenges and requires tailored approaches for effective management. Understanding these distinctions is crucial for both patients and caregivers.</div>\n<br>\n<h2>Dr. Aakash Deep\'s Diagnostic Precision:</h2>\n<div>As we navigate the nuances of conjunctivitis, we explore the diagnostic precision brought to the table by Dr. Aakash Deep. His expertise allows for accurate identification of the underlying cause, paving the way for informed decision-making in the treatment process.</div>\n<br>\n<h2>Treatment Strategies: The Road to Relief:</h2>\n<div>From viral and bacterial conjunctivitis to allergic reactions, Dr. Aakash Deep outlines the various treatment strategies available. This section of the blog serves as a practical guide, offering insights into prescription medications, home remedies, and preventive measures to alleviate discomfort and promote swift recovery.</div>\n<br>\n<h2>The Crucial Role of Prevention:</h2>\n<div>Dr. Aakash Deep emphasizes the significance of preventive measures to curb the spread of conjunctivitis. From maintaining good eye hygiene to recognizing early symptoms, our expert provides valuable tips for minimizing the risk of conjunctivitis and safeguarding overall eye health.</div>\n<br>\n<h2>Conclusion: Expert Guidance for Clearer, Healthier Eyes:</h2>\n<div>As we conclude this exploration into the realm of conjunctivitis, guided by the expertise of Dr. Aakash Deep, readers gain not only a deeper understanding of the condition but also actionable insights for effective management and prevention. Through this blog, we aim to empower individuals to navigate the \"red eye\" challenge with knowledge and confidence, ensuring a clearer and healthier vision.</div>', '', 'upload/blog/656d807882df8.webp', 'upload/blog/656d807882def.webp', '2023-12-04', 49, 1, '2023-12-04 13:02:08', '1', NULL, NULL),
(2, 'Diabetes in eye  What you should KNOW', 'Diabetes, a pervasive health condition affecting millions globally, extends its impact to the eyes, presenting unique challenges to vision health. In this comprehensive guide, we unravel the crucial aspects of diabetes in the eyes, shedding light on what individuals should know to safeguard their vision. Join us on a journey of understanding guided by expert insights.', '', 'upload/blog/656d813de1de1.webp', 'upload/blog/656d813de1dde.webp', '2023-12-05', 49, 0, '2023-12-04 13:05:25', '1', NULL, NULL),
(3, 'Dry Eyes Understanding, Managing, and Thriving in Comfort', '<p>Dry eyes can be more than just a temporary inconvenience; they can significantly impact daily life and overall eye health. In this insightful guide, we explore the intricacies of dry eyes, offering a comprehensive understanding of the condition and practical strategies for effective management.</p>\r\n<p>Dry eyes can be more than just a temporary inconvenience; they can significantly impact daily life and overall eye health. In this insightful guide, we explore the intricacies of dry eyes, offering a comprehensive understanding of the condition and practical strategies for effective management.</p>\r\n<p>Dry eyes can be more than just a temporary inconvenience; they can significantly impact daily life and overall eye health. In this insightful guide, we explore the intricacies of dry eyes, offering a comprehensive understanding of the condition and practical strategies for effective management.</p>\r\n<p>Dry eyes can be more than just a temporary inconvenience; they can significantly impact daily life and overall eye health. In this insightful guide, we explore the intricacies of dry eyes, offering a comprehensive understanding of the condition and practical strategies for effective management.</p>', '', 'upload/blog/656d81c964183.webp', 'upload/blog/656db930a1b75.webp', '2023-12-01', 49, 1, '2023-12-04 13:07:45', '1', '1', '2023-12-04 12:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `fav_icon` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `mobile2` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `blog` varchar(255) DEFAULT NULL,
  `last_update` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `url`, `title`, `fav_icon`, `logo`, `address`, `email`, `email2`, `mobile`, `mobile2`, `whatsapp`, `facebook`, `youtube`, `instagram`, `blog`, `last_update`) VALUES
(1, 'https://draakashdeep.com', 'Dr Aakash Deep Best Retina Surgeon in Siliguri', 'upload/656dbfdb854a5.png', 'upload/656dbfdb8539c.png', '', 'abhitechbot@gmail.com', '', '8101202074', '8888888888', '8101202074', '', '', '', '', '2023-10-18 16:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(255) DEFAULT NULL,
  `modified_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `mobile`, `user_type`, `status`, `date`, `modified_by`, `modified_date`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$9Ze6ze6M8YyG9Fd/TqvfoOZFT0Fyd1XDhpNoWGJ1Fjt79oo4V3v7u', '8101202074', 'admin', 1, '2023-07-17 15:03:27', 'amdin', '2023-09-01'),
(48, 'demo', 'demo@gmail.com', '$2y$10$jPnmKXknfu5jswsUIsNxdunSgcCDdZU8k238iJY1QXLT38D4RRpza', '8484848844', 'admin', 0, '2023-10-18 14:14:57', NULL, NULL),
(49, 'Dr. Aakash Deep', 'help@draakashdeep.com', '$2y$10$FsXqlGJgRvC7C.6H5MbE5uTHq85VM3G1m5ZuK.O5O/2dBw52yHUoi', '0000000000', 'admin', 1, '2023-12-04 12:23:46', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appt`
--
ALTER TABLE `appt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
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
-- AUTO_INCREMENT for table `appt`
--
ALTER TABLE `appt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
