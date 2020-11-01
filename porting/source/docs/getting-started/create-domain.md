---
title: First domain
description: All domains commands
extends: _layouts.documentation
section: content
---
# Create a domain

```shell
$ sudo sculptor domain:create example.com laravel
Running create domain example.com: ✔
```

### Setup repository
```shell
$ sudo sculptor domain:setup example.com vcs https://github.com/username/repository
Running setup domain example.com vcs=https://github.com/username/repository: ✔
```
> If you work with github we suggest to generate a 
> [personal access token](https://docs.github.com/en/free-pro-team@latest/github/authenticating-to-github/creating-a-personal-access-token)
> the url will look something like ***https://your-access-token@github.com/username/repository***

### Customize
You can customize the domain in two ways, the first is to setup domain properties with se command below. There are several settings you can change,
see [domain setup](/docs/domains) for more details.
```shell
$ sudo sculptor domain:setup example.com branch other
Running setup domain example.com branch=other: ✔
```
The second method is to customize configuration files in the ***configs*** directory, there you can change env, crontab, workers, web server configuration and deploy.

### Database

### Configure
Once you are ready with customizations you need to apply them to your domain with the command below.
```shell
$ sudo sculptor domain:configure example.com
Running domain configure example.com: ✔
```

### Deploy
```shell
$ sudo sculptor domain:deploy example.com
Running deploy configure example.com: ✔
```

### Finsh
Once deployed the deploy is finished your domain is ready and the site is running; now you can dig deeper in the commands to configure e.g. backups or crontabs.


[Moving forward &raquo;](/docs/getting-started/moving-forward)