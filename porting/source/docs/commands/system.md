---
title: System
description: Sculptor devops system commands
extends: _layouts.documentation
section: content
---

# System

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

## Configuration {#configuration}
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

system:configuration {operation} {name?} {value?}
show/get/set/reset/clear

## Daemons {#dameons}
system:daemons {operation=show} {name?}
show
use enable, disable, start, restart, reload, stop, status on database, web, queue, remote

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

## Monitors {#monitors}
system:monitors {operation=show}
reset/write/show/all

## Upgrades {#upgrades}
system:upgrades {operation=list}
list/check .. index

## Tasks {#tasks}
system:tasks {limit=25} {page=1}