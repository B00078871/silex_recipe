-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Mar 17, 2017 at 05:00 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `recipe_test`
-- Table structure for table `recipes`
--
CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `image` text NOT NULL,
  `tags` int(11) NOT NULL,
  `ingredients` text NOT NULL,
  `instructions` text NOT NULL

) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--
INSERT INTO `recipes` (`id`, `title`, `image`, `tags`, `ingredients`, `instructions`) VALUES
(1, 'Chocolate Brownies', 'brownie.jpg', 'brownies, chocolate','Chocolate, butter, sugar','Mix together'),
(2, 'Banoffi Pie', 'banoffie.jpg', 'banoffi, banana, cream', 'Cream, Baileys, Banana, Digestive Biscuit', 'mix together and layer it'),
(3, 'Baileys Cheesecake', 'cheesecake.jpg', 'Baileys, cheesecake, cake', 'Digestive Biscuits, Baileys','Layers of cream and biscuit');

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;