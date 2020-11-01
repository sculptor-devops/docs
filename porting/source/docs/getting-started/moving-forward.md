---
title: Moving Forward
description: All domains commands
extends: _layouts.documentation
section: content
---


# Moving Forward

### Database
You may need a database to run your application, so you can create a database, a user and associtate this credentials to your domain.
This informations will be autocompleted into your .env file.

```shell
$ sudo sculptor domain:database example_db
Running domain database example_db: ✔

$ sudo sculptor domain:user example_db example_user
Running database user example.com: ✔

$ sudo sculptor domain:setup example.com database example_db
Running database user example.com database=example_db: ✔

$ sudo sculptor domain:setup example.com user example_user
Running domain configure example.com user=example_user: ✔
```

### Customize
You can customize the domain in two ways, the first is to setup domain properties with se command below. There are several settings you can change,
see [domain setup](/docs/domains) for more details.
```shell
$ sudo sculptor domain:setup example.com branch other
Running setup domain example.com branch=other: ✔
```
The second method is to customize configuration files in the ***configs*** directory, there you can change env, crontab, workers, web server configuration and deploy.