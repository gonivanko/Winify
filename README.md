# Winify
> Online auction web app project written in **PHP Laravel** and **Tailwind CSS**  
by **@gonivanko**

## Code structure
All of the code is stored in *winify* [folder](/winify)

## How to run locally

### Project requirements

To run the project locally you should have such tools installed:

| Tool          | Min version |
| ---           | ---         |
| PHP           | 8.2         |
| Composer      | 2           |
| Git           | 2.25        |
| MariaDB       | 10.3        |
| Node          | 20          |
| npm           | 10          |

### Clone from Github

Copy this repo

```
git clone https://github.com/gonivanko/Winify.git
```

go to the working directory:

```
cd Winify/winify
```

### Install PHP dependencies

```
composer install
```

### ENV file

create .env file
1. Linux
    ```
    cp .env.example .env
    ```
2. Windows
    ```
    copy .env.example .env
    ```

and edit the .env file
```
DB_CONNECTION=mariadb
DB_HOST=your_database_host [localhost]
DB_PORT=your_database_port [3306]
DB_DATABASE=your_database_name [winify]
DB_USERNAME=your_database_user [winify_admin]
DB_PASSWORD=your_database_password [winify123]
```

### Secret key and database migrations

generate app's secret key:
```
php artisan key:generate
```

run database migrations
```
php artisan migrate
```

[Optional] You can also generate basic users and random products

```
php artisan migrate:refresh --seed
```

### Install and build npm dependencies
```
npm install 
npm run build
```

### Run the project

Now you can start the project

```
php artisan serve
```

and go to the  
http://127.0.0.1:8000/