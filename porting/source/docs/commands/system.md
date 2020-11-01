---
title: Domains
description: All domains commands
extends: _layouts.documentation
section: content
---

# System


system:daemons {operation=show} {name?}
show
use enable, disable, start, restart, reload, stop, status on database, web, queue, remote

system:configuration {operation} {name?} {value?}
show/get/set/reset/clear

system:events {limit=25} {page=1}

system:monitors {operation=show}
reset/write/show/all

system:upgrades {operation=list}
list/check .. index

system:tasks {limit=25} {page=1}

system:info


        'sculptor.domains.state-machine',
        'sculptor.security.hash',
        'sculptor.security.password.min',
        'sculptor.security.password.max',
        'sculptor.monitors.rotate',
        'sculptor.backup.archive',
        'sculptor.backup.temp',
        'sculptor.backup.compression',
        'sculptor.backup.drivers.default',
        'sculptor.backup.drivers.local.path',
        'sculptor.backup.drivers.s3.path',
        'sculptor.backup.drivers.s3.key',
        'sculptor.backup.drivers.s3.secret',
        'sculptor.backup.drivers.s3.region',
        'sculptor.backup.drivers.s3.endpoint',
        'sculptor.backup.drivers.s3.bucket'