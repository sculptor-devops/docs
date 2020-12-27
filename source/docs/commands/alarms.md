---
title: Alarms
description: Sculptor devops system alarms
extends: _layouts.documentation
section: content
---

# Alarms

- [Create](#create)
- [Setup](#setup)
- [Show](#show)
- [Run](#run)
- [Rearm](#rearm)
- [Delete](#delete)

If you want to define an alarm that will be thrown if a condition is satisfacted you need to use this commands. An alarm is defined from two parts, an actions that ill be called and a condition to be satisfacted to act.
  
## Create {#create}
Whn you create a new alarm you can choose between a **bash** or **webhook** action; this derfine what kind of action the system will do when activated. The **bash** action will call a script that must be present in the system and will be run with sculptor user. If you define **webhook** the action will call an http endpoint, post or get defined by you.
```shell
$ sudo sculptor alarm:create bash
Create monitor bash: ✔

$ sudo sculptor alarm:create webhook
Create monitor webhook: ✔
```

## Show {#show}
To configure an alarm you need to create and then know the id assigned by the system, with this command you can see all configured alarms and its parameters.
```shell
$ sudo sculptor alarm:show
+-------+---------+-----------+-----------+----------------------+---------+--------+-------+
| Index | Type    | Name      | Condition | Cron                 | Alarmed | Rearm  | Error |
+-------+---------+-----------+-----------+----------------------+---------+--------+-------+
| 1     | bash    | bash_test | backup    | Every day at 12:00am | NO      | manual |       |
| 2     | webhook | No name   | backup    | Once an hour         | NO      | auto   |       |
+-------+---------+-----------+-----------+----------------------+---------+--------+-------+
```

## Setup {#setup}
Once created the actrion need to be configured, you have different parameters to determinate the constraint and parameters.
```shell
$ sudo sculptor alarm:setup 1 name "test_bash"
```
| Parameter | Description |
|-----------|-------------|
|**name**| The name of this alarm |
|**message**| The message to send if activated |
|**to**| Destination of the action |
|**condition**| The condition type check |
|**cron**| The linux cron activation cycle |
|**rearm**| The policy of rearm, auto or manual |

### Condition parameter values {#condition}
The first column can be addressed to condition partameter, the second is the parameter format. The formula use the  **::** separator for all parameters.
| Condition and parameters  | Description |
|-----------------------|-------------|
|**backup::BACKUP-ID::DAYS** | Chek a last successiveful backup age |
|**response-status::URL::CODE** | Check a page response coce |
|**response-time::URL::LIMIT(ms)** | Check a page response time |
|**system::NAME::LIMIT** | Monitor name can be cpu.load, disk.free, disk.total, io.tps, io.kbreads, io.kbwrtns, memory.total, memory.used, uptime.ticks |

> Every action, bash or webhook, will autocomplete a set of context variables such as limit and value reached; for bash this are env variables and for http querystring or post data.

## Run {#run}
Run an alarm manually, usuallyy to check parameters and functionality.
```shell
$ sudo sculptor alarm:run  1
```
## Rearm {#rearm}
If an alarm is set manual it will activate one time, then will wait an user action to reactivate.
```shell
$ sudo sculptor alarm:rearm 1
```
## Delete {#delete}
Delete an alarm.
```shell
$ sudo sculptor alarm:delete 1
```
