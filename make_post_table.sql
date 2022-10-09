use test;
CREATE TABLE `test`.`posts` (
`idx` INT NOT NULL AUTO_INCREMENT , 
`title` VARCHAR(255) NOT NULL , 
`contents` VARCHAR(2000) NOT NULL , 
`writer` VARCHAR(255) NOT NULL , 
`category` VARCHAR(255) NOT NULL , 
`views` INT NOT NULL , 
`recommand` INT NOT NULL , 
`recent_view` TIMESTAMP NOT NULL , 
`file` VARCHAR(255) NOT NULL , PRIMARY KEY (`idx`));