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

### migrate:refresh

It is used to refresh the database and create the tables again.

```bash
php artisan migrate:refresh
```

### Creating a new factory
```bash
php artisan make:factory PostFactory
```

**Then**, you can modify the definition of the factory in the file: database/factories/PostFactory.php
```php
...
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
        ];
    }
...
```

### Creating a new seeder
```bash
php artisan make:seeder PostSeeder
```

**Then**, you can modify the definition of the seeder in the file: database/seeders/PostSeeder.php
```php
...
    public function run(): void
    {
        \App\Models\Post::factory(10)->create();
    }
...
```

### Running the seeders
```bash
php artisan db:seed
```

