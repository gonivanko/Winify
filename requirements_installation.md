# Requirements installation guide

[Guide in Ukrainian](requirements_installation_ukr.md)

[Back to the main documentation](README.md)

## Project Requirements

To run the project locally you should have such software installed:

| Software      | Min version |
| ---           | ---         |
| PHP           | 8.2         |
| Composer      | 2           |
| Git           | 2.25        |
| MariaDB       | 10.3        |
| Node          | 20          |
| npm           | 10          |

## Check versions

To check if you have the required software to run the app, you can run such commands:

``` console
php --version
composer --version
git --version
node --version
npm --version
```

To check MariaDB version you can run such query in the database:

``` sql
SELECT VERSION();
```

## Installation (GUI)
### PHP, MariaDB and Composer

You can quickly install PHP and MariaDB by installing Xampp from their official website <https://www.apachefriends.org/index.html>

Then you should add ***php.exe*** to the system variables and uncomment `extension=zip` in ***php.ini*** file

To install Composer you can also go to their official website <https://getcomposer.org/> and complete the installation

### Node and npm

To install Node and npm, you can simply go to their offical website <https://nodejs.org/en> to follow to installation instructions

### Git

To install git, you can simply go to the official website <https://git-scm.com/> and install it

## Installation (Ubuntu cmd)

Refresh your local package index first:

```
sudo apt update
```

### PHP and Composer

To install PHP and Composer, you run:
```
sudo apt install composer
```
and you'll also need php-xml extension:
```
sudo apt install php-xml
```

### Node and npm

To install Node and npm, you can simply run
```
sudo apt install nodejs
```
```
sudo apt install npm
```
## After installation

After installing the software, you can [check the versions](requirements_installation.md#check-versions) and compare them with the [required ones](requirements_installation.md#project-requirements)

[Back to the main documentation](README.md)
