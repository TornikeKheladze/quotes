<div style="display:flex; align-items: center">
  <h1 style="position:relative; top: -6px" >Movie Quotes</h1>
</div>

---

This is movie quotes app. In this app you can see randomly generated quotes from movies. Also you can go to movie page and see all quotes from movie. If you have admin permissions you can add remove or edit movies and quotes.

#

### Table of Contents

-   [Prerequisites](#prerequisites)
-   [Tech Stack](#tech-stack)
-   [Getting Started](#getting-started)
-   [Migrations](#migration)
-   [Development](#development)
-   [Project Structure](#project-structure)
-   [Structure of mysql](#structure-of-mysql)

#

### Prerequisites

-   <img src="/images/php.svg" width="35" style="position: relative; top: 4px" /> *PHP@8.02 and up*
-   <img src="/images/mysql.png" width="35" style="position: relative; top: 4px" /> _MYSQL@8 and up_
-   <img src="/images/npm.png" width="35" style="position: relative; top: 4px" /> _npm@6 and up_
-   <img src="/images/composer.png" width="35" style="position: relative; top: 6px" /> _composer@2 and up_

#

### Tech Stack

-   <img src="/images/laravel.png" height="18" style="position: relative; top: 4px" /> [Laravel@9.x](https://laravel.com/docs/9.x) - back-end framework
-   <img src="/images/spatie.png" height="18" style="position: relative; top: 4px" /> [Spatie Translatable](https://github.com/spatie/laravel-translatable) - package for translation
-   <img src="/images/vite.png" height="18" style="position: relative; top: 4px; width: 18px" /> [Vite](https://vitejs.dev/guide/) - rapid development tool

#

### Getting Started

1\. First of all you need to clone Movie Quotes from github:

```sh
git clone git@github.com:RedberryInternship/kheladze-movie-quotes.git
```

2\. Next step requires you to run _composer install_ in order to install all the dependencies.

```sh
composer install
```

3\. after you have installed all the PHP dependencies, it's time to install all the JS dependencies:

```sh
npm install
```

and also:

```sh
npm run dev
```

in order to build your JS/SaaS resources.

4\. Now we need to set our env file. Go to the root of your project and execute this command.

```sh
cp .env.example .env
```

And now you should provide **.env** file all the necessary environment variables:

#

**MYSQL:**

> DB_CONNECTION=mysql

> DB_HOST=127.0.0.1

> DB_PORT=3306

> DB_DATABASE=**\***

> DB_USERNAME=**\***

> DB_PASSWORD=**\***

#

5\. Now execute in the root of you project following:

```sh
  php artisan key:generate
```

Which generates auth key.

6\. If you've completed everything so far, then migrating database if fairly simple process, just execute:

```sh
php artisan migrate
```

##### Now, you should be good to go!

#

### Development

You can run Laravel's built-in development server by executing:

```sh
  php artisan serve
```

if you wish to see changes after changing styles with Tailwind CSS, execute:

```sh
  npm run dev
```

#

### Project Structure

```bash
├─── app
│   ├─── Console
│   ├─── Exceptions
│   ├─── Models
│   ├─── Http
│   ├─── Providers
├─── bootstrap
├─── config
├─── database
├─── packages
├─── public
├─── resources
├─── routes
├─── scripts
├─── storage
├─── tests
- .env
- artisan
- composer.json
- package.json
```

Project structure is fairly straight forward (at least for laravel developers)...

For more information about project standards, take a look at these docs:

-   [Laravel](https://laravel.com/docs/9.x)

#

### Structure of mysql

<img src="/images/Drawsql.png" height="250" style="position: relative; top: 4px" />

</br>

[Drawsql link](https://drawsql.app/teams/redberry-32/diagrams/movie-quotes/embed) - DrawSQL software to create, visualize and collaborate on database entity relationship diagrams.

#
