---
title: Deploy
description: Sculptor devops deploy commands
extends: _layouts.documentation
section: content
---

# Deploy

- [Structure](#structure)
- [Crontab](#crontab)
- [Worker](#worker)
- [Enable](#enable)
- [Disable](#disable)

Under the hood Sculptor uses [php deployer](https://deployer.org/docs/getting-started.html) to run all code provisioning operations such as
clone, pull and subsequent operations; e.g. php artisan migrate for a Laravel application. The deploy script is customizable in the ***configs/deployer.php***.
After that you need to run [configure command](/docs/commands/domains/#configure). Deployer runs a series of stages to run the provisioning, the standard command that runs the default stage is ***deploy***. The default stages are two, the first is the ***install*** stage that run the first time the system pulls your code,
then the ***deploy*** is always used.

```shell
$ sudo sculptor domain:deploy example.com
```

The default stage to run is saved in [domain preferences setup](/docs/commands/domains/#setup) but can be customized in the command on the fly to run a spot stage.
```shell
$ sudo sculptor domain:deploy example.com deploy:mystage
```

After this command the domain is enabled and reachable from the web, webserver configuration is deployed with the logrotate service properties.

#### Directory structure {#structure}
Deployer use specific folder to run, the main is ***releases*** that contain all the pulls the system ever done from the beginning. To achieve zero downtime deploy
the current pull is linked to the ***current*** directory. Another important folder is the ***shared*** one, there is all data that your application needs to write to disk. When you pull your sources you need to maintain these files as the previous version, so all data that need to be written to disk are mapped as a link to this folder. For instance ***.env*** file and ***storage*** folders for a Laravel application are linked from ***shared/.env*** and ***shared/storage*** to current directory.
```shell
$ ls -l /home/www/sites/example.com/
lrwxrwxrwx 1 www www 40 Oct 27 13:17 current -> /home/www/sites/example.com/releases/11

$ ls -la /home/www/sites/example.com/current/
lrwxrwxrwx  1 www www 40 Oct 27 13:16 .env -> /home/www/sites/example.com/shared/.env
lrwxrwxrwx  1 www www 43 Oct 27 13:16 storage -> /home/www/sites/example.com/shared/storage

$ ls -l /home/www/sites/example.com/releases/
drwxr-xr-x 12 www www 4096 Oct 27 13:09 10
drwxr-xr-x 12 www www 4096 Oct 27 13:17 11
drwxr-xr-x 12 www www 4096 Oct 27 13:03 7
drwxr-xr-x 12 www www 4096 Oct 27 13:04 8
drwxr-xr-x 12 www www 4096 Oct 27 13:07 9
```
As you can see in ***releases*** folder only a limited number of pull will be retained, you can customize this numeber in ***configs/deployer.php*** (default is 5).

## Crontab {#crontab}
When you need do specify a crontab for your user, you need to customize ***configs/crontab*** files and run ***configure** command. To apply modifications to the system you need to run this command. Note that is not domain specific, due to the fact that many domains can share the same system user so crontab is common for these domains.
```shell
$ sudo sculptor domain:crontab
```

## Worker {#worker}
Applications such as Laravel can have a Queue system that needs to be configured under supervisor. Similar to crontab, you can customize ***configs/worker*** file and run ***configure***. Then you can enable (or disable) the domain specific supervisor configuration with the command below.
```shell
$ sudo sculptor domain:worker example.com enable
```

## Enable {#enable}
This command runs every time at the end of deploy command, but you can run it manually in the case you disabled it.
```shell
$ sudo sculptor domain:disable example.com
```

## Disable {#disable}
When disabled webserver configurations are removed from active sites, along with logrotate.
```shell
$ sudo sculptor domain:enable example.com
```
