-- MySQL Script generated by MySQL Workbench
-- Dom 22 Out 2017 01:11:34 BRST
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mediapost
-- -----------------------------------------------------
-- Banco de dados do processo seletivo da Media Post
DROP SCHEMA IF EXISTS `mediapost` ;

-- -----------------------------------------------------
-- Schema mediapost
--
-- Banco de dados do processo seletivo da Media Post
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mediapost` DEFAULT CHARACTER SET utf8 ;
USE `mediapost` ;

-- -----------------------------------------------------
-- Table `mediapost`.`contato`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mediapost`.`contato` ;

CREATE TABLE IF NOT EXISTS `mediapost`.`contato` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `NOME` (`nome` ASC)  COMMENT 'Melhorar a pesquisa por nome')
ENGINE = InnoDB
COMMENT = 'Armazena os contatos do sistema';


-- -----------------------------------------------------
-- Table `mediapost`.`email`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mediapost`.`email` ;

CREATE TABLE IF NOT EXISTS `mediapost`.`email` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(80) NOT NULL,
  `tipo` CHAR(1) NOT NULL COMMENT 'P - Pessoal\nT - Trabalho',
  `contato_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_email_contato_idx` (`contato_id` ASC),
  INDEX `EMAIL` (`email` ASC)  COMMENT 'Melhorar o desempenho na pesquisa pelo email',
  CONSTRAINT `fk_email_contato`
    FOREIGN KEY (`contato_id`)
    REFERENCES `mediapost`.`contato` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Armazena o(s) e-mail(s) do contato';


-- -----------------------------------------------------
-- Table `mediapost`.`telefone`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mediapost`.`telefone` ;

CREATE TABLE IF NOT EXISTS `mediapost`.`telefone` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `telefone` VARCHAR(45) NOT NULL,
  `tipo` CHAR(1) NOT NULL COMMENT 'C - Celular\nR - Residencial\nT - Trabalho',
  `contato_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_telefone_contato1_idx` (`contato_id` ASC),
  INDEX `TELEFONE` (`telefone` ASC)  COMMENT 'Melhorar o desempenho da pesquisa pelo número de telefone',
  CONSTRAINT `fk_telefone_contato1`
    FOREIGN KEY (`contato_id`)
    REFERENCES `mediapost`.`contato` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Armazena o(s) telefone(s) dos contatos';


-- -----------------------------------------------------
-- Table `mediapost`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mediapost`.`usuario` ;

CREATE TABLE IF NOT EXISTS `mediapost`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `status` INT NOT NULL COMMENT '0 - Desabilitado\n1 - Habilitado',
  PRIMARY KEY (`id`),
  INDEX `NOME_SENHA` (`nome` ASC, `senha` ASC)  COMMENT 'Melhorar o desempenho da pesquisa consulta utilizando o usuário e a senha')
ENGINE = InnoDB
COMMENT = 'Armazena os usuários do sistema';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
