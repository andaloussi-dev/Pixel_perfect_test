those are the steps for creating this project 

- started by creating a new laravel project 

- created sperated folders for each model 'Api/V1 , customer , admin , issue '

- created a new logincontroller inside the Api folder 

-installed  Passport via the Composer package manager:
composer require laravel/passport

- added a new column to the user table named rool with a default value of 'customer'
and migrated the database 
php artisan migrate

-i runed the php artisan passport:install command to create the encryption keys needed to generate secure access tokens.

-added the Laravel\Passport\HasApiTokens trait to the App\User model

-called the Passport::routes method within the boot method of the AuthServiceProvider

-in the config/auth.php configuration file, i sat the driver option of the api authentication guard to passport

- i created an api folder in the routes and placed the api routes inside it to make it more clear
and updated the path in the routesServiceProvider 

- i worked with Personal Access Client bcs it fit this project from my prespective and  serve as a simpler approach to issuing access tokens in general

- defined  the API's scopes using the Passport::tokensCan method in the boot method of the AuthServiceProvider

- added the following middleware to the $routeMiddleware property the your app/Http/Kernel.php file:
'scopes' => \Laravel\Passport\Http\Middleware\CheckScopes::class,
'scope' => \Laravel\Passport\Http\Middleware\CheckForAnyScope::class,

- then i created the login method using passport tokens and scope 

- i used the repositories design pattern to reuse the code in the api controller and in diffrent controllers 
in the future if needed 

- created repositories into the customer and admin folders

- generated a new issue model with it migration and setup the relationsship between the user and the issues
and setup the fillable columns 

- i created a costume Request files to manage the requests in the issue folder
and added the required inputs in the rules method 

- created policies for the admin and customer to add more security and controle

- created the methods we need to manage the issues inside the customer and admin repositories

- and added two controllers in the api folder one to manage the admin requests and the other for the customer

- i managed the mails to the user when he create an issue when and when the admin updated 
usign laravel notifications

- finnaly i created the routes responssible for the Api requests.


i hope this a good approach and scalable enough.

