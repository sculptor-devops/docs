---
title: Contribute
description: Sculptor devops contribuion guide
extends: _layouts.documentation
section: content
---

# Contribute
You can send any request on [issue](https://github.com/sculptor-devops/installer/issues) regarding problems, questions or ideas, feel free to propose.
To develope or send pull requests run this checklist before submit code variations or new features.

```shell
$ cd sculptor
$ composer run phpcs
$ composer run phpmd
$ composer run phpstan
$ composer run test
```

Remember to add tests to your features and that all this steps have to pass, if something won't run or have question contact through [issue](https://github.com/sculptor-devops/installer/issues).