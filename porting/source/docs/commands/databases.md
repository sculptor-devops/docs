---
title: Domains
description: All domains commands
extends: _layouts.documentation
section: content
---

# Databases

database:create {name}

database:show

database:delete {name}

Database Users

database:user {database} {name} {host=localhost} {password?}

database:password {database} {name} {password} {host=localhost}

database:delete_user {database} {name} {host=localhost}