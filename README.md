# Docker LAMP

Simple lamp stack made with docker.

## 4 containers

* Apache as virtualhosts
* PHP 7.2 FPM
* Mysql 5.6
* phpMyAdmin

The php configuration is made to almost match the config of ovh hosts.

## Init

In the stack dir

```sh
# Build the docker stack
bash lamp build

# Start the stack
bash lamp start
```

## How to use

```sh
# Start the stack
bash lamp start

# Stop the stack
bash lamp stop

# Enter the php container
bash lamp bash
```
