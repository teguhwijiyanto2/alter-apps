# alter-apps

# Commit 

# Add Subscription Page (subscriptions.php, subscriptions__payment-information.php, subscriptions__billing-address.php, subscription-proccess.php, subscription-detail.php, subscription-billing-proccess.php  )

# Add Play Option Setting (setting__play-options.php, play-option-process.php )

# Fix Myorder Play, Tournament

# Fix Upload Result Tournament 

# Update UI Account.php

# new DDL 

CREATE TABLE `alter_apps_db`.`matchmaking_option` ( `id` BIGINT(20) NOT NULL AUTO_INCREMENT , `user_id` BIGINT(20) NOT NULL , `game` TEXT NOT NULL , `fee` VARCHAR(50) NOT NULL , `time` VARCHAR(50) NOT NULL , `available` VARCHAR(50) NULL , `available_date` TEXT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `alter_apps_db`.`subscription_setting` ( `id` BIGINT(20) NOT NULL AUTO_INCREMENT , `user_id` BIGINT(20) NOT NULL , `name_account` VARCHAR(255) NOT NULL , `number` VARCHAR(255) NOT NULL , `type` VARCHAR(50) NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `alter_apps_db`.`subscription_billing` ( `id` BIGINT(20) NOT NULL , `user_id` BIGINT(20) NOT NULL , `address` TEXT NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ) ENGINE = InnoDB;
