# Installation

Login into your remote machine via SSH and paste this command, if you are in with a sudoer user (not root) run this command in the bash:

``` bash
wget -O setup.sh https://github.com/sculptor-devops/installer/releases/latest/download/setup.sh | sudo setup.sh
```

If you are in with the **root** user you can remove the sudo command before **setup.sh**. This operation will take several minutes to finish, at the end you will recive all credentias. Save those data in a secure place. Seee advance usage to find additiona options for installer customizations.

::: warning
All operations have to be done on a new clean machine, **DO NOT RUN** on already installed machine.
:::
