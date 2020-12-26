![logo](https://raw.githubusercontent.com/williamchanrico/cryptvest/master/non-laravel-files/logo/logo.png)

#### The project is based on Laravel 5.4 and Google Material Design Lite 1.3 with full email and social authentication support.

**CryptVest** is a platform for crypto investors to keep track of coins they ***hodl***, including how much their investment in each of those coins are. 

CryptVest will show how diversified their coins investment, including some other information like user's total net worth, profits, etc.

Laravel 5.4 with user authentication, registration with email confirmation, social media authentication, password recovery, and captcha protection. This makes full use of Controllers for the routes, templates for the views, and makes use of middleware for routing.

CryptVest uses [API](https://coinmarketcap.com/api/) provided by **coinmarketcap.com** to obtain the current marketcap. CryptVest also uses laravel ORM modeling and has CRUD (Create Read Update Delete) functionality for all coins in user's portfolio.

### Demo User
Email: ```demo@cryptvest.tk```

Password: ```demo@cryptvest.tk```

Demo is hosted on private server: ```https://cryptvest.arzhon.id```

### Quick Project Setup (from linux machine perspective, adjust accordingly on Windows/OSX)
###### (Not including the dev environment)
1. Run `git clone https://bitbucket.org/williamchanrico/cryptvest`
2. Create a MySQL database for the project
    * ```mysql -u root -p```, or if using Vagrant: ```mysql -u homestead -psecret```
    * ```create database cryptvest;```
3. Configure the environment file `cp .env.example .env` // NOTE: Google API Key will prevent maps error
4. Run `composer install` from the projects root folder
5. Don't forget to set the correct permission according to your machine setup e.g: `chmod -R 755`
6. `sudo php artisan key:generate`
7. `sudo php artisan migrate --seed`
8. setup laravel cache directory `mkdir -p storage/framework/{sessions,views,cache}`
9. then `php artisan optimize'
10. and finally run `composer dump-autoload` to generate autoload files

#### View the Project in Browser
1. From the projects root folder run `php artisan serve`
2. Open your web browser and go to `http://localhost`

### Screenshots
![screenshot](https://bytebucket.org/williamchanrico/cryptvest/raw/bae24156983f2f6874d0a006e506adbd6475badc/non-laravel-files/screenshots/screenshot1.png?token=90998bf2750b8fb43b8570f246f72987f55dcab1)

![screenshot](https://bytebucket.org/williamchanrico/cryptvest/raw/bae24156983f2f6874d0a006e506adbd6475badc/non-laravel-files/screenshots/screenshot2.png?token=d35abb157a487166bc3435d6764634f84e8a85d0)

![screenshot](https://bytebucket.org/williamchanrico/cryptvest/raw/bae24156983f2f6874d0a006e506adbd6475badc/non-laravel-files/screenshots/screenshot3.png?token=b2c589fe89c6a6fbeb078b36968141fd9d92cc71)

![screenshot](https://bytebucket.org/williamchanrico/cryptvest/raw/bae24156983f2f6874d0a006e506adbd6475badc/non-laravel-files/screenshots/screenshot4.png?token=70fd90590f0237233847a16e5e623b5ccff4efa8)

![screenshot](https://bytebucket.org/williamchanrico/cryptvest/raw/bae24156983f2f6874d0a006e506adbd6475badc/non-laravel-files/screenshots/screenshot5.png?token=23ff79430d6b58b293e17ad619235c864a79c33c)

![screenshot](https://bytebucket.org/williamchanrico/cryptvest/raw/bae24156983f2f6874d0a006e506adbd6475badc/non-laravel-files/screenshots/screenshot6.png?token=5d380cffafb3e75efa129682fe0bc587d1c2f762)

![screenshot](https://bytebucket.org/williamchanrico/cryptvest/raw/bae24156983f2f6874d0a006e506adbd6475badc/non-laravel-files/screenshots/screenshot7.png?token=61f184816813e2ef92f3eb98df78184181302171)

### Get Socialite Login and Other API Keys:
* [Google Captcha API](https://www.google.com/recaptcha/admin#list)
* [Facebook API](https://developers.facebook.com/)
* [Twitter API](https://apps.twitter.com/)
* [Google &plus; API](https://console.developers.google.com/)
* [GitHub API](https://github.com/settings/applications/new)
* [YouTube API](https://developers.google.com/youtube/v3/getting-started)
* [Twitch TV API](http://www.twitch.tv/kraken/oauth2/clients/new)
* [Instagram API](https://instagram.com/developer/register/)
* [37 Signals API](https://github.com/basecamp/basecamp-classic-api)

### Add More Socialite Logins
* See full list of providers: [http://socialiteproviders.github.io](http://socialiteproviders.github.io/#providers)

### Other API keys
* [Google Maps API v3 Key](https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key)

## Environment File

Example `.env` file:
```
APP_ENV=local
APP_KEY=SomeRandomString
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cryptvest
DB_USERNAME=william
DB_PASSWORD=mysqlpassword

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=

# Google Maps API v3 Key - https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key
GOOGLEMAPS_API_KEY=YOURGOOGLEMAPSkeyHERE

# https://www.google.com/recaptcha/admin#list
RE_CAP_SITE=YOURGOOGLECAPTCHAsitekeyHERE
RE_CAP_SECRET=YOURGOOGLECAPTCHAsecretHERE

# https://developers.facebook.com/
FB_ID=YOURFACEBOOKidHERE
FB_SECRET=YOURFACEBOOKsecretHERE
FB_REDIRECT=http://yourwebsiteURLhere.com/social/handle/facebook

# https://console.developers.google.com/ - NEED OAUTH CREDS
GOOGLE_ID=YOURGOOGLEPLUSidHERE
GOOGLE_SECRET=YOURGOOGLEPLUSsecretHERE
GOOGLE_REDIRECT=http://yourwebsiteURLhere.com/social/handle/google
```

#### Laravel Developement Packages Used References
* http://laravel.com/docs/5.1/authentication
* http://laravel.com/docs/5.1/authorization
* http://laravel.com/docs/5.1/routing
* http://laravel.com/docs/5.0/schema
* https://laravelcollective.com/docs/5.4/html
* http://laravel.com/docs/5.4/authentication
* http://laravel.com/docs/5.4/authorization
* http://laravel.com/docs/5.4/routing

---

### [Laravel](http://laravel.com/) PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.png)](https://travis-ci.org/laravel/framework) [![Latest Stable Version](https://poser.pugx.org/laravel/framework/version.png)](https://packagist.org/packages/laravel/framework) [![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.png)](https://packagist.org/packages/laravel/framework) [![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching.

Laravel aims to make the development process a pleasing one for the developer without sacrificing application functionality. Happy developers make the best code. To this end, we've attempted to combine the very best of what we have seen in other web frameworks, including frameworks implemented in other languages, such as Ruby on Rails, ASP.NET MVC, and Sinatra.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

### Official Laravel Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### Contributing To Laravel

**All Laravel Framework related issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### Laravel License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

---

### [Material Design Lite](https://getmdl.io/) Front-End Framework

[![GitHub version](https://badge.fury.io/gh/google%2Fmaterial-design-lite.svg)](https://badge.fury.io/gh/google%2Fmaterial-design-lite)
[![npm version](https://badge.fury.io/js/material-design-lite.svg)](https://badge.fury.io/js/material-design-lite)
[![Bower version](https://badge.fury.io/bo/material-design-lite.svg)](https://badge.fury.io/bo/material-design-lite)
[![Dependency Status](https://david-dm.org/google/material-design-lite.svg)](https://david-dm.org/google/material-design-lite)

> An implementation of [Material Design](http://www.google.com/design/spec/material-design/introduction.html)
components in vanilla CSS, JS, and HTML.

Material Design Lite (MDL) lets you add a Material Design look and feel to your
static content websites. It doesn't rely on any JavaScript frameworks or
libraries. Optimized for cross-device use, gracefully degrades in older
browsers, and offers an experience that is accessible from the get-go.

---

## Dependencies

### COMPOSER
#### COMPOSER can be installed using the following commands:
```
sudo curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

#### COMPOSER on MAC OS X can be installed using the following commands:
```
sudo brew update
sudo brew tap homebrew/dupes
sudo brew tap homebrew/php
sudo brew install composer
```

---

