---
title: First domain
description: Sculptor devops create your first domain
extends: _layouts.documentation
section: content
---
# Create a domain
The first thing you need to create is a domain, it represents the host that will be shown by the webserver and all associated services.
Launching this command will create directory structure, configurations and deploy procedures.
```shell
$ sudo sculptor domain:create example.com laravel
Running create domain example.com: ✔
```

### Setup repository
If all default preferences are fine for you, the mininum setup is to define your git repository as follow.
```shell
$ sudo sculptor domain:setup example.com vcs https://github.com/username/repository
Running setup domain example.com vcs=https://github.com/username/repository: ✔
```
> If you work with github we suggest to generate a 
> [personal access token](/docs/repository/#personal-access-token)
> or [deploy key](/docs/repository/#deploy-keys), you can find more detailed istruction in [repository](/docs/repository) section

### Configure
Once you are ready with customizations, you need to apply them to your domain with the command below.
With this operaton sculptor will setup and prepare all conifugration files to prepare for the deploy.
```shell
$ sudo sculptor domain:configure example.com
Running domain configure example.com: ✔
```

### Deploy
This operation can take several minutes, all condifuration files will be put in production, your repository will be cloned and vendor package installed.
After this the domain is enabled and available from the outside.
```shell
$ sudo sculptor domain:deploy example.com
Running deploy configure example.com: ✔
```

### Finish
Once the deploy is finished your domain is ready and the site is running; now you can dig deeper in the commands to configure additional features (e.g. backups or crontabs).


[Moving forward &raquo;](/docs/getting-started/moving-forward)
