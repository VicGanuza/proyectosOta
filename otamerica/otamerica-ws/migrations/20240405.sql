INSERT INTO `w290045_otam`.`offices_terminals` (`name`, `lang_key`) VALUES ('Administrative Office', 'administrativeOffice');

UPDATE `w290045_otam`.`offices` SET `office_terminal_id`='18' WHERE  `id`=5; /* (18) Fijasrse el id que le genero al nuevo insert en la tabla offices_terminals*/
UPDATE `w290045_otam`.`offices` SET `office_terminal_id`='18' WHERE  `id`=6; /* (18) Fijasrse el id que le genero al nuevo insert en la tabla offices_terminals*/
