Download
First, clone project:

# clone
git clone https://github.com/carlosfgti/crud-laravel-5.7.git

# Access project---- get into project directory in terminal
cd crud-laravel-5.7

# Install dependencies
composer install

# Create file .env
cp .env.example .env

# Generate key
php artisan key:generate

# Run migrations (tables and Seeders)
php artisan migrate
php artisan db:seed --class=UsersTableSeeder

#Permissons
sudo chmod -r 777 storage  provide to the storage folder.
 
# Create Server
php artisan serve

# Access project
http://localhost:8080

You can also access through http://localhost/portal/public/login
email:admin@admin.com
pass:123456

