# laravel admin test
```
composer create-project laravel/laravel .
```

## document
```
https://laravel-admin.org/docs/en/
```

## make database
```
touch database/database.sqlite
```

## connect to database
- .env file
```
DB_CONNECTION=sqlite
#DB_HOST=127.0.0.1
#DB_PORT=3306
#DB_DATABASE=ddd
#DB_USERNAME=root
#DB_PASSWORD=
```

## basic install
```
php artisan migrate
```

## install laravel-admin
### install laravel admin package
```
composer require encore/laravel-admin
```

###  laravel admin schefolding
```
php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
```
- config/admin.php.

### ???
```
php artisan admin:install
```

## run server in local development environment
```
php artisan serve
```

### connection
```
127.0.0.1:8000/admin
```

## database migration
```
touch database/database.sqlite
```

```

```
