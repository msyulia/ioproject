-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema aplikacja_pracodawcy
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema aplikacja_pracodawcy
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `aplikacja_pracodawcy` DEFAULT CHARACTER SET latin1 ;
USE `aplikacja_pracodawcy` ;

-- -----------------------------------------------------
-- Table `aplikacja_pracodawcy`.`pracownicy`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aplikacja_pracodawcy`.`pracownicy` (
  `ID` INT(10) NOT NULL AUTO_INCREMENT,
  `PESEL` VARCHAR(11) CHARACTER SET 'utf8' COLLATE 'utf8_polish_ci' NOT NULL,
  `Imie` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_polish_ci' NOT NULL,
  `Nazwisko` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_polish_ci' NOT NULL,
  `login` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_polish_ci' NOT NULL,
  `password` VARCHAR(256) CHARACTER SET 'utf8' COLLATE 'utf8_polish_ci' NOT NULL,
  `firstlogin` TINYINT(1) NOT NULL,
  `email` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_polish_ci' NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 20
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_polish_ci;


-- -----------------------------------------------------
-- Table `aplikacja_pracodawcy`.`pracodawcy`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aplikacja_pracodawcy`.`pracodawcy` (
  `ID` INT(10) NOT NULL AUTO_INCREMENT,
  `nazwa_firmy` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
  `opis` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_polish_ci' NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_polish_ci;


-- -----------------------------------------------------
-- Table `aplikacja_pracodawcy`.`historiazatrudnienia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aplikacja_pracodawcy`.`historiazatrudnienia` (
  `ID` INT(10) NOT NULL AUTO_INCREMENT,
  `PracownikID` INT(10) NOT NULL,
  `PracodawcaID` INT(10) NOT NULL,
  `dataZatrudniena` DATE NOT NULL,
  `dataZwolnienia` DATE NOT NULL,
  `czyWystawionaOcena` TINYINT(1) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `PracownikID` (`PracownikID` ASC),
  INDEX `PracodawcaID` (`PracodawcaID` ASC),
  CONSTRAINT `historiazatrudnienia_ibfk_1`
    FOREIGN KEY (`PracownikID`)
    REFERENCES `aplikacja_pracodawcy`.`pracownicy` (`ID`),
  CONSTRAINT `historiazatrudnienia_ibfk_2`
    FOREIGN KEY (`PracodawcaID`)
    REFERENCES `aplikacja_pracodawcy`.`pracodawcy` (`ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_polish_ci;


-- -----------------------------------------------------
-- Table `aplikacja_pracodawcy`.`oceny`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aplikacja_pracodawcy`.`oceny` (
  `ID` INT(10) NOT NULL AUTO_INCREMENT,
  `Pracodawca` VARCHAR(255) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `Pracownik` INT(11) NULL DEFAULT NULL,
  `Kat1` INT(10) NULL DEFAULT NULL,
  `Kat2` INT(10) NULL DEFAULT NULL,
  `Kat3` INT(10) NULL DEFAULT NULL,
  `Kat4` INT(10) NULL DEFAULT NULL,
  `Kat5` INT(10) NULL DEFAULT NULL,
  `Komentarz` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_polish_ci' NULL DEFAULT NULL,
  `czyWidoczna` TINYINT(1) NOT NULL,
  `data_wystawienia` DATE NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 132
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_polish_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;