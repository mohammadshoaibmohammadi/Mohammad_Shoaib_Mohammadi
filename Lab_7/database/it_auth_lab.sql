-- Lab 06 database setup
-- This creates the empty MySQL database requested by the lab.
-- The users table itself should be created by Laravel's default migration
-- with: php artisan migrate

CREATE DATABASE IF NOT EXISTS it_auth_lab
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE it_auth_lab;
