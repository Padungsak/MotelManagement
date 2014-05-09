-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Aug 10, 2010 at 08:06 AM
-- Server version: 5.0.33
-- PHP Version: 5.2.1
-- 
-- Database: `mrbs`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `base_modules`
-- 

CREATE TABLE `base_modules` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) default NULL,
  `name` varchar(250) collate latin1_general_ci NOT NULL,
  `url` varchar(250) collate latin1_general_ci NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=106 ;


-- --------------------------------------------------------

-- 
-- Table structure for table `base_role_module_maps`
-- 

CREATE TABLE `base_role_module_maps` (
  `id` int(11) NOT NULL auto_increment,
  `base_role_id` int(11) NOT NULL,
  `base_module_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=293 ;

-- 
-- Table structure for table `base_roles`
-- 

CREATE TABLE `base_roles` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(250) collate latin1_general_ci NOT NULL,
  `des` varchar(250) collate latin1_general_ci NOT NULL,
  `create_date` timestamp NULL default NULL,
  `modify_date` timestamp NULL default NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `base_user_role_maps`
-- 

CREATE TABLE `base_user_role_maps` (
  `id` int(11) NOT NULL auto_increment,
  `base_user_id` int(11) NOT NULL,
  `base_role_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=43 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `base_users`
-- 

CREATE TABLE `base_users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(250) collate latin1_general_ci NOT NULL,
  `password` varchar(250) collate latin1_general_ci NOT NULL,
  `create_date` timestamp NULL default NULL,
  `modify_date` timestamp NULL default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=80 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `blocks`
-- 

CREATE TABLE `blocks` (
  `id` int(11) NOT NULL auto_increment,
  `time` datetime NOT NULL,
  `room_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=15 ;


-- --------------------------------------------------------

-- 
-- Table structure for table `bookings`
-- 

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL auto_increment,
  `time` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=208 ;




-- --------------------------------------------------------

-- 
-- Table structure for table `rooms`
-- 

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(250) collate latin1_general_ci NOT NULL,
  `des` varchar(250) collate latin1_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;


-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(250) collate latin1_general_ci NOT NULL,
  `password` varchar(250) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

