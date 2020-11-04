---
title: Repository
description: Sculptor setup git repository
extends: _layouts.documentation
section: content
---

# Repository Setup
This topic is strictly related to the deploy and its instument that is [deployer php](https://deployer.org/). Every domain must have its deploy.php file with stages and repository setup. At the top fo the file you will find this directive:

```php
set('repository', 'https://github.com/laravel/laravel.git');
```

For a public repository the clone is not a problem, but with a preivate one you need some step forward to permit autentication.

### Personal access token {#personal-access-token}
Some git hoster like GitHub let you to create a [personal access token](https://docs.github.com/en/free-pro-team@latest/github/authenticating-to-github/creating-a-personal-access-token) from your security settings, this token can act like your account so, to be safe, grant only read access.

```php
set('repository', 'https://<<MY-ACCESS-TOKEN>>@github.com/laravel/laravel.git');
```

### Deploy keys {#deploy-keys}
You can setup a specific key for a repository like [deploy key](https://docs.github.com/en/free-pro-team@latest/developers/overview/managing-deploy-keys) function of GitHub. Once generated you need to put your key in the root of your domain e.g. id_rsa. Then you need to add an env variable to the deploy.php file: note that in the repository you need to use git url not https one.

```php
set('repository', 'git@github.com:<<USERNAME>>/laravel/laravel.git');

set('env', [
    'GIT_SSH_COMMAND' => 'ssh -i /home/www/sites/example.com/id_rsa'
]);
```

Alternatively you can crate a whole ssh configuration file that you can also put in domain root aside the id_rsa that you generated.

```bash
Host github.com
   StrictHostKeyChecking no
   UserKnownHostsFile=/dev/null
   IdentityFile /home/www/sites/example.com/id_rsa
```

in this case you will need to edit the deploy.php file with the same env but with -F option to use a config file istead a key only.

```php
set('repository', 'git@github.com:<<USERNAME>>/laravel/laravel.git');

set('env', [
    'GIT_SSH_COMMAND' => 'ssh -F /home/www/sites/example.com/ssh_config'
]);
```


#### Username and Password {#user-password}
To autenthicate using http you can specify user and password in the git url. This is the wrost practice and is discuraged, use only if no other way work.

```php
set('repository', 'https://<<USERNAME>>:<<PASSWORD>>@github.com/laravel/laravel.git');
```