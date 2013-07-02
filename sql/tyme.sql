-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 12, 2013 at 06:21 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `asi_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `pubdate` date NOT NULL,
  `body` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('caa3f24da52ad8115dc435ce551e19e4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0', 1371050891, 'a:5:{s:9:"user_data";s:0:"";s:4:"name";s:12:"Tyler Bailey";s:5:"email";s:22:"tylerb.media@gmail.com";s:2:"id";s:1:"4";s:8:"loggedin";b:1;}'),
('da0b34d192412817adf1d64580da84f2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0', 1371058870, 'a:5:{s:9:"user_data";s:0:"";s:4:"name";s:12:"Tyler Bailey";s:5:"email";s:22:"tylerb.media@gmail.com";s:2:"id";s:1:"4";s:8:"loggedin";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(55) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `version` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `order` int(11) unsigned NOT NULL DEFAULT '0',
  `body` text NOT NULL,
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0',
  `template` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `order`, `body`, `parent_id`, `template`) VALUES
(1, 'Home', '', 1, '<p>Nunc rutrum elit vel nisi egestas ultricies. Quisque hendrerit adipiscing lectus eu vestibulum. Nam hendrerit hendrerit turpis, ut lacinia risus vehicula eleifend. Nunc nec felis turpis. Phasellus ac lorem posuere, suscipit sem quis, fermentum dui. Etiam vitae porttitor diam, fringilla iaculis ipsum. Aenean at enim a erat condimentum dapibus vitae sed metus. Etiam ultrices ante ac hendrerit lobortis.</p>', 0, 'homepage_slider'),
(4, 'About', 'about', 2, '<div id="lipsum">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut quis turpis ut sem malesuada placerat ac vitae sapien. Pellentesque pharetra metus velit, eu vestibulum eros facilisis luctus. Integer tristique dui in eleifend interdum. Nam non arcu id orci ultrices mollis viverra ut leo. Duis laoreet iaculis risus. Curabitur sapien purus, venenatis ut commodo id, pulvinar sed risus. Quisque malesuada mauris sed ipsum convallis molestie. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam eget lacinia ipsum.</p>\r\n<p>Sed congue et elit sit amet porta. Mauris at ullamcorper nunc. Maecenas vel turpis turpis. Praesent condimentum eros vitae fermentum feugiat. Aenean eros justo, elementum nec ornare id, pulvinar sollicitudin odio. In vestibulum magna a lacus tristique interdum. Nullam dui orci, aliquam ut erat id, ornare varius velit. Aliquam non molestie justo, nec faucibus est. Praesent tincidunt augue et venenatis mattis.</p>\r\n<p>Nunc rutrum elit vel nisi egestas ultricies. Quisque hendrerit adipiscing lectus eu vestibulum. Nam hendrerit hendrerit turpis, ut lacinia risus vehicula eleifend. Nunc nec felis turpis. Phasellus ac lorem posuere, suscipit sem quis, fermentum dui. Etiam vitae porttitor diam, fringilla iaculis ipsum. Aenean at enim a erat condimentum dapibus vitae sed metus. Etiam ultrices ante ac hendrerit lobortis.</p>\r\n<p>Maecenas porttitor nisi sed dui commodo, ac vulputate magna fringilla. Nulla at odio augue. Morbi dictum tincidunt molestie. Praesent commodo diam pretium, porttitor nisl quis, scelerisque ante. Quisque enim nulla, pellentesque ultricies blandit ut, tincidunt non tortor. Integer auctor euismod leo, at commodo nunc sollicitudin et. Morbi vestibulum sem dui, vel scelerisque metus ornare sit amet. Nulla congue elit at velit placerat semper. Duis ut enim eget augue tempus volutpat. Nullam ornare neque id risus cursus tincidunt. Vestibulum at sapien id metus dictum fringilla. Aliquam sed neque a diam consectetur laoreet.</p>\r\n<p>Morbi lobortis eu lorem eu interdum. In in tincidunt nisl. Aenean scelerisque dui eget vestibulum porta. Sed neque mauris, rhoncus sit amet tortor et, posuere feugiat mi. Aliquam erat volutpat. Duis eleifend commodo dui, id iaculis augue rutrum eu. Mauris eleifend nec metus nec tempus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas feugiat magna vel libero aliquam lobortis. Nam massa nulla, egestas non massa ut, vestibulum sodales nibh. Ut vitae luctus lectus. Vestibulum tincidunt sagittis felis eget cursus. Quisque varius hendrerit arcu, et auctor purus tristique adipiscing. Integer cursus risus dui, ut vehicula orci malesuada id. Proin euismod nibh in leo rhoncus tincidunt. Vivamus a placerat lorem.</p>\r\n</div>', 0, 'page'),
(7, 'Contact', 'contact', 4, '<p>This is where a google map will be placed with the location, address &amp; telephone information.</p>', 0, 'contact'),
(10, 'Products', 'products', 3, '<p>Automated Solutions creates custom Torque Arms that come with a 100% satisfactory garauntee. If you aren''t satisfied with your purchase we will refund it 100% and even cover the shipping costs.</p>', 0, 'store');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `price` varchar(155) NOT NULL,
  `pubdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `quantity`, `description`, `photo`, `price`, `pubdate`) VALUES
(1, 'Product One', '293431000', 10, '<p>This is a test product upload. I am just adding a bunch of text so I can see how the descriptions look on the full product view page. This is all just jibberish text for visual reference. I am almost to the point of where I am done programming and just strictly designing. Just a little bit more text and I will have an idea of how this will look when it is full. blahb lahb albh albh I don''t want to edit those stupid Tran Star videos anymore!</p>', 'Jellyfish.jpg', '250', '2013-06-12 17:18:43'),
(2, 'Product Two', '9291730', 2, '<p>This is another test product upload. The picture should be a desert. This is an updated description using the Product Update Form.</p>', 'Desert.jpg', '200', '2013-06-12 15:23:40'),
(3, 'Product Three', '7623720', 0, '<p>The photo for this product should be of yellow Tulip flowers. This is an updated description using the Product Update Form.</p>', 'Tulips.jpg', '150', '2013-06-12 15:28:36'),
(4, 'Product Four', '2487701999', 5, '<p>I am testing the file upload name encryption. This is an updated description made using the Product Update Form.</p>', 'bc38015612891b2f2efe99d9db0ff667.jpg', '566', '2013-06-12 15:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`) VALUES
(4, 'tylerb.media@gmail.com', '86edb24a739f80076f795b0a80ff9860fd253e2922c6490a982b84f9cf847f1b37723dbe3589aa6328b81c811809f97827ee7cef7a8cadb9e95ba180691b9e77', 'Tyler Bailey');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
