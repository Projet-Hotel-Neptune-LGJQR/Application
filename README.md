# Application

This project was developed with [Tailwind.css](https://tailwindcss.com/) version 3.2.4, [Php](https://www.php.net/)
version 8.1.10,
[MySQL](https://www.mysql.com/) version 8.0.30 and [Apache](https://httpd.apache.org/) version 2.4.54.
Managed by [Laragon](https://laragon.org/).

## Launch the app

To launch this application, you must initialize the database.
You need to change the login in /app/database/database.php and initialize it
with /app/database/init.php.

## Development

#1 Initialize all JS libraries

```
npm i
```

#2 Start the Tailwind.css CLI build process (do not close this process during your development session)

```
npx tailwindcss -i ./tailwind.css -o ./app/assets/css/output.css --watch
```