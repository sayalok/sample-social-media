# Test Project

## Installation Guide

Step One:

First Get the project Folder From Git using below command

    git clone https://github.com/sayalok/sample-social-media
    
Or You can Download Zip file 

Step Two:

Copy the .env.example file and rename it to .env

After get the project folder run below command to install all the dependency of this project

    composer install

Then Run

    php artisan serve

## Database

Create a database and put that name in **.env** file Run

    php artisan migrate
