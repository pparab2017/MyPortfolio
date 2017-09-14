
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- Event
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Event`;

CREATE TABLE `Event`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `Title` VARCHAR(300),
    `Dsc` VARCHAR(1000),
    `Company` VARCHAR(45),
    `TimeLineID` INTEGER,
    `TypeID` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `id_timeline_idx` (`TimeLineID`),
    INDEX `fk_type_idx` (`TypeID`),
    CONSTRAINT `fk_type`
        FOREIGN KEY (`TypeID`)
        REFERENCES `Event_Type` (`id`),
    CONSTRAINT `id_timeline`
        FOREIGN KEY (`TimeLineID`)
        REFERENCES `TimeLine` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Event_Type
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Event_Type`;

CREATE TABLE `Event_Type`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `TypeName` VARCHAR(45),
    `Dsc` VARCHAR(1000),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Language
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Language`;

CREATE TABLE `Language`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `Name` VARCHAR(100) NOT NULL,
    `logo_img_url` VARCHAR(200) NOT NULL,
    `des` VARCHAR(500) NOT NULL,
    `color` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Project
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Project`;

CREATE TABLE `Project`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `Name` VARCHAR(200) NOT NULL,
    `Lang_id` INTEGER NOT NULL,
    `des` VARCHAR(5000) NOT NULL,
    `img_url` VARCHAR(500) NOT NULL,
    `Notes` VARCHAR(1000),
    `Others` VARCHAR(45),
    `videoLink` VARCHAR(500),
    `gitLink` VARCHAR(500),
    PRIMARY KEY (`id`),
    INDEX `fk_lang_id_idx` (`Lang_id`),
    CONSTRAINT `fk_lang_id`
        FOREIGN KEY (`Lang_id`)
        REFERENCES `Language` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- TimeLine
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `TimeLine`;

CREATE TABLE `TimeLine`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `from_Date` DATETIME NOT NULL,
    `to_Date` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
