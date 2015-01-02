Symfony Demo Project
====================

Overview
--------

This repository contains Project for Blog


Requirements
-----------

* PHP >= 5.4 
* MySQL >= 5.5

Instructions
------------

Please follow all steps bellow
1. Download this Repository.

2. Use Following Command for update all useful dependencies
    Don't forget to provide parameters for update app/config/parameters.yml
    composer update
3. Use following command for execute database migration and say y for continue
    php app/console doctrine:migrations:migrate
4. Use following command for purge the database
    php app/console doctrine:fixtures:load
5. Congratulations You are done please go to following page for home page
    project folder/web/blog
