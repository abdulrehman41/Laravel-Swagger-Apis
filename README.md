# Laravel Swagger
## System Requirements
```
php: ^8.1
composer: ^2.3.10
mysql / postgres
```


## Installation

Follow these simple steps to get started:
### . Install Dependencies
Navigate to the project directory and install the PHP dependencies using Composer:
```
cd laravel-swagger-example
composer install
```

###  Set Up ENV Variables
Copy .env.example into .env & update database credentials inside the env:
```
cp .env.example .env
```

### 4. Set Up the Database
Create the necessary database tables by running the following Artisan command:
```
php artisan migrate
```

### 5. Start the Development Server
Launch the Laravel development server:
```
php artisan serve
```

### 6. Access Swagger API Documentation
Now that everything is set up, open your web browser and visit the Swagger API documentation at:

http://localhost:8000/api/documentation#/
