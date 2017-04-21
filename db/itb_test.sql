-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
-- Host: localhost:8889
-- Generation Time: Feb 17, 2017 at 06:20 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
--
-- Database: `itb_test`
-- Table structure for table `categories`
--
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `content` text,
  `preview_image` varchar(50) NOT NULL,
  `section_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Table structure for table `features`
--
CREATE TABLE `features` (
  `id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `section_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Table structure for table `sections`
--
CREATE TABLE `sections` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_id` (`section_id`);
--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);