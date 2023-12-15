-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2022 at 10:28 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ohs`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dep_id` int(1) NOT NULL,
  `dep_name` varchar(20) NOT NULL,
  `dep_img` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_id`, `dep_name`, `dep_img`) VALUES
(1, 'Furniture ', '../Images/Home/Department/1.png'),
(2, 'Bedding&Bath', '../Images/Home/Department/2.png'),
(3, 'Appliances', '../Images/Home/Department/3.png'),
(4, 'Lighting', '../Images/Home/Department/4.png'),
(5, 'Decor&Pillows', '../Images/Home/Department/5.png'),
(6, 'Kitchen', '../Images/Home/Department/6.png');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(3) NOT NULL,
  `order_add` varchar(20) NULL,
  `order_finaltotal` int(10) NULL,
  `user_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `orderitem_id` int(3) NOT NULL,
  `orderitem_quantity` int(3) NOT NULL,
  `orderitemq_price` int(7) NOT NULL,
  `product_id` int(3) NOT NULL,
  `order_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(3) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` float(8) NOT NULL,
  `product_img` varchar(300) NOT NULL,
  `product_desc` varchar(500) NOT NULL,
  `product_bestseller` int(1) NOT NULL,
  `product_arrival` int(1) NOT NULL,
  `product_featured` int(1) NOT NULL,
  `dep_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_img`, `product_desc`, `product_bestseller`, `product_arrival`, `product_featured`, `dep_id`) VALUES
