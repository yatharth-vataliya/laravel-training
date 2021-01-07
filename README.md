
Laravel Project is created and README.md file added.

Authentication module installed successfully and javascript is also required using node's npm install command and after that npm run dev for compiling asset

after that set the Database configuration in .env file

Next run the following command to create data table in database
    :- php artisan migrate

Next run following command 
    :- php artisan make:model --all ManageUser 

This command will generate model, controller, factory, seeder and migration all at same time with this single command

Next Create table fields in migration file after that run `php artisan migrate` command to make table in database

Next Edit generated factory for your model and after that define it in your seeder file with your initial config to generate how many records and then run following command
    :- php artisan db:seed --class=<<your seeder name>>

Next install yajra/laravel-datatables-oracle using composer and setup it's configurations for laravel mentioned in its official github repository

Next create blade files as you need
