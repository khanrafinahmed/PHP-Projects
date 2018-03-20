-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2018 at 10:16 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookworm1`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(100) NOT NULL,
  `book_cat` int(100) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_price` int(100) NOT NULL,
  `book_desc` text NOT NULL,
  `book_image` text NOT NULL,
  `book_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_cat`, `book_author`, `book_title`, `book_price`, `book_desc`, `book_image`, `book_keywords`) VALUES
(1, 1, '', 'Star Interior Designers', 422, '<p>An expansive collection of world-renowned interior designers in one volume. Guided by a clear conceptual direction, designers approach a room armed with aspects of various disciplines, including architecture, environmental psychology and decoration, and they apply a refined eye to the use of color, texture, lighting and furnishings. Using prestigious and stylistic vision, this book gives you not only an around-the-world tour to the best interior design projects but also it is an inspiring reference that gives you alternative advice.</p>', '9788499368566.jpg', 'Star Interior Designers'),
(2, 2, 'Jobs', 'I Steve', 1200, '<p>Steve Jobss</p>', '9789350292006.jpg', 'Jobs'),
(3, 2, 'Philippe Couperie-Eiffel', 'Eiffel by Eiffel', 1800, '<h4>Biography: historical, political &amp; military</h4>', 'image.php.jpg', ' Eiffel by Eiffel'),
(4, 3, 'Paulo Coelho', 'Alchemist', 800, '<p>asdadsasd</p>', '9780007435180.jpg', 'adsads'),
(5, 3, 'Jack London', 'Wild Campfire', 700, '<p>dasdasdas</p>', '9788190782982.jpg', 'Wild Campfire'),
(6, 4, 'Paulo Coelho', 'Alchemist', 500, '<p>dsadsad</p>', '9780007529483.jpg', 'dsadasd'),
(7, 5, 'Sir Arthur Conan Doyle   ', 'Sherlock Holmes', 2400, '<p>Present in this omnibus edition, are four unabridged novels of Baker Streets most famous resident-Sherlock Holmes and his confidant and aide, Dr. Watson. The saga of their adventures begin right from the time they are first introduced to each other by a certain \"young stamford\" to share rooms in Baker Street, where Watson chronicled their first adventure \'A Study in Scarlet. \'The Hound of Baskervilles is perhaps the most popular of his long stories, followed by \'The Sign of the Four and \'The Valley of Fear. </p>', '9788172240530.jpg', 'Sherlock Holmes'),
(8, 5, 'Charles Dickens', 'Hard Times', 1700, '<p>This particular edition of the book is part of the series, Orient BlackSwan Abridged Texts, which is a set of abridged classics each with a detailed introduction and also glossaries, chapter summaries and questions. These abridged versions are abridged for length only. No attempt has been made to modify or alter the language of the original. The work is therefore presented to the reader with the literary quality and flavour of the original intact. The abridgement is designed to help the reader move on to the full-length version with interest and confidence.</p>', '9788125039570.jpg', 'adsds'),
(9, 5, 'Thomas Hardy  ', 'Jude The Obscure', 1000, '<p>das</p>', '9781853262616.jpg', 'adsadsads'),
(10, 5, 'Oscar Wilde ', 'Short Stories', 1300, '<p><span class=\"bkdetails\">dsad<br /> </span></p>', '9789381438121.jpg', 'Oscar Wilde ');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `order_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Arts & Photography'),
(2, 'Biographies'),
(3, 'Graphic Novels'),
(4, 'Religion & Spirituality'),
(5, 'Literature & Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_name` text NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_city` varchar(255) NOT NULL,
  `customer_location` text NOT NULL,
  `customer_phone` int(11) NOT NULL,
  `customer_username` varchar(255) NOT NULL,
  `order_ids` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_name`, `customer_email`, `customer_city`, `customer_location`, `customer_phone`, `customer_username`, `order_ids`) VALUES
('Rafin', 'rafination@gmail.com', 'sad', 'adsasdasd', 124, 'rafin', 128),
('Rafin', 'rafination@gmail.com', 'sad', 'adsasdasd', 124, 'rafin', 129),
('Rafin', 'rafination@gmail.com', 'sad', 'adsasdasd', 124, 'rafin', 130);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `id`, `username`, `name`, `price`, `quantity`) VALUES
(139, 7, 'rafination', 'Sherlock Holmes', 2400, 1),
(140, 2, 'rafination', 'I Steve', 1200, 1),
(141, 2, 'rafination', 'I Steve', 1200, 1),
(142, 8, 'rafination', 'Hard Times', 1700, 1),
(143, 9, 'rafination', 'Jude The Obscure', 1000, 1),
(145, 7, 'rafination', 'Sherlock Holmes', 2400, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `admin`) VALUES
(3, 'rafin', '$2y$10$uLeLXDtHA8/9wdD/OicYe.cibxij6rF9kcpshYmDbGThN7ffDDNsa', '2018-03-19 15:16:29', 1),
(4, 'rafination', '$2y$10$JaiRWVBe7Jk26H3hNHjW9uEK1RdF2gkpJG84q04Od1VHhpTVDpWkK', '2018-03-19 15:16:51', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`order_ids`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
