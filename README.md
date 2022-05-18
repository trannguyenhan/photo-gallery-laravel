## Install 

Create `.env` file: 

```bash
cp .env.example .env
```

If you run project with docker, modify your `.env` file with DATABASE same: 

```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=photo_gallery_laravel
DB_USERNAME=trannguyenhan
DB_PASSWORD=mysql12345
```

And run project with docker: 

```bash
docker-compose up
localhost:8005
```
Install dependency and gen key app: 

```bash
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
```

If you run project without docker, import database from folder `database/photo-gallery-laravel-database.sql` and modify your `.env` suitable with your database you config and run script: 

```bash
composer update
composer install
php artisan key:generate
```

Run project without docker:

```bash
php artisan serve
localhost:8000
```

## Demo 
### Album page
![](https://i.pinimg.com/originals/63/98/4c/63984caae99d751898b65e93adf596b4.jpg)

### Photo page
![](https://i.pinimg.com/originals/d7/02/d4/d702d4a352da5f49e9285771d7257f6c.jpg)
