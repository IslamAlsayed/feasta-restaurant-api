# Feasta restaurant api

## Installation

## 1. Cloning the Repository

First, clone the repository to your local machine:

```bash
git clone https://github.com/IslamAlsayed/feasta-restaurant-api.git

cd feasta-restaurant-api
```

## 2. Install Dependencies

```bash
composer update
```

## 3. Set Up Environment File

### Create a .env file and set up your database configuration

```bash
cp .env.example .env
```

### 4. Edit the .env file

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## 5. Migrate Tables and Seed Data

### Run the following command to migrate the database tables and seed the initial data

```bash
php artisan migrate --seed
```

## 6. Running the Application

### To start the application, use the built-in PHP server with the following command:

```bash
php artisan serve
```

## 7. Accessing the Application

### The API should now be running and accessible at http://localhost:8000

### Start the application using the built-in PHP server with this command:

```bash
php artisan serve
```

## Dependencies

-   Laravel 10.x
-   PHP 8.4.2
-   Sql
-   MySQL

## Configuration

Ensure you have the following configurations in your .env file:

## Contributing

If you wish to contribute to this project, please fork the repository and create a pull request. Ensure your code follows the project's coding standards and includes appropriate tests.

## Contact me

### If you have any questions or need further assistance, you can reach out to me:

### Email: eslamalsayed8133@gmail.com

### LinkedIn: [IslamAlsayed](https://www.linkedin.com/in/islam-alsayed7)
