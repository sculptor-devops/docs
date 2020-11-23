---
title: Backups
description: Sculptor devops backup commands
extends: _layouts.documentation
section: content
---

# Backups

- [Create](#create)
- [Show](#show)
- [Setup](#setup)
- [Driver](#driver)
- [Run](#run)
- [Blueprint](#blueprint)
- [Delete](#delete)

You can create a backup job like you did with a domain by running a command; backups can be of three different types. The first is ***database*** and it will backup the specified database. The second is ***domain*** and do the same thig as the database backup do but for files; so if you want to backup an entire site you need to create a domain backup and a database backup, this due to the fact that a database can be attached to more than one domain. Domain backup will take care of the configurations in ***configs*** path and file in ***shared*** folder; this because all your application storage must be mapped on this directory (see [deploy](/docs/commands/deploy#structure) for more informations). The third type is the ***blueprint*** type and is meant to create a backup of all metadata of the Sculpture installation; with this backup you can recreate a mirror of the machine in minutes.


> Every backup is a full backup, there is no concept of incremental, this due to simplification of machine management.

## Create {#create}
A backup task can be created simply by calling the command below, database or domain want a second parmeter to specify the backup subject; a blueprint target always system metadata.
```shell
$ sudo sculptor backup:create database my_database
Creating backup batch database for my_database: ✔
```

## Show {#show}
From here you can see all backup state and see if something gone wrong, you can also see the backup configurations.
```shell
$ sudo sculptor backup:show
+-------+-----------+----------+-----------+-------------------+------+------------+-------+
| Index | Type      | Resource | Cron      | Destinat | Status | Size | Run        | Error |
+-------+-----------+----------+-----------+-------------------+------+------------+-------+
| 1     | database  | my_db    | 0 0 * * * | /backups | ok     | 10kB | 2020-10-22 |       |
| 5     | blueprint | system   | 0 0 * * * | /backups | ok     | 30kB | 2020-10-23 |       |
+-------+-----------+----------+-----------+-------------------+------+------------+-------+
```

## Setup {#setup}
As for domains a backup have some properties that you can customize such as cron time, maximum number of archive to retain and the destination.
```shell
$ sudo sculptor backup:setup 1 cron "12 0 * * *"

$ sudo sculptor backup:setup 1 rotate 30

$ sudo sculptor backup:setup 1 destination "/backup/my_db"
```

#### Driver {#driver}
Sculptor support local backup but also an S3 storage, you can define the configuration of this two drivers from [system configuraiton](/docs/commands/system/#configuration); the default driver is the local disk.

## Run {#run}
Due to the fact that a backup is an hevy and long running task the operation il append the operation and exit, you will need to monitor the state with the ***show*** command.
```shell
$ sudo sculptor backup:run 1
Appending backup batch 1: ✔
```

## Blueprint {#blueprint}
Sculptor can make a complete metadata backup of each domain and database (without the data) so you can create or recover a machine from a disaster. This backup can be scheduled but also you can run directly. With metadata the system will copy all ***configs*** files and certificates.
```shell
$ sudo sculptor backup:blueprint create /tmp/server_blueprint.yml
Blueprint create: /tmp/server_blueprint.yml: ✔
```
From a previous blueprint you can reload all the metadata a command must be run recreate all the domains, database and configurations. After this command the system is fresh new and you need to run configure and deploy for each domain with a database data restore. After the load operation all command done will be shown.
```shell
$ sudo sculptor backup:blueprint load /tmp/server_blueprint.yml
Blueprint load: /tmp/server_blueprint.yml: ✔
```
> Do not run ***load*** command in a production or a ***not empty*** machine, you can lose evrything!

## Delete {#delete}
```shell
$ sudo sculptor backup:delete 1
```