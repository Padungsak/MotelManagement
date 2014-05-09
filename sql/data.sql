-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Aug 10, 2010 at 08:12 AM
-- Server version: 5.0.33
-- PHP Version: 5.2.1
-- 
-- Database: 'mrbs'
-- 

-- 
-- Dumping data for table 'base_modules'
-- 

INSERT INTO base_modules VALUES (82, NULL, 'Manage Role ', 'base_roles/adminIndex', 3, 0);
INSERT INTO base_modules VALUES (83, NULL, 'Manage Module', 'base_modules/adminIndex', 2, 0);
INSERT INTO base_modules VALUES (84, NULL, 'Manage User', 'base_users/adminIndex', 4, 0);
INSERT INTO base_modules VALUES (81, NULL, 'Manage Permission', 'base_permissions/adminIndex', 1, 0);
INSERT INTO base_modules VALUES (85, 84, 'Edit User', 'base_users/adminEdit', 1, 0);
INSERT INTO base_modules VALUES (86, 83, 'Add Module', 'base_modules/adminAdd', 2, 0);
INSERT INTO base_modules VALUES (87, 83, 'Edit Module', 'base_modules/adminEdit', 2, 0);
INSERT INTO base_modules VALUES (88, 84, 'Add User', 'base_users/adminAdd', 2, 0);
INSERT INTO base_modules VALUES (89, 82, 'Add Role', 'base_roles/adminAdd', 2, 0);
INSERT INTO base_modules VALUES (90, 82, 'Edit Role', 'base_roles/adminEdit', 1, 0);
INSERT INTO base_modules VALUES (91, 81, 'Add Permission', 'base_permissions/adminAdd', 1, 0);
INSERT INTO base_modules VALUES (92, 81, 'Edit Permission', 'base_permissions/adminEdit', 2, 0);
INSERT INTO base_modules VALUES (93, 84, 'Change Password', 'base_users/changePwd', 0, 0);
INSERT INTO base_modules VALUES (94, NULL, 'Home', 'base_homes/adminIndex', 6, 0);
INSERT INTO base_modules VALUES (95, 84, 'Delete User', 'base_users/adminDelete', 4, 0);
INSERT INTO base_modules VALUES (96, 82, 'Delete Role', 'base_roles/adminDelete', 4, 0);
INSERT INTO base_modules VALUES (97, 84, 'Log Out', 'base_users/logout', 5, 0);
INSERT INTO base_modules VALUES (98, NULL, 'Manage Room', 'admin_rooms/adminIndex', 6, 0);
INSERT INTO base_modules VALUES (99, 98, 'Add Room', 'admin_rooms/adminAdd', 1, 0);
INSERT INTO base_modules VALUES (100, 98, 'Edit Room', 'admin_rooms/adminEdit', 2, 0);
INSERT INTO base_modules VALUES (101, 98, 'Delete Room', 'admin_rooms/adminDelete', 3, 0);
INSERT INTO base_modules VALUES (102, NULL, 'Manage Bookings', 'admin_bookings/adminIndex', 7, 0);
INSERT INTO base_modules VALUES (103, 102, 'Delete Bookings', 'admin_bookings/adminDelete', 1, 0);
INSERT INTO base_modules VALUES (104, 102, 'Manage Blocks', 'admin_blocks/adminIndex', 1, 0);
INSERT INTO base_modules VALUES (105, 102, 'Define Blocks', 'admin_blocks/adminDefine', 2, 0);

-- 
-- Dumping data for table 'base_role_module_maps'
-- 

INSERT INTO base_role_module_maps VALUES (205, 21, 92, 1);
INSERT INTO base_role_module_maps VALUES (204, 21, 81, 1);
INSERT INTO base_role_module_maps VALUES (203, 21, 86, 1);
INSERT INTO base_role_module_maps VALUES (202, 21, 87, 1);
INSERT INTO base_role_module_maps VALUES (201, 21, 83, 1);
INSERT INTO base_role_module_maps VALUES (200, 21, 90, 1);
INSERT INTO base_role_module_maps VALUES (199, 21, 89, 1);
INSERT INTO base_role_module_maps VALUES (198, 21, 96, 1);
INSERT INTO base_role_module_maps VALUES (197, 21, 82, 1);
INSERT INTO base_role_module_maps VALUES (196, 21, 93, 1);
INSERT INTO base_role_module_maps VALUES (195, 21, 85, 1);
INSERT INTO base_role_module_maps VALUES (194, 21, 88, 1);
INSERT INTO base_role_module_maps VALUES (193, 21, 95, 1);
INSERT INTO base_role_module_maps VALUES (192, 21, 97, 1);
INSERT INTO base_role_module_maps VALUES (191, 21, 84, 1);
INSERT INTO base_role_module_maps VALUES (190, 21, 94, 1);
INSERT INTO base_role_module_maps VALUES (206, 21, 91, 1);
INSERT INTO base_role_module_maps VALUES (292, 23, 93, 1);
INSERT INTO base_role_module_maps VALUES (291, 23, 97, 1);
INSERT INTO base_role_module_maps VALUES (290, 23, 94, 1);
INSERT INTO base_role_module_maps VALUES (289, 23, 99, 1);
INSERT INTO base_role_module_maps VALUES (288, 23, 100, 1);
INSERT INTO base_role_module_maps VALUES (287, 23, 101, 1);
INSERT INTO base_role_module_maps VALUES (286, 23, 98, 1);
INSERT INTO base_role_module_maps VALUES (285, 23, 103, 1);
INSERT INTO base_role_module_maps VALUES (284, 23, 104, 1);
INSERT INTO base_role_module_maps VALUES (283, 23, 105, 1);
INSERT INTO base_role_module_maps VALUES (282, 23, 102, 1);

-- 
-- Dumping data for table 'base_roles'
-- 

INSERT INTO base_roles VALUES (21, 'super admin', '', '2010-02-24 12:14:12', '2010-02-24 12:14:12', 0);
INSERT INTO base_roles VALUES (23, 'normal', '', '2010-02-24 11:31:18', '2010-02-24 11:31:18', 0);

-- 
-- Dumping data for table 'base_user_role_maps'
-- 

INSERT INTO base_user_role_maps VALUES (42, 79, 23);
INSERT INTO base_user_role_maps VALUES (41, 78, 21);

-- 
-- Dumping data for table 'base_users'
-- 

INSERT INTO base_users VALUES (79, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2010-03-12 14:37:56', '2010-03-12 14:37:56');
INSERT INTO base_users VALUES (78, 'super_admin', 'ed49c3fed75a513a79cb8bd1d4715d57', '2010-03-12 14:37:33', '2010-03-12 14:37:33');