# Blog
This is my personal blog system.

[![CI](https://github.com/1771991075/Blog/actions/workflows/main.yml/badge.svg)](https://github.com/1771991075/Blog/actions/workflows/main.yml)

### How to Contribute?

Install pre-requisites

- php
- redis
- php-redis

```bash
sudo apt install php redis php-redis -y
```

- jsdelivr-cli

```bash
sudo curl -L https://github.com/lixinyang123/JSDelivrCLI/releases/download/v1.0.0-release.1/delivr-linux-x64 -o /usr/bin/delivr
sudo chmod +x /usr/bin/delivr
```

### Restore dependencies

```bash
delivr restore
```

### Run

```bash
cd ./src
php -S 0.0.0.0:8080
```
