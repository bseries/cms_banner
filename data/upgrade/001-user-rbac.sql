ALTER TABLE `banners` ADD `owner_id` INT(11)  UNSIGNED  NOT NULL  AFTER `id`;
UPDATE `banners` SET `owner_id` = 1;
