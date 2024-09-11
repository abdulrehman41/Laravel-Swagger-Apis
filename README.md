# Laravel Swagger
## System Requirements
```
php: ^8.2
composer: ^2.6.5
mysql
```


## Installation

Follow these simple steps to get started:

### 1. Clone the Repository
Clone this project to your local machine using Git:
```
git clone https://github.com/abdulrehman41/Laravel-Swagger-Apis.git
```

### 2. Install Dependencies
Navigate to the project directory and install the PHP dependencies using Composer:
```
cd laravel-swagger-example
composer install
```

### 3. Set Up ENV Variables
Copy .env.example into .env & update database credentials inside the env:
```
cp .env.example .env
```

### 4. Set Up the Database
Create mysql database tables by running the following Artisan command:
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
