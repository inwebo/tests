# Tests tech

![PhpStorm](https://img.shields.io/badge/phpstorm-143?style=for-the-badge&logo=phpstorm&logoColor=black&color=black&labelColor=darkorchid)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![SQLite](https://img.shields.io/badge/sqlite-%2307405e.svg?style=for-the-badge&logo=sqlite&logoColor=white)

## Dependencies

- [Install Symfony CLI](https://symfony.com/download#step-1-install-symfony-cli)
- [PHPSpreadSheet](https://github.com/PHPOffice/PhpSpreadsheet)

## Installation

```bash
sudo apt install php-sqlite3
```

```bash
git clone https://github.com/inwebo/tests
```

```bash
touch var/data.db
```

```bash
composer install
```

```bash
bin/console doctrine:schema:update --force
```

## Start

```bash
symfony server:start

# bin/console server:start
```

## Linter

```bash
composer php-cs-fixer
```

## Durée

- Mise en place stack : ~30 mins
- 