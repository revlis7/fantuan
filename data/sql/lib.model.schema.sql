
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;


CREATE TABLE `user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`email` VARCHAR(255)  NOT NULL,
	`password` VARCHAR(255)  NOT NULL,
	`name` VARCHAR(255)  NOT NULL,
	`balance` INTEGER  NOT NULL,
	`status` INTEGER  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `user_U_1` (`email`),
	UNIQUE KEY `user_U_2` (`name`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- team
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `team`;


CREATE TABLE `team`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`captain` INTEGER  NOT NULL,
	`status` INTEGER  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `team_U_1` (`name`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- team_user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `team_user`;


CREATE TABLE `team_user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`team_id` INTEGER  NOT NULL,
	`user_id` INTEGER  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- activity
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `activity`;


CREATE TABLE `activity`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`desc` TEXT  NOT NULL,
	`status` INTEGER  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- activity_user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `activity_user`;


CREATE TABLE `activity_user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`activity_id` INTEGER  NOT NULL,
	`user_id` INTEGER  NOT NULL,
	`cost` INTEGER  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- user_charge_history
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user_charge_history`;


CREATE TABLE `user_charge_history`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER  NOT NULL,
	`price` INTEGER  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- user_consume_history
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user_consume_history`;


CREATE TABLE `user_consume_history`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER  NOT NULL,
	`price` INTEGER  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
