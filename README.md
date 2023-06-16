# Laravel Blog & Learning Laravel

### Database Setup

Connect your project by setting the .env
```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=laravel_blog
DB_USERNAME=
DB_PASSWORD=
```

**Then,** you can create your first migrate by using the command:

```bash 
php artisan migrate
```

### Adding a new table
```bash
php artisan make:migration create_posts_table
```

### Creating a new model
```bash
php artisan make:model Post
```

### Creating a new controller
```bash
php artisan make:controller PostController
```
