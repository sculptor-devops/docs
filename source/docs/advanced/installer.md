---
title: Advance Installer
description: Sculptor devops advance installer
extends: _layouts.documentation
section: content
---

# Installer
The installer is not meant to be used for Sculptor only, you can customize and skip certaint steps. Installation is done by stage, you can see available with the command below.

```shell
./installer list-stages

Running on OS Version 18.04
You can see detailed log in /root/installer.log
Every step can take several minutes
+------+----------------+
| Step | Name           |
+------+----------------+
| 1    | Credentials    |
| 2    | Superuser      |
| 3    | Motd           |
| 4    | Ntp            |
| 5    | Php Cgi        |
| 6    | Base Packages  |
| 7    | SSH Daemon     |
| 8    | NodeJs         |
| 9    | Nginx          |
| 10   | MySql Server   |
| 11   | Redis Server   |
| 12   | Let's Encrypt  |
| 13   | Composer       |
| 14   | Deployer       |
| 15   | Firewall       |
| 16   | Crontab        |
| 17   | Check services |
| 18   | Agent          |
+------+----------------+
```

## Run only one stage
You can specify a signle step to be run directly from the command line, you need only to specify wich step. Remember to quote the step that is as you can see in the list stages and is case isensitive.

```shell
./installer run-stage --step="credentials"

Running on OS Version 18.04
You can see detailed log in /root/installer.log
Every step can take several minutes
Running credentials: ✔
Run time taken 00:00:00
+-------------------+------------------------------+
| name              | value                        |
+-------------------+------------------------------+
| Public IP         | [AN IP]                      |
| Password          | [A PASSWORD]                 |
| Database Password | [A DB PASSWORD]              |
+-------------------+------------------------------+
```

## Customized stages
You can create a custom stage list creating a yml with the desidered stages. For example if you want to install a Nginx/Mysql machine you can delete the agent installation.

> **Warning**
> All steps need to be run after credential steps that prepare the env, do not remove. The MySql and Agent step cannot be run twice if already installed, you need to purge > installation and the content. Alternatively the Agent can run twice only if you set the password and db password with the current already in use (see section below).

```shell
./installer config
Writing customizable /root/sculptor/installer.yml
```
Here the example file.

```yml
stages:
  - Credentials # Mandatory do not remove
  - SuUser
  - Motd
  - Ntp
  - Php
  - Packages
  - Sshd
  - NodeJs
  - Nginx
  - MySql
  - Redis
  - LetsSEncrypt
  - Composer
  - Deployer
  - Firewall
  - Crontab
  - CheckServices
  - Agent
```

You can additionally dump configuration stubs also, so you cand specify certain options forn nginx or other services; all date will be put in custom_templates folder.

```shell
./installer config --templates 
Customized configuration already exists /root/sculptor/installer.yml
Writing template /root/sculptor/custom_templates/agent-deploy.php
Writing template /root/sculptor/custom_templates/agent-env
Writing template /root/sculptor/custom_templates/env
Writing template /root/sculptor/custom_templates/file2ban.conf
Writing template /root/sculptor/custom_templates/index.html
Writing template /root/sculptor/custom_templates/motd
Writing template /root/sculptor/custom_templates/nginx.conf
Writing template /root/sculptor/custom_templates/ntp.conf
Writing template /root/sculptor/custom_templates/panel.crontab
Writing template /root/sculptor/custom_templates/php-pool.conf
Writing template /root/sculptor/custom_templates/php.ini
Writing template /root/sculptor/custom_templates/sshd.conf
Writing template /root/sculptor/custom_templates/sudoer.conf
Writing template /root/sculptor/custom_templates/system.scupltor.conf
```
Note: if one ore more files are already present will not be overweitter.


## Customize versions
You can modify the node version, installed globally and php versions as follows.

```yml
stages:
# PHP Versions
php_versions:
  # - 5.6
  # - 7.0
  # - 7.1
  # - 7.2
  # - 7.3
  # - 7.4
  # - 8.0
  # - 8.1  

# NodeJs Version
node_version: 14
```

## Customize other parameters
Sometime you need to run installer more times but remember that agent and mysql can run only once; in this case you can customize password to keep the same as the first installer run so installation will remain the same.
```yml
db_password: database_password
password: sudo_user_password
```

## Summary
|Command | Parameter | Description
|------------ | ------------- | -------------|
|***list-stages***| None |List all stages|
|***run***| None | Start a new installation|
|***run-stage***| --step="STEP NAME" | Run a single step, see list for names|
|***config***| --templates | Create a customizable installation.yml, with --templates will create a folder with all templates that can be customized.|
