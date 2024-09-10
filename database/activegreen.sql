-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2024 at 06:26 AM
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
-- Database: `activegreen`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `start_year` varchar(255) DEFAULT NULL,
  `about_highlight` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `about_description` text DEFAULT NULL,
  `phone_1` varchar(255) DEFAULT NULL,
  `phone_2` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `full_address` varchar(255) DEFAULT NULL,
  `telegram` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `wechat` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `tripadvisor` varchar(255) DEFAULT NULL,
  `google` varchar(255) DEFAULT NULL,
  `about_image` varchar(255) DEFAULT NULL,
  `sticky_banner_home` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `sp_image` varchar(255) DEFAULT NULL,
  `sp_name` varchar(255) DEFAULT NULL,
  `sp_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `company_name`, `start_year`, `about_highlight`, `short_description`, `about_description`, `phone_1`, `phone_2`, `email_address`, `full_address`, `telegram`, `whatsapp`, `wechat`, `facebook`, `instagram`, `linkedin`, `tiktok`, `tripadvisor`, `google`, `about_image`, `sticky_banner_home`, `logo`, `favicon`, `sp_image`, `sp_name`, `sp_description`) VALUES
(1, 'Active Green Quad Bikes', '2022', 'Village & Sunset', 'Discover the essence of rural Cambodian life as you navigate through charming villages, interact with friendly locals, and witness the serene beauty of the countryside.', '<p>ACTIVE GREEN QUAD BIKE is providing authentic countryside insight transport by Quad Bike Adventures with English speaking guide for road leading the direction on a motorcycle to discover village or sunset tour by riding in a normal pace through countryside via one of the country most scenic drives filled with beautiful and green view of the rice fields, traditional KHMER’s houses, Water Buffalo and enjoy the nature sightseeing of villager’s activities also the smiling of Cambodian children along the way. Then head through the homes of farmers and the Pagoda/Monastery. <br><br>All tours include a pick up and drop off service to customer’s hotel (inside the city of Siem Reap only). All tours depart from the premises of ACTIVE GREEN QUAD BIKE.</p>', '+85512 388 797', '+85512 388 797', 'activegreenquadbike@gmail.com', '127, Siem Reap, Cambodia', 'kschantha', '+85512 388 797', '+85512 388 797', '#', '#', '#', '#', '#', '#', 'active_green_quad_bike_202408311213565943.jpg', 'active_green_quad_bike_202409051103406669.jpg', 'logo.png', 'favicon.ico', 'active_green_quad_bike_202408311018109490.jpg', 'Quad Bike Tours', 'Explore Siem Reap\'s countryside on our Quad Bike Tours. Ride through villages, rice paddies, and serene landscapes. Interact with locals and witness stunning sunsets for an unforgettable adventure.');

-- --------------------------------------------------------

--
-- Table structure for table `services_and_programs`
--

CREATE TABLE `services_and_programs` (
  `sp_id` int(11) NOT NULL,
  `category_list` varchar(255) DEFAULT NULL,
  `sp_name` varchar(255) DEFAULT NULL,
  `sp_sub_name` varchar(255) DEFAULT NULL,
  `sp_price` varchar(255) DEFAULT NULL,
  `sp_departure_time` varchar(255) DEFAULT NULL,
  `sp_short_description` text DEFAULT NULL,
  `sp_description` text DEFAULT NULL,
  `sp_inclusion` text DEFAULT NULL,
  `sp_notes` text DEFAULT NULL,
  `sp_banner` varchar(255) DEFAULT NULL,
  `sp_gallery_image_path` varchar(255) DEFAULT NULL,
  `is_featured` varchar(3) DEFAULT NULL,
  `book_url` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services_and_programs`
--

