---
title: System
description: Sculptor devops system commands
extends: _layouts.documentation
section: content
---

# System

- [Configuration](#configuration)
- [Users](#user)
- [Daemons](#dameons)
- [Events](#events)
- [Tasks](#tasks)
- [Monitors](#monitors)
- [Upgrades](#upgrades)
- [Firewall](#firewall)

Sculptor caracteristics can be consulted using the command below, will show the summary of the installed system.
```shell
$ sudo sculptor system:info
+-------------------+---------------------------+
| Name              | Value                     |
+-------------------+---------------------------+
| Name              | Sculptor Devops           |
| URL               | https://192.168.1.10:9443 |
| PHP               | 7.4                       |
| DB                | mysql                     |
| Command version   | 1                         |
| API version       | 0                         |
| Blueprint version | 1                         |
| Operating system  | 20.04.1 LTS (Focal Fossa) |
| Architecture      | x86_64 64 bit             |
+-------------------+---------------------------+
```

## User {#user}
You need to authenticate to use rest API, so you need to create a user.
```shell
$ sudo sculptor system:user create user@example.com

$ sudo sculptor system:user password user@example.com

$ sudo sculptor system:user delete user@example.com

$ sudo sculptor system:user show
```
You may also need to manage user generated token, you can list and revoke.
```shell
$ sudo sculptor system:user token user@example.com

$ sudo sculptor system:user revoke 123abc
```

## Configuration {#configuration}
There are some values that can be customized, you can see the current status with this command.
```shell
$ sudo sculptor system:configuration show
```
| Parameter | Description |
|-----------|-------------|
|**sculptor.domains.state-machine**| Enable or disable the domain state check|
|**sculptor.security.hash**| Hashing algorithm used by the php hash funciton|
|**sculptor.security.password.min**| Minumum password length|
|**sculptor.security.password.max**| Maximum password length|
|**sculptor.monitors.rotate**| How many minutes of system monitor to retain in memory|
|**sculptor.backup.archive**| Which archive driver to use, local or s3|
|**sculptor.backup.temp**| The local path to use as temp for backup compression|
|**sculptor.backup.compression**| Type of compression, for now only zip is supported|
|**sculptor.backup.drivers.default**| Default archive driver|
|**sculptor.backup.drivers.local.path**| Where the local archive driver put backup|
|**sculptor.backup.drivers.s3.path**| Where the s3 archive driver put backup|
|**sculptor.backup.drivers.s3.key**| S3 key|
|**sculptor.backup.drivers.s3.secret**| S3 secret|
|**sculptor.backup.drivers.s3.region**| S3 region|
|**sculptor.backup.drivers.s3.endpoint**| S3 https endpoint|
|**sculptor.backup.drivers.s3.bucket**| S3 bucket name|

Each values can be changed using ***set*** operation; this value can be also restored to default using ***reset*** option in the command example below. You can also ***clear*** all setting restoring to default values.

```shell
$ sudo sculptor system:configuration set sculptor.security.hash sha256

$ sudo sculptor system:configuration reset sculptor.security.hash

$ sudo sculptor system:configuration clear
```

If you prefer the ***.env*** approach you can edit the application directly editing this file, for details on every single parameter see ***config/sculptor.php*** file; in this case the blueprint will backup in the same way but not will be restored the same way, you will have to redo it manually.


## Daemons {#dameons}
System daemons are gouped by type, all web related one or queue related, with this command you can do the operation such as restart or reloat to all related services.
```shell
$ sudo sculptor system:daemons show
Running  show: ✔
+------------+----------+---------+
| Service    | Group    | Running |
+------------+----------+---------+
| mysql      | DATABASE | YES     |
| nginx      | WEB      | YES     |
| php7.4-fpm | WEB      | YES     |
| redis      | QUEUE    | YES     |
| supervisor | QUEUE    | YES     |
| ssh        | REMOTE   | YES     |
| fail2ban   | REMOTE   | YES     |
+------------+----------+---------+
show
use enable, disable, start, restart, reload, stop, status on database, web, queue, remote
```
Valid groups are ***database***, ***web***, ***queue***, ***remote*** (see show command to see related services). On every group you can run ***enable***, ***disable***, ***start***, ***restart***, ***reload***, ***stop***, ***status*** as normal daemons command.

## Events {#events}
You can access to recet events from the command line, default page is 25 row long and paginated, you can specify the page ad second parameter.
```shell
$ sudo sculptor system:events
+------------------+---------+-------+-----------------------------+
| Date/Time        | Tag     | Level | Message                     |
+------------------+---------+-------+-----------------------------+
| 2020-11-02 10:51 | actions | info  | Create database my_database |
+------------------+---------+-------+-----------------------------+
```

## Tasks {#tasks}
As seen for events also tasks can be shown to see status or errors; those tasks run within an hi privileged queue to manage the machine and every row represents a job such as change domain configuration, deploy, backup ad so on.
```shell
$ sudo sculptor system:tasks
```

## Monitors {#monitors}
Every minute the system sample a group of monitors that you can consult to know the machine state history; for the number of samples retained see the syem configuration parameter ***sculptor.monitors.rotate***. The command with no parameters show the last sample.
```shell
$ sudo sculptor system:monitors
Monitors show: ✔
+-------------+---------------------+
| Monitor     | Value               |
+-------------+---------------------+
| Cpu load    | 0.11                |
| sda free    | 49GB                |
| sda total   | 62GB                |
| sda tps     | 3.58                |
| sda reads/s | 35.86 kB            |
| sda write/s | 71.14 kB            |
| Ram total   | 2GB                 |
| Ram used    | 781MB               |
| Uptime      | 3 d 0 h 4 m         |
| Timestamp   | 2020-10-30 11:15:02 |
+-------------+---------------------+
```

> Monitors are stored in memory, do not raise too mouch rotate value!

You can also see all samples in memory by running a ***all*** operation, all columns will be human readable. Use ***reset*** command to clear all the sampled data.
```shell
$ sudo sculptor system:monitors all
Monitors all: ✔
+----------+----------+-----------+---------+-------------+-------------+-----------+----------+---------------+---------------------+
| Cpu load | sda free | sda total | sda tps | sda reads/s | sda write/s | Ram total | Ram used | Uptime        | Timestamp           |
+----------+----------+-----------+---------+-------------+-------------+-----------+----------+---------------+---------------------+
| 0.04     | 49GB     | 62GB      | 3.58    | 36.35 kB    | 71.66 kB    | 2GB       | 766MB    | 2 d 23 h 5 m  | 2020-10-30 10:16:02 |
| 0.15     | 49GB     | 62GB      | 3.58    | 36.34 kB    | 71.66 kB    | 2GB       | 766MB    | 2 d 23 h 6 m  | 2020-10-30 10:17:01 |
+----------+----------+-----------+---------+-------------+-------------+-----------+----------+---------------+---------------------+

$ sudo sculptor system:monitors reset
```

## Upgrades {#upgrades}
The system perform autonomous unattended upgrades and there is no need to act in any direction. But you can need to know when performed and which package were
upgraded. With this commads you can have a log of each performed upgrade and you can see the detail of every operation.
```shell
$ sudo sculptor system:upgrades
+-------------------+--------+
| Setting           | Status |
+-------------------+--------+
| Active            | YES    |
| Upgraded recently | NO     |
+-------------------+--------+
+-------+-----------------------------------+----------+
| Index | Event                             | Packages |
+-------+-----------------------------------+----------+
| 1     | Thu Oct 08 2020 06:52:39 GMT+0000 | 13       |
| 2     | Thu Oct 15 2020 06:49:18 GMT+0000 | 20       |
| 3     | Fri Oct 16 2020 06:37:21 GMT+0000 | 0        |
| 4     | Wed Oct 21 2020 06:09:42 GMT+0000 | 9        |
| 5     | Tue Oct 27 2020 06:33:54 GMT+0000 | 4        |
| 6     | Wed Oct 28 2020 06:13:46 GMT+0000 | 7        |
| 7     | Thu Oct 29 2020 06:25:31 GMT+0000 | 2        |
+-------+-----------------------------------+----------+

Use system:upgrades <INDEX> to show complete event

$ sudo sculptor system:upgrades 7
+------------------------------------------------------------------------------------------+
| Selecting previously unselected package linux-modules-5.4.0-51-generic.                  |
| .....                                                                                    |
| Processing triggers for php7.4-fpm (7.4.3-4ubuntu2.4) ...                                |
+------------------------------------------------------------------------------------------+
Package upgraded
+----------------------------------------------------+
| linux-headers-5.4.0-51 (5.4.0-51.56)               |
| linux-modules-5.4.0-51-generic (5.4.0-51.56)       |
| linux-headers-5.4.0-51-generic (5.4.0-51.56)       |
| linux-headers-generic (5.4.0.51.54)                |
| linux-image-5.4.0-51-generic (5.4.0-51.56)         |
| linux-modules-extra-5.4.0-51-generic (5.4.0-51.56) |
| linux-image-generic (5.4.0.51.54)                  |
| linux-generic (5.4.0.51.54)                        |
| php7.4-common (7.4.3-4ubuntu2.4)                   |
| php7.4-mysql (7.4.3-4ubuntu2.4)                    |
| php7.4-bcmath (7.4.3-4ubuntu2.4)                   |
| php7.4-readline (7.4.3-4ubuntu2.4)                 |
| php7.4-mbstring (7.4.3-4ubuntu2.4)                 |
| php7.4-zip (7.4.3-4ubuntu2.4)                      |
| php7.4-opcache (7.4.3-4ubuntu2.4)                  |
| php7.4-sqlite3 (7.4.3-4ubuntu2.4)                  |
| php7.4-json (7.4.3-4ubuntu2.4)                     |
| php7.4-xml (7.4.3-4ubuntu2.4)                      |
| php7.4-cli (7.4.3-4ubuntu2.4)                      |
| php7.4-fpm (7.4.3-4ubuntu2.4)                      |
+----------------------------------------------------+
Between 2020-10-15 06:48:07 and 2020-10-15 06:50:01
```

## Firewall {#firewall}
Unde the hood Sculptor use uwf and it setup on the installer stage. You can manage with a simple command line interface to ***show***, ***reset***, ***enable*** and ***disable***.
```shell
$ sudo sculptor system:firewall
Firewall show: ✔
Active YES
+-------+-------------------------------------------------------------------+
| Index | Rule                                                              |
+-------+-------------------------------------------------------------------+
| 1     | 9443/tcp                   ALLOW IN    Anywhere                   |
| 2     | 22/tcp                     ALLOW IN    Anywhere                   |
| 3     | 80/tcp                     ALLOW IN    Anywhere                   |
| 4     | 443/tcp                    ALLOW IN    Anywhere                   |
| 5     | Nginx Full                 ALLOW IN    Anywhere                   |
| 6     | 9443/tcp (v6)              ALLOW IN    Anywhere (v6)              |
| 7     | 22/tcp (v6)                ALLOW IN    Anywhere (v6)              |
| 8     | 80/tcp (v6)                ALLOW IN    Anywhere (v6)              |
| 9     | 443/tcp (v6)               ALLOW IN    Anywhere (v6)              |
+-------+-------------------------------------------------------------------+
```
