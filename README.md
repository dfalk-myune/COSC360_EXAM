# Final Exam 2024

# COSC360_EXAM


RUN:

Please note the name of the database is une_accounts_app.


Please note the collation for mysql has been altered in database.php to:

'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),



Please note the following script has been run on the database:

ALTER DATABASE `une_accounts_app` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;


composer install
php artisan migrate
php artisan serve


# Testing 

The system has been checked for different users, with each user only accessing his own todo items. Upon logging out the links are unaccessable.
All routes are under middleware, and users can only access matching user_ids
in the database.

Full CRUD functionality has been tested.
 