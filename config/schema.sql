-- Brit Properties — supporting tables for website forms
-- Apply with: mysql -u <user> <db> < config/schema.sql

CREATE TABLE IF NOT EXISTS `contact_messages` (
  `message_id` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(100) NOT NULL,
  `last_name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(50) DEFAULT NULL,
  `message` TEXT DEFAULT NULL,
  `created_at` DATETIME DEFAULT current_timestamp(),
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `spelling_bee_registrations` (
  `registration_id` INT(11) NOT NULL AUTO_INCREMENT,
  `reg_number` VARCHAR(10) DEFAULT NULL,
  `first_name` VARCHAR(100) NOT NULL,
  `last_name` VARCHAR(100) NOT NULL,
  `gender` ENUM('Male','Female') NOT NULL,
  `age` TINYINT(3) UNSIGNED NOT NULL,
  `school` VARCHAR(255) NOT NULL,
  `grade` VARCHAR(100) NOT NULL,
  `guardian_name` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(50) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `consent` TINYINT(1) NOT NULL DEFAULT 0,
  `consent_media_capture` TINYINT(1) NOT NULL DEFAULT 0,
  `consent_media_usage` TINYINT(1) NOT NULL DEFAULT 0,
  `consent_media_details` TINYINT(1) NOT NULL DEFAULT 0,
  `consent_media_no_compensation` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` DATETIME DEFAULT current_timestamp(),
  PRIMARY KEY (`registration_id`),
  UNIQUE KEY `uq_reg_number` (`reg_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ── Blog ─────────────────────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS `blog_posts` (
  `post_id` INT(11) NOT NULL AUTO_INCREMENT,
  `slug` VARCHAR(255) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `excerpt` VARCHAR(500) DEFAULT NULL,
  `content` LONGTEXT NOT NULL,
  `featured_image` VARCHAR(255) DEFAULT NULL,
  `author` VARCHAR(120) NOT NULL DEFAULT 'Brit Properties',
  `meta_title` VARCHAR(255) DEFAULT NULL,
  `meta_description` VARCHAR(320) DEFAULT NULL,
  `status` ENUM('Draft','Published') NOT NULL DEFAULT 'Draft',
  `published_at` DATETIME DEFAULT NULL,
  `created_at` DATETIME DEFAULT current_timestamp(),
  `updated_at` DATETIME DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `uq_blog_slug` (`slug`),
  KEY `idx_status_published` (`status`, `published_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `blog_tags` (
  `tag_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `slug` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`tag_id`),
  UNIQUE KEY `uq_blog_tag_slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `blog_post_tags` (
  `post_id` INT(11) NOT NULL,
  `tag_id` INT(11) NOT NULL,
  PRIMARY KEY (`post_id`, `tag_id`),
  KEY `idx_bpt_tag` (`tag_id`),
  CONSTRAINT `fk_bpt_post` FOREIGN KEY (`post_id`) REFERENCES `blog_posts` (`post_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_bpt_tag` FOREIGN KEY (`tag_id`) REFERENCES `blog_tags` (`tag_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
