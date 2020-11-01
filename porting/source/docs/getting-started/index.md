---
title: Installation
description: All domains commands
extends: _layouts.documentation
section: content
---

# Create the server
First fo all you need to login to your provider and create a machine, generally you need an Ubuntu 18.04 LTS or newer (see compatibility for more informations). 

# Installation

Login into your remote machine via SSH and paste this command, if you are in with a sudoer user (not root) run this command in the bash:

> All operations have to be done on a new clean machine, **DO NOT RUN** on already installed machine.
> If you are logged with the **ROOT** user you can remove the sudo command before **setup.sh**.

``` shell
$ wget -O setup.sh \
https://github.com/sculptor-devops/installer/releases/latest/download/setup.sh | \
sudo sh setup.sh
```

This operation will take several minutes to finish, at the end you will recive all credentias.
Save those data in a secure place. See advance usage to find additional options for installer customizations.

> If you want to install an older version see [releases](https://github.com/sculptor-devops/installer/releases) and replace **latest/download** in the url with **download/[version]**.
> e.g. https://github.com/sculptor-devops/installer/releases/download/v0.1.5/setup.sh

<asciinema :src="$withBase('/cast/installation_ubuntu18.cast')" cols="80" rows="24" speed="8" />


[Create your first domain &raquo;](/docs/getting-started)

