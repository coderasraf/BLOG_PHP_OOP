-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 11:05 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

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
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(1, 'Java'),
(2, 'PHP'),
(3, 'HTML'),
(4, 'CSS'),
(5, 'BOOTSTRAP'),
(6, 'PYTHON'),
(12, 'PHPStrom');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(100) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `firstname`, `lastname`, `email`, `body`, `status`, `date`) VALUES
(3, 'Ashraf', 'Siddik', 'asraf@gmail.com', 'Hello, I am just testing!', 1, '2021-05-27 13:10:43'),
(8, 'Hass', 'Asraf', 'codingpro435@gmail.com', 'This is my another testing message', 1, '2021-05-27 13:10:43'),
(9, 'Hass', 'Asraf', 'codingpro435@gmail.com', 'This is my another testing message', 1, '2021-05-27 13:10:43'),
(10, 'Jhon', 'Cena', 'codingpro435@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.', 1, '2021-05-27 15:03:06'),
(11, 'Jhon', 'Cena', 'codingpro435@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.', 1, '2021-05-27 15:18:22'),
(12, 'Jhon', 'Cena', 'codingpro435@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.', 1, '2021-05-27 15:19:20'),
(13, 'Jhon', 'Cena', 'codingpro435@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.', 1, '2021-05-27 15:21:00'),
(14, 'Hass', 'Asraf', 'jasbrar585@gmail.com', 'Hello, This is me for email testing', 1, '2021-05-27 15:26:31'),
(17, 'Hass', 'Asraf', 'jasbrar585@gmail.com', 'Hello, This is me for email testing', 1, '2021-05-27 16:29:58'),
(18, 'Hass', 'Asraf', 'jasbrar585@gmail.com', 'Hello, This is me for email testing', 1, '2021-05-27 16:30:11'),
(22, 'Hass', 'Asraf', 'jasbrar585@gmail.com', 'Hello, This is me for email testing', 1, '2021-05-27 16:59:22'),
(28, 'Jamil', 'Ahmed', 'jamil535@gmail.com', 'Hi, this is jamil hasan', 1, '2021-05-27 17:28:04'),
(29, 'Jamil', 'Ahmed', 'jamil535@gmail.com', 'Hi, this is jamil hasan', 1, '2021-05-27 17:30:58'),
(31, 'Jamil', 'Ahmed', 'jamil535@gmail.com', 'Hi, this is jamil hasan', 1, '2021-05-27 17:31:08'),
(34, 'Ashraf', 'Siddik', 'hassasraf@gmail.com', 'Hello this is a test message from blog admin', 1, '2021-05-28 05:54:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE `tbl_footer` (
  `id` int(100) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `note`) VALUES
(1, 'Copyright Hass Asraf 2020 -');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `title`, `body`) VALUES
(4, 'Web Design', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(10) NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `tags` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `title`, `body`, `image`, `author`, `tags`, `date`) VALUES
(25, 1, 'Expert Full Stack Developer', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>', 'uploads/7602c717e7cf848.jpg', 'Ashraf Siddik', 'bootstrap', '2021-05-12 18:00:00'),
(27, 3, 'Shopify Expert updated', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est corrupti, voluptatem! Fugit porro nisi vitae, magnam officia voluptates aliquam non minus, fugiat expedita, sapiente delectus omnis laborum libero voluptatibus molestiae! Alias distinctio dolorem earum. Accusantium, perspiciatis. Ut corporis autem eum, debitis et cum velit. Voluptatum illum necessitatibus veritatis ea numquam quis pariatur officia iusto recusandae nobis! Obcaecati iste laboriosam voluptates.</p>', 'uploads/50666bc9a9f5855.png', 'Hass Asraf', 'Bootstrap, psd to html, web design, web design tutorial', '2021-05-04 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(100) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `tw` varchar(255) NOT NULL,
  `ln` varchar(255) NOT NULL,
  `gp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `fb`, `tw`, `ln`, `gp`) VALUES
(1, 'http://www.facebook.com/hass.asraf', 'http://www.twitter.com/hass.asraf', 'http://www.linkedin.com/hass.asraf', 'http://www.googleplus.com/hass.asraf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `roloe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`, `email`, `details`, `roloe`) VALUES
(1, 'Ashraf Siddik', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'hassasraf@gmail.com', '<p>I am ashraf Siddik</p>', 0),
(9, '', 'hassasraf', '21232f297a57a5a743894a0e4a801fc3', '', '', 1),
(10, '', 'Hanif', '72e74f574535bdc82cf4b99f8fc064e1', '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

CREATE TABLE `title_slogan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'Don Samdani', 'Your best online tutorial', 'uploads/7ef5265e0e8dd07.png');

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
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_slogan`
--
ALTER TABLE `title_slogan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `title_slogan`
--
ALTER TABLE `title_slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
