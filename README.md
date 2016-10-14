# Ride: Application CLI

This module adds various application commands to the Ride CLI.

## Commands

### cache

This command shows an overview of the available caches.

**Syntax**: ```cache```

**Alias**: ```c```

### cache enable

This command enables all caches or a specific cache if provided.

**Syntax**: ```cache enable [<name>]```
- ```<name>```: Name of the cache to enable

**Alias**: ```ce```

### cache disable

This command disables all caches or a specific cache if provided.

**Syntax**: ```cache disable [<name>]```
- ```<name>```: Name of the cache to disable

**Alias**: ```cd```

### cache clear

This command clears all caches or a specific cache if provided.

**Syntax**: ```cache clear [--skip] [<name>]```
- ```--skip```: Name of the caches, separated by a comma, to skip when clearing
- ```<name>```: Name of the cache to clear

**Alias**: ```cc```

### cache warm

This command warms up all caches or a specific cache if provided.

**Syntax**: ```cache warm [--skip] [<name>]```
- ```--skip```: Name of the caches, separated by a comma, to skip when warming
- ```<name>```: Name of the cache to warm

**Alias**: ```cw```

### dependency

This command shows an overview of the defined dependencies.

**Syntax**: ```dependency [<query>]```
- ```<query>```: Query to search the dependencies

**Alias**: ```d``` or ```dep```

### file

This command searches for files relative to the Ride directory structure.

**Syntax**: ```file <path>```
- ```<path>```: Relative path of the file

**Alias**: ```f```

### parameter

This command shows an overview of the defined parameters.

**Syntax**: ```parameter [<query>]```
- ```<query>```: Query to search the parameters

**Alias**: ```p```

### parameter get

This command gets the value of a parameter

**Syntax**: ```parameter get <key>```
- ```<key>```: Key of the parameter

**Alias**: ```pg```

### parameter set

This command sets a configuration parameter.

**Syntax**: ```parameter set <key> <value>```
- ```<key>```: Key of the parameter
- ```<value>```: Value for the parameter

**Alias**: ```ps```

### parameter unset

This command unsets a configuration parameter.

**Syntax**: ```parameter unset <key>```
- ```<key>```: Key of the parameter

**Alias**: ```pu```

## Related Modules 

- [ride/app](https://github.com/all-ride/ride-app)
- [ride/cli](https://github.com/all-ride/ride-cli)
- [ride/lib-cli](https://github.com/all-ride/ride-lib-cli)
- [ride/lib-config](https://github.com/all-ride/ride-lib-config)
- [ride/lib-dependency](https://github.com/all-ride/ride-lib-dependency)
- [ride/lib-system](https://github.com/all-ride/ride-lib-system)

## Installation

You can use [Composer](http://getcomposer.org) to install this application.

```
composer require ride/cli-app
```