(1, 'Modern Cheval Mirror', 65, '../Images/Home/Arrivals/arrivals1.png', 'Add a touch of traditional farmhouse style to your entryway or master bedroom with this classic mirror. Its frame features two angled legs for a classic look and a versatile solid finish that works well with your current color scheme. The framed mirror in the center offers a square silhouette and can tilt to your desired angle to help you check out your look before you walk out the door. This freestanding mirror is a stylish addition no matter where you place it. Assembly required.\r\n\r\n', 0, 1, 0, 5),
(2, '5.3 Liter Digital Air Fryer', 120, '../Images/Home/Arrivals/arrivals2.png', 'With digital air fryer, you can cook food with little to no oil, yet enjoy crispy, evenly browned food. In addition to its expert air-frying abilities, the multi-functional hamilton beach digital air fryer also roasts, bakes and reheats a wide variety of food, from frozen fries and chicken pieces to fresh vegetables. The air fryer is equipped with high power to evenly circulate heated air around the food, so it cooks faster than a traditional or toaster oven.', 0, 1, 0, 3),
(3, 'Food Storage Set', 45, '../Images/Home/Arrivals/arrivals3.png', 'Storage set: 1-cup round bowl 4.2\" diameter 2.01\" height, 6-cup rectangle bowl 8.63\" length 6.63\" width 2.25\" height, 7-cup round bowl 7.25\" diameter 3.25\" height, 2-cup round bowl 5.29\" diameter 2.36\" height, 4-cup round bowl 5.88\" diameter 2.88\" height and 3-cup rectangle bowl 7.38\" length 5.5\" width 1.75\" height.', 0, 1, 0, 6),
(5, 'Laurie 2 - Light 14.75\'\' Drum', 220, '../Images/Home/Arrivals/arrivals5.png', 'Lend your home a little extra brightness and style with this semi-flush mount pendant light. Inspired by Hollywood glamour and French countryside designs, this fixture features a drum shade crafted from metal with a bronze finish and is accented by carved crystals for an eye-catching look with plenty of glam appeal.', 0, 1, 0, 4),
(6, '6 Piece 100% Cotton Towel Set\r\n', 25, '../Images/Home/Arrivals/arrivals6.png', 'Pamper yourself with the luxurious weight of 600gsm towels and washcloths when you use these cotton towels. These two-ply towels are highly absorbent to quickly dry your hands or body, with a thick, spa-like texture.\r\n', 0, 1, 0, 2),
(7, 'W Steel Outdoor Fire Pit With Lid', 65, '../Images/Home/Arrivals/arrivals7.png', 'Upgrades 22-inch fire pit perfect to fit many people around for a bonfire in the patio, yard, or garden. It comes with a mesh lid to prevent burning embers from blowing and a poker to stoke fire and remove the mesh lid safely. This unique design fire pit makes it an ideal choice for heating, barbecue, and food in the patio, garden, and yard.\r\n', 0, 1, 0, 5),
(8, 'Cuthbertson Cotton Throw\r\n', 30, '../Images/Home/Arrivals/arrivals8.png', 'Not just for staying warm or getting cozy, a simple throw can instantly change the look of a room. Helloooo, Insta-worthy space in half the time. Handmade in India from 100% cotton, this trendy throw was created using a woven technique. It sports a classic two-tone polka dot pattern with textured details and adorable fringe. And, since it comes with an array of color options, it\'s even easier to find the perfect fit for you and your space.\r\n\r\n', 0, 1, 0, 5),
(10, 'Stand Mixer', 100, '../Images/Home/Featured/f2.png', 'Whether you need 9 dozen of your signature chocolate chips cookies or shredded chicken for Taco Tuesday with friends and family, the KitchenAid Artisan Series 5 Quart Tilt-Head Stand Mixer has the capacity for every occasion. This durable tilt-head stand mixer was built to last, and features 10 speeds to gently knead, thoroughly mix and whip ingredients for a wide variety of recipes and comes in over 20 colors to perfectly match your kitchen design or personality.', 0, 0, 1, 6),
(12, '100% Cotton Towel Set', 20, '../Images/Home/Featured/f5.png', 'Decorating your bathroom space has never been easier with our beautiful design. Crafted from premium Cotton, each bath, hand, and face towel in this bundle boasts a medium towel weight making each towel thick and ultra-soft to help get you dry quickly.', 0, 0, 1, 2),
(13, 'Black Desk Lamp Set ', 80, '../Images/Home/Featured/f4.png', 'Add an element of simple modern style to your living room, bedroom, or home office with this set of 2 desk lamps. We love displaying these lamps separately or together on either side of a sofa or bed. Each is made of metal in a black finish with a square base plate and a slim body.', 0, 0, 1, 4),
(14, '13 Piece Aluminum Non Stick Cookware Set', 100, '../Images/Home/Featured/f6.png', 'This 13-piece nonstick cookware set features best-selling pots and pans and includes the essentials for those starting out or outfitting a new home. Now 4x stronger, these toughened nonstick pro nonstick pans deliver superior results and the everyday ease of use for everything from searing fish to sauteing vegetables and making omelets.', 0, 0, 1, 6),
(15, 'Gillies 4 - Person Dining Set\r\n', 150, '../Images/Home/Slider/slider1.png', 'This 5-piece dining set adds a sleek yet traditional look to your dining room with its clean lines and two-tone appearance. It includes a dining table and four side chairs, all pieces crafted from solid and engineered wood. Rich neutral tones complement a variety of styles and colors schemes.', 1, 0, 0, 1),
(16, '5 Piece Kitchen Package', 3000, '../Images/Home/Slider/slider2.png', 'Range: 36\" 6.0 cu ft. Freestanding Gas Range\nRange Hood: 36\" 380 CFM Convertible Wall Mount\nRange Hood Refrigerator: 22.5 cu. ft. Energy Star French Door Refrigerator\nDishwasher: 24\" 45 dBA Built-in Fully Integrated Dishwasher\nWine Cooler: 48 Bottle Single Zone Freestanding Wine Refrigerator', 1, 0, 0, 3),
(17, 'Wide Modular Sofa\r\n', 400, '../Images/Home/Slider/slider3.png', 'This modular sectional seats six with ease. It has a solid and engineered wood frame, foam-filled cushions, and linen blend upholstery. The 6-piece set includes five sofa seats and a chaise. It’s configurable to be U-shaped, L-shaped, one large rectangular platform, or any other setup that suits your space and needs. ', 1, 0, 0, 1),
(18, 'Wide Linen Reversible Modular Sofa', 500, '../Images/Home/Arrivals/arrivals4.png', 'This reversible modular sofa and chaise sectional seats up to 7, so it\'s just right for big families or throwing a party. The frame is made from engineered wood and sits on straight black-finished legs. This lounge set has both a reversible and modular design that allows you to tailor your living room or den to your liking.', 0, 1, 0, 1),
(21, 'Tall End Table', 80, '../Images/Home/Featured/f3.png', 'An approachable contemporary take on a minimalist mid-century modern design, this wood end table lends curated appeal to any seating ensemble. Crafted of solid rubberwood with faux wood overlays, in a light oak finish. Its simple circular tabletop offers a perfect platform for framed photos, a bouquet of blooming flowers, or a slender table lamp, while three tapered round legs provide stylish support.', 0, 0, 1, 1),
(22, 'Slide Chair', 80, '../Images/Home/Featured/f1.png', 'Chair', 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(3) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_pw` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_add` varchar(20) NOT NULL,
  `user_type` char(1) NOT NULL,
  `visa_id` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_pw`, `user_name`, `user_add`, `user_type`, `visa_id`) VALUES
(1, 'talahamd99@gmail.com', '2001', 'Tala', 'Nablus', 'A', NULL),
(2, 'farahdilea@gmail.com', '123', 'Farah', 'Nablus', 'A', NULL),
(3, 'mohand@gmail.com', '147', 'mohand', 'rervnbv', 'U', NULL),
(4, 'zahraa@gmail.com', '1236', 'zahraa', 'Tullkarm-Nablus', 'U', NULL),
(5, 'eeeehaaaee@gmail.com', '666', 'rrr', 'telllllll', 'U', NULL),
(6, 'ffff@gmail.com', '147852', 'talaaaaasssss', 'banluss', 'U', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visa`
--

CREATE TABLE `visa` (
  `visa_id` int(16) NOT NULL,
  `visa_name` varchar(20) NOT NULL,
  `visa_expm` int(2) NOT NULL,
  `visa_expy` int(4) NOT NULL,
  `visa_cvv` int(4) NOT NULL,
  `visa_totalmoney` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`orderitem_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `visa`
--
ALTER TABLE `visa`
  ADD PRIMARY KEY (`visa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dep_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `orderitem_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`dep_id`) REFERENCES `department` (`dep_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`visa_id`) REFERENCES `visa` (`visa_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
