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