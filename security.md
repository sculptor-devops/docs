# Security

[[toc]]

## Preface
This model is what we aim for the 1.0 version of the Sculptor Devops System, will be implemented completely when main modules reach the stable beta release stage. This model can be customized using service config files, but the correct behavior is reach with this model.

## Ports and SSH
The list of port opened are simple http, https and ssh ports, initially ssh login is available for root user this due to the fact that some provider use this kind of authentication; if yo want you can rmeove the access tho this user and use ubuntu or anothe one. Remember that authentication is monitored by fail2ban service that firewall all user that hammer this specific port.


## Users
In the default installation there are three different users that come into play, www-data, www and sculptor. The first one, www-data, is the default Ubuntu user to serve http requests, is used for Sculptor Agent that is a Laravel Application. The second one, www, is created with no shell access and serve the pool of the web sites, all data are located in /home/www. The third is the privileged sculptor uses and isa a sudoer with no shell access, is used to serve system call that need elevete privilege.

## Privileged Queue
The agent spawn two services with different level of privileges, the first run with www-data (the same as the api) to run unprivileged operations such as notications or monitoring. Elevated privileges run under sulptor privileged user, this queue communicate with the agent with a queue worker so api agent is isolated from privileged queue.

## MySql
The database root password is stored in the sulptor privileged user home to let the queue work with the database, no other process can access or manage databases. Every database user created have only access to its own database and cannot share access to other datas.

## Redis
Thi service is installed to provide queue managemente and caching, is a key/value database; is not secured with password but security is granted by hash keys.

## Supervisor
Every site can define its own queue that run under supervisor, the user that run this process is the same of the sites pool.

## API
The model does allow crud operations on domains and database entity but will not access directly to the domains data such as db or files, this to maintain an elevate grade of isolation.

## Security Updates
System security updates are run by the system autonomously, only unattended security updates are run, other upgrades must be provided manually to have less breaking changs as possible.