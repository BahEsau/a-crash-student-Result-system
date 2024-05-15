## STEP BY STEP GUIDE ON INSTALLING THIS PROJECT
- ensure that you have php version 7.4.2 install with you prevered sever(xampp)

## Step 1
Locate the Repository

Image description

If you already have a Laravel project you want to clone before now, it is advisable you copy the repository link as directed on the snapshot above.

## Step 2
Move to Visual Studio Code Editor

Image description

On VS Code Editor, go to Source Control Tab or use Ctrl+Shift+G to locate the control source tab as shown on the image above.

## Step 3
Clone Repository

Image description

Click on Clone Repository, then enter the repository link copied and click on clone.

## Step 4
Select Local Directory

Image description

After Step 3, the computer automatically promote you to select the local directory to clone the Laravel Project into.

For me, I'm cloning the project into my htdocs because I'm using XAMPP Server.

Image description

At this point, your project is now cloning.

## Step 5
Open Cloned File

Image description

After our project has successfully been cloned, we can now go ahead to open it.

## Step 6
Setting Up Project

Laravel projects requires extra setups before it can run on your local computers.

First, we are going to install Node Module and Vendor files.

To install node module run npm install on your VS Code Terminal and wait for it to complete.

To install your Vendor file run composer install on your VS Code Terminal and wait for it to complete.

## Step 7
Setup .env file

To setup your .env, kindly duplicate your .env.example file and rename the duplicated file to .env.

## Step 8
Setup Database

For this content, I'm using PHP MyAdmin Database.

On your .env file, locate this block of code below.
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=result_sys
DB_USERNAME=root
DB_PASSWORD=
The block of code above represents your Database connection and subnetweb is my database name, which you can create your database name to be something else.

## Step 9
Commands

To finalize this everything, run the following commands on your terminal.
npm run dev

php artisan key:generate

php artisan migrate

php artisan server
