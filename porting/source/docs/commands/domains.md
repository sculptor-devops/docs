---
title: Domains
description: Sculptor devops domains commands
extends: _layouts.documentation
section: content
---

# Domains {#domains}

- [Create](#create)
 - [Directory structure](#structure)
- [Show](#show)
- [Setup](#setup)
 - [Parameters](#setup-parameters)
 - [Edit templates](#edit-templates)
 - [Placeholders](#placeholders)
- [Configure](#configure)
- [Delete](#delete)

Ay domain is a web server host that have some properties like alias or SSL certificates.
The domain have a life cycle that is shown by the figure below. Generally you create it, you setup your parameters and condifurations, you apply those preferences
and deploy to production pulling sources. The system take care that every step is respected and will check every state change.

![domain states](/assets/img/states.png)

## Create (New) {#create}
This command will create site home, configurations, files templates and base a certificate. No web server setup will be done at this stage,
you will need to use ***setup*** and ***configure*** before ***deploy*** it. Parameters accepted are ***laravel*** and ***generic***.

```shell
$ sudo sculptor domain:create example.com laravel
Running create domain example.com: ✔
```

> Every specialized domain type such as ***laravel*** have a standard and functional set of configurations
> if you use ***generic*** keep in mind that before deploy you need to setup at least the deployer.php file accordingly with your needs.

#### Directory structure {#structure}
Create command will create this directory structure; cert and logs are folders used by the webserver. Config is a template directory,
it contains templates of all your domain configuration; if you need to customize something you should do it here. In the root of the
domain you will find the compiled files that all services will use, are created from the configs folder files. Shared folder is the path where your application have to write all data, see delply for more informations. 
Current and releases are not present at the beginning, those folders are needed by the deploy stage that will pull sources from you repository.
```shell
$ cd /home/www/sites/example.com
$ ls -l
certs/
        example.com.crt
        example.com.key
configs/
        env
        deployer.php
        logrotate.conf
        nginx.conf
        cron.conf
        worker.conf
logs/
        access_log
        error_log
shared/
        .env
        storage/
cron.conf
worker.conf
deploy.php
releases/
current/
```

> Do not remove any of the created files or folders, all error can stop the web server and all domains!

## Show {#show}
You can list all domains with this command, without parameters all domains will be shown but you can specify a domain name and a complete list of
parameters will show up. When you show a specific domain some of the fields are calculated such as deploy url or root domain.

```shell
$ sudo sculptor domain:show 
+--------------+-------+---------+----------+----------+------+
| Name         | Alias | Type    | Status   | Database | User |
+--------------+-------+---------+----------+----------+------+
| example.com  | none  | laravel | deployed | none     | none |
+--------------+-------+---------+----------+----------+------+

$ sudo sculptor domain:show example.com
+------------------+-----------------------------------------------------------+
| Name             | Value                                                     |
+------------------+-----------------------------------------------------------+
| name             | example.com                                               |
| alias            | none                                                      |
| type             | laravel                                                   |
| status           | deployed                                                  |
| certificate type | self-signed                                               |
| www              | NO                                                        |
| user             | www                                                       |
| root             | /home/www/sites/example.com                               |
| http user        | none                                                      |
| home             | /home/www/sites/example.com/current/public                |
| database         | none                                                      |
| deploy command   | deploy                                                    |
| install command  | deploy:install                                            |
| git uri          | https://github.com/laravel/laravel.git                    |
| deploy url       | https://192.168.1.100:9443/api/v1/deploy/abcd123/123456   |
| deploy branch    | master                                                    |
+------------------+-----------------------------------------------------------+
```

## Setup {#setup}
Every domain is created with a standard bunch of parameters, if you need to customize some you have to use ***setup*** to change it.
For example if you need to change aliases, domain type or git url you need to use this command. You can use this command in every
domain state, after it you need to run ***configure*** to apply changes to the configuration files. 

```shell
$ domain:setup example.com alias other-example.com
Running domain setup example.com alias=other-example.com: ✔
```

#### Valid parameters {#setup-parameters}

| Parameter  | Default | Values | Description |
|-------------|-------------|-------------|
|**type**|laravel|laravel, generic|this parameter will be used to determinate site template|
|**alias** | null | space separated domain | all the aliases of the domain that we have created, this parameter will be added to server host in web server configuration|
|**www**|true|true, false|if you set this to true the system will setup example.com and www.example.com site names, if is false only main name and aliases will be used|
|**certificate**|self-signed|self-signed, custom, lets-encrypt| you can load your custom certificates if you need to.|
|**email**| null| string| this address is needed in case of Let's Encrypt certificate, to provide an email address for the registration.|
|**vcs**| git url| string | this is the git url of your repository, you can use every git compatible provider such as GitHub, GitLab, Bitbucket or a custom one.|
|**branch**| master| string| this parameter is needed by the system to know what to clone and in case of use of the push webhook to monitor changes.|
|**deployer**| deploy | string| this is the parameter passed to the deployer command to run this stage; see deploy section for more informations. |
|**install**| deploy:install| string| is the same of the deployer parameter but only used the first time e.g. when you need to do generate key in a laravel application. |
|**token**| autogenerated| string| is the secret token used in the git webhook to secure the post, in the creation stage the token is setup automatically.|
|**provider**| github| github, custom| is the git provider, needed by the webhook to validate the request, valid values are custom and github. |
|**home**| public| string |it the folder used by the webserver to show on the web, the default is public.|
|**database**| null| string| is the database that the application will use, must be a valid one.|
|**user**| null| string | is the user needed by the database parameter to access to the db.|


#### Edit Templates {#edit-templates}
In the ***configs/*** (see directory structure) folder you can apply your modifications to fit your needs, after this operation you can run ***configure*** to create the new configurations. In all files you can use some
placehoders to auto complete some values. For instance when you crete a **.env** file you need to add database, user and password to create a valid and functional file; sculptor do it for you
completing those parameters with the setup of the domain, so you don't need to know passwords or remember user or database that are stored elsewhere and linked to your domain.

#### Placeholders {#placeholders}
| Parameter  | File | Description |
|------------|------|-------------|
|**{DOMAINS}**|all|aa|
|**{URL}**|all| The mail url of the domain https://example.com|
|**{USER}**|all| The system user that run every script tha for now is always www|
|**{NAME}**|all| The domain name as recorded on the db|
|**{PATH}**|all| The system root path e.g /home/www/sites/example.com |
|**{HOME}**|all| The home as recorded in the db, the default is public |
|**{PUBLIC}**|all| The home directory e.g. /home/www/sites/example.com/current/public |
|**{REPOSITORY}**|deployer.php| The url of the repository, see vcs setup parameter |
|**{BRANCH}**|deployer.php| The branch of the repository, see branch setup parameter |
|**{DATABASE}**|env| The name of the database linket to this domain |
|**{DATABASE_USERNAME}**|env| The username lined to tho this domain |
|**{DATABASE_PASSWORD}**|env| The user associated password |          
|**{DOMAINS}**|nginx.conf| The list of domains and alias e.g. example.com www.example.com example2.com|
|**{CERTIFICATE}**|nginx.conf| The complete path of the certificate file |
|**{CERTIFICATE_KEY}**|nginx.conf| The complete path of the key file |
|**{RETAIN}**|logrotate.conf| How many days of log you want to maintain |
|**{COUNT}**|worker| The number of workers to spawn |

## Configure {#configure}
When you ***setup*** a domain or modify a template configuration you need to run configure to apply those modifications. All files will be created or updated in the site root path. 
```shell
$ sudo sculptor domain:configure example.com
Running domain condifugre example.com: ✔
```

## Delete {#delete}
This operation will remove the domain from web server hosts and delete the root folder of the domain, database and user will remain intact.
```shell
$ domain:delete example.com
Running domain delete example.com: ✔
```

