Define the db connection and database absolute path in .env file
DB_CONNECTION=sqlite
DB_DATABASE=/Applications/XAMPP/xamppfiles/htdocs/LogRequestTest/database/database.sqlite

Build the docker image by running this command 
docker-compose build

Run the migration in the container
docker-compose run --rm app php artisan migrate

To start the container run docker-compose up

