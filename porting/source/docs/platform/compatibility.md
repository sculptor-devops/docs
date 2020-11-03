---
title: Compatibility
description: Sculptor devops hardware and software compatibility
extends: _layouts.documentation
section: content
---

# Compatibilty

We are compatible with LTS version of Ubuntu 18 and 20 to grant more secure and reliable installation. In general every x86/64 Ubuntu 18+ LTS is a compatible platform but if
you test with another cloud platform feel free to open an issue to update this compatibility table. 

#### Providers

| Provider            | Service | Architecture | **18.04**  | **20.04**  |
|---------------|---------|--------------|-------------------|-------------------|
| **Amazon**        | EC2     | x86_64       | **Yes** | ***Yes***                |
| **Digital Ocean** | Droplet | x86_64       | **Yes** | **Yes** |
| **ScaleWay**      | Instance| x86_64       | **Yes** | No               |
| **Vultr**      | Instance| x86_64       | **Yes** | No              |

#### Hardware
We tested sculptor with machine with at least 1GB of ram, 1CPU and 20GB of disk; Ubuntu will need 11GB of space to run, the rest if for your application.
Sculptor can easily run with 512MB or ram, the limitation is not the sculptor itself but composer ram usage when deploy, for small installations it may run
without problems.