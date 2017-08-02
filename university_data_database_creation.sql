-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema university_data
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema university_data
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `university_data` DEFAULT CHARACTER SET utf8 ;
USE `university_data` ;

-- -----------------------------------------------------
-- Table `university_data`.`student`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `university_data`.`student` (
  `firstname` VARCHAR(45) NOT NULL,
  `surname` VARCHAR(45) NOT NULL,
  `birthday` DATE NULL DEFAULT NULL,
  `university` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`firstname`, `surname`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO `university_data`.`student` (`firstname`, `surname`, `birthday`, `university`) VALUES ('Sheena', 'Tan', '1998-04-01', 'Ateneo De Manila University');
INSERT INTO `university_data`.`student` (`firstname`, `surname`, `birthday`, `university`) VALUES ('Denise', 'Ong', '1997-09-29', 'University of Santo Tomas');
INSERT INTO `university_data`.`student` (`firstname`, `surname`, `birthday`, `university`) VALUES ('Bianca', 'Lee', '1996-07-07', 'University of Santo Tomas');
INSERT INTO `university_data`.`student` (`firstname`, `surname`, `birthday`, `university`) VALUES ('Erika', 'Gomez', '1997-12-23', 'University of Santo Tomas');
INSERT INTO `university_data`.`student` (`firstname`, `surname`, `birthday`, `university`) VALUES ('Aldrin', 'Gamboa', '1997-10-03', 'Ateneo De Manila University');
INSERT INTO `university_data`.`student` (`firstname`, `surname`, `birthday`, `university`) VALUES ('Lily', 'Morco', '1998-01-29', 'University of Santo Tomas');
INSERT INTO `university_data`.`student` (`firstname`, `surname`, `birthday`, `university`) VALUES ('Kim', 'Young', '1997-10-17', 'University of the Philippines');
INSERT INTO `university_data`.`student` (`firstname`, `surname`, `birthday`, `university`) VALUES ('Paul', 'Wong', '1998-03-20', 'University of the Philippines');
INSERT INTO `university_data`.`student` (`firstname`, `surname`, `birthday`, `university`) VALUES ('Lizette', 'Ong', '1997-09-19', 'De La Salle University');
INSERT INTO `university_data`.`student` (`firstname`, `surname`, `birthday`, `university`) VALUES ('Kaye', 'Hong', '1997-09-20', 'De La Salle University');
INSERT INTO `university_data`.`student` (`firstname`, `surname`, `birthday`, `university`) VALUES ('Charles', 'Go', '1997-10-17', 'De La Salle University');
INSERT INTO `university_data`.`student` (`firstname`, `surname`, `birthday`, `university`) VALUES ('Vic Jason', 'Sze', '1997-10-24', 'De La Salle University');
INSERT INTO `university_data`.`student` (`firstname`, `surname`, `birthday`, `university`) VALUES ('Carlos', 'Darwin', '1993-04-12', 'Ateneo De Manila University');
INSERT INTO `university_data`.`student` (`firstname`, `surname`, `birthday`, `university`) VALUES ('Dominique', 'Tan', '1992-07-07', 'University of Santo Tomas');

