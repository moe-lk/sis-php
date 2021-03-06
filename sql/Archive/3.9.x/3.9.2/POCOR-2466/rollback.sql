-- sms_logs table
CREATE TABLE `sms_logs` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `send_receive` int(1) NOT NULL,
    `created` datetime NOT NULL,
    `number` varchar(25) NOT NULL,
    `message` varchar(160) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- sms_messages table
CREATE TABLE `sms_messages` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `message` text NOT NULL,
    `order` int(3) NOT NULL,
    `enabled` int(1) NOT NULL DEFAULT '1',
    `modified_user_id` int(11) DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    `created_user_id` int(11) NOT NULL,
    `created` datetime NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- sms_responses table
CREATE TABLE `sms_responses` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `message` varchar(160) NOT NULL,
    `sent` datetime NOT NULL,
    `received` datetime DEFAULT NULL,
    `number` varchar(25) NOT NULL,
    `response` varchar(160) DEFAULT NULL,
    `sent_count` int(3) NOT NULL DEFAULT '1',
    `order` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Drop alerts table
DROP TABLE alerts;

-- security_user table
ALTER TABLE `security_users` DROP `email` ;

-- Security functions (permission)
INSERT INTO `security_functions` (`id`, `name`, `controller`, `module`, `category`, `parent_id`, `_view`, `_edit`, `_add`, `_delete`, `_execute`, `order`, `visible`, `description`, `modified_user_id`, `modified`, `created_user_id`, `created`)
VALUES ('5029', 'Questions', 'Alerts', 'Administration', 'Communications', '5000', 'Questions.index|Questions.view', 'Questions.edit', 'Questions.add', 'Questions.remove', NULL, '5034', '1', NULL, NULL, NULL, '1', '2015-08-04 02:41:01'),
        ('5030', 'Responses', 'Alerts', 'Administration', 'Communications', '5000', 'Responses.index', NULL, NULL, NULL, NULL, '5035', '1', NULL, NULL, NULL, '1', '2015-08-04 02:41:02');

UPDATE `security_functions` SET `_view` = 'Logs.index' WHERE `id` = 5031;
UPDATE `security_functions` SET `_delete` = NULL WHERE `id` = 5031;
DELETE FROM `security_functions` WHERE `id` = 5064;
DELETE FROM `security_functions` WHERE `id` = 5065;
UPDATE `security_functions` SET `order` = `order` - 2 WHERE `order` BETWEEN 5033 AND 5065;

-- alert_roles table
RENAME TABLE `alerts_roles` TO `alert_roles`;
ALTER TABLE `alert_roles` CHANGE `alert_rule_id` `alert_id` INT(11) NOT NULL COMMENT 'links to alerts.id';
ALTER TABLE `alert_roles` CHANGE `id` `id` CHAR(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;

ALTER TABLE `alert_roles`
    DROP PRIMARY KEY,
    ADD PRIMARY KEY(`id`),
    DROP INDEX `alert_rule_id`;

-- alert_logs
ALTER TABLE `alert_logs` ADD `type` VARCHAR(20) NOT NULL AFTER `destination`;
ALTER TABLE `alert_logs` DROP `checksum`;

-- alerts table
ALTER TABLE `alert_rules` CHANGE `threshold` `threshold` INT(5) NOT NULL;
ALTER TABLE `alert_rules` CHANGE `enabled` `status` INT(1) NOT NULL DEFAULT '1';
ALTER TABLE `alert_rules` CHANGE `feature` `code` VARCHAR(50) NOT NULL;
RENAME TABLE `alert_rules` TO `alerts`;


-- system_patches
DELETE FROM `system_patches` WHERE `issue` = 'POCOR-2466';
