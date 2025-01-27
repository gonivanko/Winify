# Winify
> Проект веб-застосунку інтернет-аукціонів, написаний на **PHP Laravel** і **Tailwind CSS**  
автор **@gonivanko**

[Readme англійською](README.md)

## Структура програми
Текст програми знаходиться у [папці](/winify) *winify* 

## Як запустити локально

### Початкові вимоги
Для локального запуску проекту потрібно мати такі встановлені програми: 

| Програма      | Мін. версія |
| ---           | ---         |
| PHP           | 8.2         |
| Composer      | 2           |
| Git           | 2.25        |
| MariaDB       | 10.3        |
| Node          | 20          |
| npm           | 10          |

[Як встановити ці програми](requirements_installation_ukr.md)

### Клонування з Github

Скопіюйте цей репозиторій

``` console
git clone https://github.com/gonivanko/Winify.git
```

та перейдіть у робочу папку:

``` console
cd Winify/winify
```

### Встановіть PHP залежності

``` console
composer install
```

### ENV файл

Створіть файл .env
1. Linux
    ``` console
    cp .env.example .env
    ```
2. Windows
    ``` console
    copy .env.example .env
    ```

та змініть файл .env
```
DB_CONNECTION=mariadb
DB_HOST=your_database_host [localhost]
DB_PORT=your_database_port [3306]
DB_DATABASE=your_database_name [winify]
DB_USERNAME=your_database_user [winify_admin]
DB_PASSWORD=your_database_password [winify123]
```

### Секретний ключ і міграції бази даних

Згенеруйте секретний ключ застосунку:
``` console
php artisan key:generate
```

запустіть міграцію бази даних
``` console
php artisan migrate
```

[Вибірково] Ви можете також створити базових користувачів та випадкові товари

``` console
php artisan migrate:refresh --seed
```

### Встановіть та скомпілюйте npm залежності
``` console
npm install 
npm run build
```

### Запустіть проект

Тепер ви можете запустити застосунок

``` console
php artisan serve
```

та перейти до   
http://127.0.0.1:8000/