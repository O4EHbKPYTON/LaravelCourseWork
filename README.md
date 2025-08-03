# LoanLaravel - Кредитная информационная система

<img width="1893" height="868" alt="Интерфейс системы" src="https://github.com/user-attachments/assets/f4fd4300-c5da-44d2-984e-5046ee8f8c6a">

![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.x-7952B3?logo=bootstrap&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-4.x-646CFF?logo=vite&logoColor=white)
![Spatie](https://img.shields.io/badge/Spatie_Permissions-6.7-4A4A4A?logo=laravel)

**Курсовая работа по дисциплине "Базы данных"**  
*Демонстрация проектирования нормализованной реляционной БД и реализации информационной системы*

## Нормализованная структура БД

```mermaid
erDiagram
    users ||--o{ credits : "оформляет"
    users {
        int id PK
        string name
        string email
        string password
    }
    
    clients ||--o{ credits : "имеет"
    clients {
        int id PK
        string full_name
        string phone
        string address
    }
    
    companies ||--o{ credits : "выдает"
    companies {
        int id PK
        string name
        string address
        int ownership_type_id FK
    }
    
    ownership_types ||--o{ companies : "классифицирует"
    ownership_types {
        int id PK
        string name
    }
    
    credits ||--o{ payments : "имеет"
    credits {
        int id PK
        int user_id FK
        int client_id FK
        int company_id FK
        decimal amount
        int term
        decimal interest_rate
        decimal monthly_payment
    }
    
    payments {
        int id PK
        int credit_id FK
        decimal amount
        date payment_date
    }
```
##  Запуск проекта

```bash
# 1. Клонирование репозитория
git clone https://github.com/your-username/LoanLaravel.git
cd LoanLaravel

# 2. Установка зависимостей PHP
composer install --ignore-platform-reqs

# 3. Установка зависимостей Node.js
npm install

# 4. Настройка окружения
cp .env.example .env
php artisan key:generate

# 5. Редактирование .env файла (настройте под свою БД)
nano .env  # или открыть в любом редакторе

# 6. Создание базы данных (если не создана)
mysql -u root -p -e "CREATE DATABASE laravel_credit;"

# 7. Запуск миграций с тестовыми данными
php artisan migrate --seed

# 8. Сборка фронтенда (в development режиме)
npm run dev

# 9. Запуск сервера (в отдельном терминале)
php artisan serve

# 10. Доступ к приложению
http://localhost:8000
```
