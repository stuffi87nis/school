<?php

$db = require './db.inc.php';

/*
*   CREATE USERS TABLE
*/
$stmt_createUsersTable = $db->prepare("
  CREATE TABLE IF NOT EXISTS `users` (
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(30),
    `email` varchar(30),
    `password` varchar(32),
    `acc_type` enum('user', 'admin') DEFAULT 'user',
    `created_at` datetime DEFAULT now(),
    `deleted_at` datetime DEFAULT NULL
  )
");
$stmt_createUsersTable->execute();

/*
*   INSERT ADMIN ACCOUNT
*/
$stmt_getAllUsers = $db->prepare("
  SELECT *
  FROM `users`
");
$stmt_getAllUsers->execute();
// $users = $stmt_getAllUsers->fetchAll();
$numOfUsers = $stmt_getAllUsers->rowCount();

if( $numOfUsers <= 0 ) {
  $stmt_insertAdminAccount = $db->prepare("
    INSERT INTO `users`
    (`name`, `email`, `password`, `acc_type`)
    VALUES
    (:name, :email, :password, :acc_type)
  ");
  $stmt_insertAdminAccount->execute([
    ':name' => "Admin",
    ':email' => "teacher@mail.com",
    ':password' => md5("123"),
    ':acc_type' => "admin"
  ]);
}


/*
*   CREATE PRODUCTS TABLE
*/
$stmt_createProductsTable = $db->prepare("
  CREATE TABLE IF NOT EXISTS `students` (
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `school_id` int,
    `first_name` varchar(255),
    `last_name` varchar(255),
    `grades` int,
    `created_at` datetime DEFAULT now(),
    `deleted_at` datetime DEFAULT NULL
  )
");
$stmt_createProductsTable->execute();


/*
*   CREATE CATEGORIES TABLE
*/
$stmt_createCategoriesTable = $db->prepare("
  CREATE TABLE IF NOT EXISTS `schools` (
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `title` varchar(255)
  )
");
$stmt_createCategoriesTable->execute();