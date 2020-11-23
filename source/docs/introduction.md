---
title: Introduction
description: Sculptor devops introduction
extends: _layouts.documentation
section: content
---

# Introduction
This echosystem is designed for developers to automate site deploy and complete server management, it control all the normal operations such as site add, remove, deploy and maintenance. With a simple command line interface (or api) you can install in minutes and controll all the machine; with this structure you can automate and controll from one to infinite servers. Differently from SaaS external services, that remote manage the machine, here you have complete control no need to share credentials with no one; even if you control from the outside with api all is designed to isolate your data and credentials with no need to manage from api; this help you to guarantee strict privacy to your customers or help with GDPR compliance.

```shell
$ sudo sculptor system:info
```

Under the hood Sculptor is a Laravel application, called **Agent**, that have a queue, crons and a command line that you can reach everyware in the system.
The installation is also a Laravel (Zero) application that prepare and setup the agent called **Installer**. Once sucessfully installed the agent can setup domains, databases, cron, workers and setup with a monitoring.

### Out of the box
|||
|--------|-------|
|**OS**| Compatible with LTS Ubuntu 18.04 and 20.04 |
|**All services you need**| PHP 7.4, MySQL, Nginx, Redis, Supervisor|
|**Security**| Unattended upgrades, anti hammering|
|**Deploy**| Zero downtime deploy, webhook provisioning|
|**Customizable**| Apply your preferences from web server to deploy|
|**Repository**| Git integrated|
|**Certificate**| From custom to Let's Encrypt automation|
|**Backup**| Automated on ftp, s3, dropbox|
|**Monitor**| Store system kpi fro surveillance |

[Getting started &raquo;](/docs/getting-started)