This app require docker to install on your dev machine.  Make sure docker is running.

Also, this readme assumes that you have cloned the repo and navigated to the correct
directory.


Then do:

```
composer require laravel/sail --dev
```

At this point you should make sure you have an .env file.  All you do is save .env.example as .env

Then do:

```
php artisan sail:install
```

Choose [0] for mysql

Then do:

```
./vendor/bin/sail up
```

Now the app is running.  Time to install it.  Open another terminal make sure you in
the app root directory.

Do this:

```
./vendor/bin/sail php artisan key:generate
./vendor/bin/sail php artisan migrate
./vendor/bin/sail php artisan db:seed
./vendor/bin/sail npm install && npm run dev
```

You can login with one of the users from the Factory generated data or you can
register your own username.  If you want to try a fake account, look up the email
on Tinker
```
./vendor/bin/sail php artisan tinker
>>> User::get();
```
Copy the email address.  The password is 'password'
