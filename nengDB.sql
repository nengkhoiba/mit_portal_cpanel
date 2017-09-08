CREATE TABLE IF NOT EXISTS `college` (
  `current_session` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `std_col_relation` ADD `reg_year` VARCHAR(10) NOT NULL AFTER `reg_no`;