INSERT INTO `services_and_programs` (`sp_id`, `category_list`, `sp_name`, `sp_sub_name`, `sp_price`, `sp_departure_time`, `sp_short_description`, `sp_description`, `sp_inclusion`, `sp_notes`, `sp_banner`, `sp_gallery_image_path`, `is_featured`, `book_url`) VALUES
(1, 'Service', 'Sunset BBQ1', 'By the rice field', '<p>US$ 55/ 1 Quad/1 Person</p>', '<p>From 4:15pm till 6:30pm</p>', '001 Experience a unique Sunset BBQ in the heart of rice fields. Delight in a delicious BBQ as the sun sets, creating a magical ambiance over the serene landscape.', '<p>Riding the road less traveled in rural villages and communities then visit villager&rsquo;s daily vegetable farming activities, Cambodian Buddhism monastery and see daily living life of farmers living in the village, a visit to the rice paddy field and continue Quad Bike drive to see the stunning sunset where BBQ arrangement has been awaited for. Enjoying a stunning view of Sunset and having a set of Cambodian BBQ at the rice field.</p>', '<ul>\r\n<li>Experience Village Tour by Quad Bike</li>\r\n<li>Sliced Beef</li>\r\n<li>Sliced Pork</li>\r\n<li>Bok Choy</li>\r\n<li>Endive</li>\r\n<li>Carrot</li>\r\n<li>Onion</li>\r\n<li>Green Bell Pepper</li>\r\n<li>ENOKITAKE Mushroom</li>\r\n<li>Drinking Water</li>\r\n<li>Fresh Coconut Juice</li>\r\n<li>1 Big Bottle of Angkor Beer (Free bottle of beer is based on number of person)</li>\r\n</ul>', '<ul>\r\n<li>One day advance booking is required for smooth preparation</li>\r\n<li>Extra drink request can be noted in advance with your booking if any inquiry</li>\r\n</ul>', 'active_green_quad_bike_202409061050335982.jpg', 'sp_1', 'No', 'https://google.com'),
(2, 'Service', 'Sunset Cocktail', 'By the rice field', 'US$ 55/ 1 Quad/1 Person', 'From 4:15pm till 6:30pm', 'Sip on a Sunset Cocktail amid serene rice fields. Enjoy the tranquil beauty as the sun sets, casting a golden glow over the lush landscape', 'Riding the road less traveled in rural villages and communities then visit villager’s daily vegetable farming activities, Cambodian Buddhism monastery and see daily living life of farmers living in the village, a visit to the rice paddy field and continue Quad Bike drive to see the stunning sunset where BBQ arrangement has been awaited for.\r\n\r\nEnjoying a stunning view of Sunset and having a set of Cambodian BBQ at the rice field.', '<ul><li>Experience Village Tour by Quad Bike</li><li>Sliced Beef</li><li>Sliced Pork</li><li>Bok Choy</li><li>Endive</li><li>Carrot</li><li>Onion</li><li>Green Bell Pepper</li><li>ENOKITAKE Mushroom</li><li>Drinking Water</li><li>Fresh Coconut Juice</li><li>1 Big Bottle of Angkor Beer (Free bottle of beer is based on number of person)</li></ul>', '<ul><li>One day advance booking is required for smooth preparation</li><li>Extra drink request can be noted in advance with your booking if any inquiry</li></ul>', '', 'sp_2', 'Yes', NULL),
(3, 'Service', 'TukTuk Tours', 'By the rice field', 'US$ 55/ 1 Quad/1 Person', 'From 4:15pm till 6:30pm', 'Riding to the road less traveled in rural villages to explore activities of the communities, and stop at some selecting spots for break and photo.', 'Riding the road less traveled in rural villages and communities then visit villager’s daily vegetable farming activities, Cambodian Buddhism monastery and see daily living life of farmers living in the village, a visit to the rice paddy field and continue Quad Bike drive to see the stunning sunset where BBQ arrangement has been awaited for.\r\n\r\nEnjoying a stunning view of Sunset and having a set of Cambodian BBQ at the rice field.', '<ul><li>Experience Village Tour by Quad Bike</li><li>Sliced Beef</li><li>Sliced Pork</li><li>Bok Choy</li><li>Endive</li><li>Carrot</li><li>Onion</li><li>Green Bell Pepper</li><li>ENOKITAKE Mushroom</li><li>Drinking Water</li><li>Fresh Coconut Juice</li><li>1 Big Bottle of Angkor Beer (Free bottle of beer is based on number of person)</li></ul>', '<ul><li>One day advance booking is required for smooth preparation</li><li>Extra drink request can be noted in advance with your booking if any inquiry</li></ul>', '', 'sp_3', 'Yes', NULL),
(4, 'Program', 'TukTuk Tours', 'By the rice field', '<ul>\r\n<li>$35 for 1 Adult / 1 Quad Bike</li>\r\n<li>$45 for 2 Adult / 1 Quad Bike</li>\r\n<li>$60 for 2 Adult / 1 Quad Bike for each</li>\r\n</ul>', '<ul>\r\n<li>8:00 AM</li>\r\n<li>10:00 AM</li>\r\n<li>04:00 PM</li>\r\n</ul>', 'Riding to the road less traveled in rural villages to explore activities of the communities, and stop at some selecting spots for break and photo.', '<p>Sunset tour by Quad Bike is riding at a normal pace through the countryside via one of the country&rsquo;s most scenic drives filled with beautiful and green views of the rice fields, traditional KHMER houses, and Water Buffalo, and enjoy the nature sightseeing of villagers&rsquo; activities also the smiling of Cambodian children along the way.Then, head through the homes of farmers to visit PRASAT CHEDEI, located in the southeast of Siem Reap City, Cambodia. At the Pagoda/Monastery of the same name.</p>\r\n<p>A strikingly beautiful view of the rice fields and villages under the clear blue sky turns gold and yellow at dawn and in dust. An unforgettable and unbeatable view of sunset in the countryside behind the villages. Back to the departure point in a different way.<br>Please arrive 15 minutes before the trip schedule to our starting point; then, our guide will give you safe driving instructions on how to drive the quad bike and will do a short training session for beginners to use the quad bike before departure.</p>', '<ul>\r\n<li>Experience Village Tour by Quad Bike</li>\r\n<li>Sliced Beef</li>\r\n<li>Sliced Pork</li>\r\n<li>Bok Choy</li>\r\n<li>Endive</li>\r\n<li>Carrot</li>\r\n<li>Onion</li>\r\n<li>Green Bell Pepper</li>\r\n<li>ENOKITAKE Mushroom</li>\r\n<li>Drinking Water</li>\r\n<li>Fresh Coconut Juice</li>\r\n<li>1 Big Bottle of Angkor Beer (Free bottle of beer is based on number of person)</li>\r\n</ul>', '<ul>\r\n<li>One day advance booking is required for smooth preparation</li>\r\n<li>Extra drink request can be noted in advance with your booking if any inquiry</li>\r\n</ul>', 'active_green_quad_bike_202409061110034287.jpg', 'sp_4', 'Yes', ''),
(5, 'Program', 'Adventure 2 Hours', 'By the rice field', 'US$ 55/ 1 Quad/1 Person', 'From 4:15pm till 6:30pm', 'Riding to the road less traveled in rural villages to explore activities of the communities, and stop at some selecting spots for break and photo.', 'Riding the road less traveled in rural villages and communities then visit villager’s daily vegetable farming activities, Cambodian Buddhism monastery and see daily living life of farmers living in the village, a visit to the rice paddy field and continue Quad Bike drive to see the stunning sunset where BBQ arrangement has been awaited for.\r\n\r\nEnjoying a stunning view of Sunset and having a set of Cambodian BBQ at the rice field.', '<ul><li>Experience Village Tour by Quad Bike</li><li>Sliced Beef</li><li>Sliced Pork</li><li>Bok Choy</li><li>Endive</li><li>Carrot</li><li>Onion</li><li>Green Bell Pepper</li><li>ENOKITAKE Mushroom</li><li>Drinking Water</li><li>Fresh Coconut Juice</li><li>1 Big Bottle of Angkor Beer (Free bottle of beer is based on number of person)</li></ul>', '<ul><li>One day advance booking is required for smooth preparation</li><li>Extra drink request can be noted in advance with your booking if any inquiry</li></ul>', 'active_green_quad_bike_202409061111222683.jpg', 'sp_5', 'Yes', NULL),
(6, 'Program', 'Adventure 3 Hours', 'By the rice field', 'US$ 55/ 1 Quad/1 Person', 'From 4:15pm till 6:30pm', 'Riding to the road less traveled in rural villages to explore activities of the communities, and stop at some selecting spots for break and photo.', 'Riding the road less traveled in rural villages and communities then visit villager’s daily vegetable farming activities, Cambodian Buddhism monastery and see daily living life of farmers living in the village, a visit to the rice paddy field and continue Quad Bike drive to see the stunning sunset where BBQ arrangement has been awaited for.\r\n\r\nEnjoying a stunning view of Sunset and having a set of Cambodian BBQ at the rice field.', '<ul><li>Experience Village Tour by Quad Bike</li><li>Sliced Beef</li><li>Sliced Pork</li><li>Bok Choy</li><li>Endive</li><li>Carrot</li><li>Onion</li><li>Green Bell Pepper</li><li>ENOKITAKE Mushroom</li><li>Drinking Water</li><li>Fresh Coconut Juice</li><li>1 Big Bottle of Angkor Beer (Free bottle of beer is based on number of person)</li></ul>', '<ul><li>One day advance booking is required for smooth preparation</li><li>Extra drink request can be noted in advance with your booking if any inquiry</li></ul>', '', 'sp_6', 'Yes', NULL),
(7, 'Program', 'Adventure 4 Hours', 'Village & Sunset Tours', 'US$ 55/ 1 Quad/1 Person', 'From 4:15pm till 6:30pm', 'Riding to the road less traveled in rural villages to explore activities of the communities, and stop at some selecting spots for break and photo.', 'Riding the road less traveled in rural villages and communities then visit villager’s daily vegetable farming activities, Cambodian Buddhism monastery and see daily living life of farmers living in the village, a visit to the rice paddy field and continue Quad Bike drive to see the stunning sunset where BBQ arrangement has been awaited for.\r\n\r\nEnjoying a stunning view of Sunset and having a set of Cambodian BBQ at the rice field.', '<ul><li>Experience Village Tour by Quad Bike</li><li>Sliced Beef</li><li>Sliced Pork</li><li>Bok Choy</li><li>Endive</li><li>Carrot</li><li>Onion</li><li>Green Bell Pepper</li><li>ENOKITAKE Mushroom</li><li>Drinking Water</li><li>Fresh Coconut Juice</li><li>1 Big Bottle of Angkor Beer (Free bottle of beer is based on number of person)</li></ul>', '<ul><li>One day advance booking is required for smooth preparation</li><li>Extra drink request can be noted in advance with your booking if any inquiry</li></ul>', '', 'sp_7', 'Yes', NULL),
(13, 'Service', 'TEST2', 'asdfadsf', '<p>asdfasdfs</p>', '<p>asdfasdf</p>', 'asdfasd', '<p>sdfasd</p>', '<p>sdfas</p>', '<p>asdfasd</p>', NULL, 'sp_13', 'No', '#'),
(14, 'Services', 'Sunset BBQ', 'By the rice field', '<p>US$ 55/ 1 Quad/1 Person</p>', '<p>From 4:15pm till 6:30pm</p>', 'Experience a unique Sunset BBQ in the heart of rice fields. Delight in a delicious BBQ as the sun sets, creating a magical ambiance over the serene landscape.', '<p>Riding the road less traveled in rural villages and communities then visit villager&rsquo;s daily vegetable farming activities, Cambodian Buddhism monastery and see daily living life of farmers living in the village, a visit to the rice paddy field and continue Quad Bike drive to see the stunning sunset where BBQ arrangement has been awaited for. Enjoying a stunning view of Sunset and having a set of Cambodian BBQ at the rice field.</p>', '<ul>\r\n<li>Experience Village Tour by Quad Bike</li>\r\n<li>Sliced Beef</li>\r\n<li>Sliced Pork</li>\r\n<li>Bok Choy</li>\r\n<li>Endive</li>\r\n<li>Carrot</li>\r\n<li>Onion</li>\r\n<li>Green Bell Pepper</li>\r\n<li>ENOKITAKE Mushroom</li>\r\n<li>Drinking Water</li>\r\n<li>Fresh Coconut Juice</li>\r\n<li>1 Big Bottle of Angkor Beer (Free bottle of beer is based on number of person)</li>\r\n</ul>', '<ul>\r\n<li>One day advance booking is required for smooth preparation</li>\r\n<li>Extra drink request can be noted in advance with your booking if any inquiry</li>\r\n</ul>', '', 'sp_14', 'Yes', ''),
(15, 'Program', 'Program1', '', '', '', '', '', '', '', 'active_green_quad_bike_202409060857113457.jpg', 'sp_15', 'No', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `user_email`, `user_password`) VALUES
(1, 'Hem Chantra', 'admin@gmail.com', '6fb42da0e32e07b61c9f0251fe627a9c'),
(7, 'KS Chantra', 'activegreenquadbike@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `services_and_programs`
--
ALTER TABLE `services_and_programs`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services_and_programs`
--
ALTER TABLE `services_and_programs`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
