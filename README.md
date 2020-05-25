Download
First, clone project:

# clone
git clone git@github.com:albuspersevil/SampleProject.git

# Access project---- get into project directory in terminal
cd portal

# Install dependencies
composer install

# Create file .env
cp .env.example .env
configure the database:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Sampleminiproject
DB_USERNAME=root
DB_PASSWORD=

# Generate key
php artisan key:generate

# Run migrations (tables and Seeders)
php artisan migrate
php artisan db:seed --class=UsersTableSeeder

#link the public and storage folder
php artisan storage:link

#Permissons
sudo chmod -r 777 storage  provide to the storage folder.
 
# Create Server
php artisan serve

# Access project
http://localhost:8080

You can also access through http://localhost/portal/public/login
email:admin@admin.com
pass:123456

#package used 
intervention package is used for the image operations.
Toastr is used to show notification message at some point.

#project guide
User can Login after first create a company so that it will appear in the company dropdown on create employee form.
There is sidebar Employee and Company on click any one of them two options will appear.
add new and listing.
Middleware: authenticate custom middleware is been used to prevent the unauthorised activity.Only Authenticated user can perform the activity.
Validations:Request Classes are being used for the server side validations as well jquery for front end on image.
Controllers:Resource controllers are being used.
There is login , logout , crud on company , crud on employee ..I tried to do the same as i was asked to do so.

