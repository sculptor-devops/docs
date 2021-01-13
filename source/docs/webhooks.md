---
title: Webhooks
description: Sculptor devops Webhooks endpoints
extends: _layouts.documentation
section: content
---

# Webhooks {#webhooks}
You can setup an enpoint to let your git provider to send you a post when a push is done to your repository. In order to configure it, you need to check your domain configuration using the [domain:show](/docs/commands/domains/#show) command, see ***deploy url*** parameter.
```shell
$ sudo sculptor domain:show example.com
+-------------------+-----------------------------------------------------------+
| Name              | Value                                                     |
+-------------------+-----------------------------------------------------------+
| name              | example.com                                               |
| alias             | none                                                      |
| type              | laravel                                                   |
| status            | deployed (can switch to configured, deployed, deploying)  |
| certificate type  | self-signed                                               |
| certificate email | none                                                      |
| www               | YES                                                       |
| http user         | www                                                       |
| root              | /home/www/sites/example.com                               |
| current           | /home/www/sites/example.com/current                       |
| public            | /home/www/sites/example.com/current/public                |
| database          | none (user none)                                          |
| deploy command    | deploy                                                    |
| install command   | deploy:install                                            |
| git uri           | https://github.com/laravel/laravel.git                    |
| deploy url        | https://1.2.3.4:9443/webhooks/v1/deploy/abc1234/abc1234   |
| deploy provider   | github                                                    |
| deploy branch     | master                                                    |
+-------------------+-----------------------------------------------------------+
```
> In this case the URL il ***https://1.2.3.4:9443/webhooks/v1/deploy/abc1234/abc1234***

## Github {#github}
If your provider was set up to github (the default) you can follow the istructions of the documentation at [Github webhooks](https://docs.github.com/en/free-pro-team@latest/developers/webhooks-and-events/webhooks). You only need to open your repository ***settings***, then select ***Webhooks*** and press ***Add webhook***; once there, set the values as shown in the example below.

|Parameter                     | Value                                                   |
|------------------------------|---------------------------------------------------------|
|***Payload URL***             | https://1.2.3.4:9443/webhooks/v1/deploy/abc1234/abc1234 |
|***Content type***            | application/json                                        |
|***Enable SSL verification*** | No, set to Disable (not recommended)                    |

## Custom {#custom}
If you have another git repository provider, you can use it in the same way but remember that all controls and check validations will not be done by the custom provider and the branch corrispondence will not be granted. To change these settings of the domain see [setup](/docs/commands/domains/#setup) command and set provider to custom.
