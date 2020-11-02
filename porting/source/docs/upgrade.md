---
title: Upgrade
description: Sculptor devops upgrades
extends: _layouts.documentation
section: content
---
# Upgrade

For the 0.x version the upgrade is done by entering the main agent folder and run the deploy command.

```shell
$ cd /var/www/html

$ sudo dep deploy
✈︎ Deploying master on localhost
✔ Executing task deploy:prepare
✔ Executing task deploy:lock
✔ Executing task deploy:release
✔ Executing task deploy:update_code
✔ Executing task deploy:shared
✔ Executing task deploy:writable
✔ Executing task deploy:vendors
✔ Executing task deploy:clear_paths
✔ Executing task deploy:symlink
✔ Executing task deploy:unlock
✔ Executing task deploy:owner
✔ Executing task cleanup
Successfully deployed!

$ sudo dep deploy:migrate
✔ Executing task deploy:migrate
```
