use php.new to install php

composer run dev
composer create-project laravel/laravel e-commerce

# Create a Model
php artisan make:model Project -m
php artisan migrate
php artisan tinker


eloquent
$projects = Project::latest()->get();

php artisan test

php artisan make:controller Admin/ProjectController --resource --model=Project
pphp artisan route:listhp artisan route:list
