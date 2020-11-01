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

### Configure
Once you are ready with customizations you need to apply them to your domain with the command below.
With this operaton sculptor will setup and prepare all conifugration files to prepare for the deploy.
```shell
$ sudo sculptor domain:configure example.com
Running domain configure example.com: ✔
```

### Deploy
This operation can take several minutes, all condifuration files will be put in production, you repository will be cloned and vendo package installed.
Afet this the domain is enabled and from now is available from the ourside.
```shell
$ sudo sculptor domain:deploy example.com
Running deploy configure example.com: ✔
```

### Finsh
Once deployed the deploy is finished your domain is ready and the site is running; now you can dig deeper in the commands to configure e.g. backups or crontabs.


[Moving forward &raquo;](/docs/getting-started/moving-forward)