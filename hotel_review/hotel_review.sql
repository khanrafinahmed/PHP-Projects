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
-- Database: `hotel_review`
--

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
(1, 'Bandarban'),
(2, 'Cox\'s Bazar'),
(3, 'Sylhet'),
(4, 'Dhaka'),
(5, 'Chittagong');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(11) NOT NULL,
  `uid` varchar(128) NOT NULL,
  `date` datetime NOT NULL,
  `message` text NOT NULL,
  `h_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `uid`, `date`, `message`, `h_id`) VALUES
(47, 'rafination', '2018-02-19 17:19:30', 'hey', 13),
(48, 'rafination', '2018-02-19 17:33:44', 'cool, man', 13),
(49, 'rafination', '2018-02-19 17:34:23', 'yo', 14),
(50, 'rafin', '2018-02-19 20:08:05', 'hoooo', 13),
(51, 'rafin', '2018-02-19 20:08:05', 'hoooo', 13),
(52, 'rafin', '2018-02-19 20:08:05', 'hoooo', 13),
(59, 'rafin', '2018-02-19 20:38:31', 'this is bad', 15),
(60, 'rafin', '2018-02-19 20:39:07', 'not cool bro', 13);

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(100) NOT NULL,
  `hotel_cat` int(100) NOT NULL,
  `hotel_title` varchar(255) NOT NULL,
  `hotel_price` int(100) NOT NULL,
  `hotel_desc` text NOT NULL,
  `hotel_image` text NOT NULL,
  `hotel_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `hotel_cat`, `hotel_title`, `hotel_price`, `hotel_desc`, `hotel_image`, `hotel_keywords`) VALUES
