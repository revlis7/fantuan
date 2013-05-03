
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
#-- group
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `group`;


CREATE TABLE `group`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`captain` INTEGER  NOT NULL,
	`status` INTEGER  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `group_U_1` (`name`),
	INDEX `group_FI_1` (`captain`),
	CONSTRAINT `group_FK_1`
		FOREIGN KEY (`captain`)
		REFERENCES `user` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- group_user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `group_user`;


CREATE TABLE `group_user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`group_id` INTEGER  NOT NULL,
	`user_id` INTEGER  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `group_user_FI_1` (`group_id`),
	CONSTRAINT `group_user_FK_1`
		FOREIGN KEY (`group_id`)
		REFERENCES `group` (`id`),
	INDEX `group_user_FI_2` (`user_id`),
	CONSTRAINT `group_user_FK_2`
		FOREIGN KEY (`user_id`)
		REFERENCES `user` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- activity
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `activity`;


CREATE TABLE `activity`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`desc` TEXT  NOT NULL,
	`cost` INTEGER  NOT NULL,
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
	PRIMARY KEY (`id`),
	INDEX `activity_user_FI_1` (`activity_id`),
	CONSTRAINT `activity_user_FK_1`
		FOREIGN KEY (`activity_id`)
		REFERENCES `activity` (`id`),
	INDEX `activity_user_FI_2` (`user_id`),
	CONSTRAINT `activity_user_FK_2`
		FOREIGN KEY (`user_id`)
		REFERENCES `user` (`id`)
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
	PRIMARY KEY (`id`),
	INDEX `user_charge_history_FI_1` (`user_id`),
	CONSTRAINT `user_charge_history_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `user` (`id`)
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
	PRIMARY KEY (`id`),
	INDEX `user_consume_history_FI_1` (`user_id`),
	CONSTRAINT `user_consume_history_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `user` (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
