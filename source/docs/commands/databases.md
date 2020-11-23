---
title: Databases
description: Sculptor devops databases commands
extends: _layouts.documentation
section: content
---

# Databases
- [Create](#create)
- [Show](#show)
- [Delete](#delete)
- [Create user](#user)
- [Change user password](#password)
- [Delete user](#delete-user)

# Create {#create}
To create one db the operation is trivial, you need only to supply a name; the driver is for now implicit and support only MySql databases.
```shell
$ sudo sculptor database:create my_database
Creating domain my_database: ✔
```

## Show {#show}
```shell
$ sudo sculptor database:show
+-------------+-------+---------------+---------+
| Name        | Type  | Users         | Domains |
+-------------+-------+---------------+---------+
| my_database | mysql | user1         | none    |
+-------------+-------+---------------+---------+
```

## Delete {#delete}
If you delete a database you will also delete all associated database user.
```shell
$ sudo sculptor database:delete my_database
Deleting database my_database: ✔
```


## Create database user {#user}
A user can be created if associated to a database, you can specify the host and the password; generally you do not need to specify anything and a password will be generated automatically. For the current version of Sculptor only localhost is supported.
```shell
$ sudo sculptor database:user my_database user1
Creating user user1@localhost on my_database: ✔
Password generated: abc123456
```

## Change user password {#password}
As for creation, you can only specify database and user and a new password will be generated automatically.
```shell
$ sudo sculptor database:password  my_database user1
Password generated: abc123456
```

## Delete database user {#delete-user}
```shell
$ sudo sculptor database:delete_user my_database user1
Deleting user user1@localhost on my_database: ✔
```