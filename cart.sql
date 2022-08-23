-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Mar 09, 2019 at 04:57 PM
-- Server version: 5.0.27
-- PHP Version: 5.2.1
-- 
-- Database: `cart`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `admin`
-- 

CREATE TABLE `admin` (
  `id` int(2) NOT NULL auto_increment,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `admin`
-- 

INSERT INTO `admin` (`id`, `username`, `password`) VALUES 
(1, 'admin', 'admin');

-- --------------------------------------------------------

-- 
-- Table structure for table `registered_users`
-- 

CREATE TABLE `registered_users` (
  `id` int(3) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `country` varchar(10) NOT NULL,
  `state` varchar(10) NOT NULL,
  `lga` varchar(10) NOT NULL,
  `town` varchar(12) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `status` varchar(2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1001 ;

-- 
-- Dumping data for table `registered_users`
-- 

INSERT INTO `registered_users` (`id`, `name`, `gender`, `country`, `state`, `lga`, `town`, `pic`, `status`) VALUES 
(3, 'Matur Innocent Joshua', 'male', 'Nigeria', 'Plateau', 'Bokkos', 'Tenti', 'birth.jpg', '1'),
(8, 'Matur Innocent', 'female', 'Nigeria', 'Adamawa', 'Bokkos', 'hundas', 'waec.png', '0');

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `id` int(3) NOT NULL auto_increment,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` (`id`, `username`, `password`) VALUES 
(12, 'bwesun', '1111'),
(13, 'miracle', 'miracle');
