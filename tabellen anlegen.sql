/*CREATE SCHEMA `regenbogenheim` ;
*/
CREATE TABLE `regenbogenheim`.`heim_user` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `user_nachname` VARCHAR(100) NULL,
  `user_vorname` VARCHAR(100) NULL,
  `user_username` VARCHAR(45) NULL,
  `user_passwort` VARCHAR(100) NULL,
  `user_geburtstag` DATE NULL,
  `user_erstaufnahme` DATE NULL,
  `user_satus_patient` VARCHAR(1000) NULL,
  `user_kommentar` VARCHAR(45) NULL,
  `user_ersterstellung` TIMESTAMP(6) NULL,
  PRIMARY KEY (`id_user`));

CREATE TABLE `regenbogenheim`.`heim_admin` (`id_admin` INT NOT NULL AUTO_INCREMENT, `admin_username` VARCHAR(45) NULL,
  `admin_passwort` VARCHAR(100) NULL, ,
  PRIMARY KEY (`id_admin`));