(13, 2, 'Sayeman Beach Resort', 1233, '<p>This property is 10 minutes walk from the beach. Royal Beach Resort is located in Cox\'s Bazar and has a garden and restaurant. With free WiFi, this 3-star hotel offers a 24-hour front desk. The accommodation offers a business centre, and buying tickets for guests.\r\n\r\nAll guest rooms in the hotel are fitted with a flat-screen TV. Rooms are complete with a private bathroom, the units at Royal Beach Resort are equipped with air conditioning, and some rooms will provide you with a balcony. All rooms will provide guests with a fridge.\r\n\r\nA continental breakfast can be enjoyed at the property.\r\n\r\nWe speak your language! </p>', 'Sayeman-Beach-Resort-Coxs-Bazar.jpg', 'ads'),
(14, 4, 'Radisson Blu', 12333, '<p> Get the celebrity treatment with world-class service at Radisson blu Dhaka Water Garden\r\n\r\nOffering an outdoor pool and a spa and wellness centre, Radisson Blu Water Garden Hotel Dhaka offers free Wi-Fi access throughout the property.\r\n\r\nRooms here will provide you with air conditioning, a minibar and a TV with satellite channels. There is also an electric kettle. Featuring a shower, private bathrooms also come with a hairdryer and free toiletries. Extras include a safety deposit box and ironing facilities.\r\n\r\nAt Radisson Blu Water Garden Hotel Dhaka you will find a restaurant and a fitness centre. Other facilities offered include meeting facilities, a tour desk and luggage storage.\r\n\r\nThe Hazrat Sha Jalal International Airport is 5 km away. The property offers free parking. The property is also 15 km from the National Memorium.\r\n\r\n4 dining options are on offer including Water Garden Brasserie which is an all day diner, Sublime which serves local cuisine, Spice & Rice dishes out Mediterranean fare and Chit Chat which specialises in snacks and pastries. 2 bars are also present on property.\r\n\r\nThis property also has one of the best-rated locations in Dhaka! Guests are happier about it compared to other properties in the area.\r\n\r\nCouples particularly like the location — they rated it 8.0 for a two-person trip.\r\n\r\nWe speak your language! </p>', 'Rad.jpg', 'ads'),
(15, 3, 'Hotel Valley Garden', 123132, '<p>Featuring a fitness centre and a restaurant, Hotel Noorjahan Grand is situated in Sylhet. This 4-star hotel offers a 24-hour front desk, an ATM and free WiFi. The accommodation offers airport transfers, while a car rental service is also available.\r\n\r\nAll guest rooms at the hotel are fitted with a seating area and a flat-screen TV with satellite channels. Each room comes with a private bathroom. All units feature a desk.</p>', '21853482.jpg', 'adsads'),
(16, 4, 'Executive Inn', 123, '<p>Executive Inn features a terrace and a restaurant in Dhaka. This property is set a short distance from attractions such as Embassy of the Netherlands. The accommodation features a 24-hour front desk as well as free WiFi throughout the property.</p>\r\n<p>At the hotel, each room has a desk. Every room is equipped with a private bathroom with a hot tub, free toiletries and a hair dryer. The rooms are equipped with a seating area and a flat-screen TV with satellite channels.</p>\r\n<p>A buffet breakfast is available every morning at the property.</p>\r\n<p>Embassy of Spain is a 3-minute walk from Hotel Executive Inn.</p>', '116615974.jpg', 'Executive Inn'),
(17, 1, 'Hotel Night Heaven', 3123, '<p>Hotel Night Heaven features accommodation in BÄndarban. Boasting a 24-hour front desk, this property also provides guests with a restaurant.</p>\r\n<p>The rooms at the hotel are fitted with a seating area and a TV.</p>\r\n<p>Chittagong is 45 km from Hotel Night Heaven. </p>\r\n<p class=\"hp-desc-we-speak\">We speak your language!</p>', '130852789.jpg', 'Hotel Night Heaven'),
(18, 5, 'Hotel Agrabad', 213, '<p>Featuring an all year outdoor swimming pool, Aqua Blu, the 4-star Hotel Agrabad also boasts a well-equipped gym and a bar with live band performances. Agrabad Thai Spa offers sauna, spa bath, foot massage, head, scalp and full body massage.</p>\r\n<p>Air-conditioned rooms are equipped with a flat-screen TV, minibar and personal safe. En suite bathrooms come with a shower.</p>\r\n<p>Hotel Agrabad is a 10-minute walk from downtown Chittagong and 5 km from the Main Sea Port. Shah Amanat International Airport is 20 km away.</p>\r\n<p>Guests can enjoy sheesha (flavoured tobacco) and Arabic tea at the relaxing Sheesha Lounge, next to the pool. The hotel also provides billiard tables and a tour desk.</p>\r\n<p>Cinnamon Restaurant serves Continental, while Oasis is a stylish Middle-Eastern style lounge and Pan- Asian for Chinese, Thai, Malay and Indian cuisine. Liquid Bar &amp; Lounge serves alcoholic beverages. </p>\r\n<p class=\"hp-desc-review-highlight\">This property is also rated for the best value in Chittagong! Guests are getting more for their money when compared to other properties in this city.</p>\r\n<p class=\"hp-desc-we-speak\">We speak your language!</p>', '95991134.jpg', 'Hotel Agrabad'),
(20, 4, 'Hotel Bengal Inn', 132, '<p>Offering a restaurant and a fitness centre, Hotel Bengal Inn is located in Dhaka. Free WiFi access is available. The Dhaka Cantonment Railway Station is just 3 km away.</p>\r\n<p>Each room here will provide you with a TV, air conditioning and a hot tub. Featuring a bath or shower, private bathroom also comes with a hairdryer and bathrobes. Extras include a minibar, a seating area and satellite channels.</p>\r\n<p>At Hotel Bengal Inn you will find a 24-hour front desk and a terrace. Other facilities offered at the property include meeting facilities, a shared lounge and a tour desk. The property offers free parking.</p>\r\n<p>The Gulshan Banani Lake is barely 500 m away, National Parliament is 5 km and the National Museum is 6 km away. The Gulshan Bus Station is just 100 m away and the Shah Jalal International Airport is 7 km away.</p>', '133317679.jpg', 'Hotel Bengal Inn'),
(21, 1, 'The Olives', 32, '<p>Offering an outdoor pool, spa and fitness centre, TThe Olives is situated with in Gulshan diplomatic zone, 700 m from High Commission of India in Dhaka. Guests can enjoy the 24 hours on-site restaurant. Free WiFi is offered throughout the property and free private parking is available on site.</p>\r\n<p>All rooms are equipped with a flat-screen TV. Certain rooms include a seating area for your convenience. Some units have views of the lake or pool. The rooms come with a private bathroom. Extras include free toiletries and a hairdryer.</p>\r\n<p>You will find a 24-hour front desk at the property.</p>\r\n<p>You can play table tennis at this hotel, and car hire is available. Consulate of Singapore is 700 m from The Olives, while Embassy of Qatar is 900 m from the property. The nearest airport is Shah Jalal International Airport, 7 km from the property.</p>', '132186864.jpg', 'The Olives');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_ratings`
--

CREATE TABLE `hotel_ratings` (
  `id` int(11) NOT NULL,
  `hotel` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `username` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_ratings`
--

INSERT INTO `hotel_ratings` (`id`, `hotel`, `rating`, `username`) VALUES
(113, 13, 3, 'rafin'),
(115, 14, 4, 'rafin'),
(118, 15, 2, 'rafin'),
(119, 15, 2, 'rafination'),
(120, 14, 2, 'rafination'),
(121, 20, 3, 'rafin'),
(123, 17, 4, 'rafin');

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
(1, 'rafin', '$2y$10$EZ3.LniXZ9EkleMac3DWBO6JxPZvfu2duFR39FONb1.0EtuAHsVnK', '2017-12-04 06:02:49', 1),
(2, 'rafination', '$2y$10$yWcPF2yDyDP.AX5JPviwrOruMTLYv0puO0INcdzA6MajPhWBtiHUu', '2018-02-12 17:40:38', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `hotel_ratings`
--
ALTER TABLE `hotel_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `hotel_ratings`
--
ALTER TABLE `hotel_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
