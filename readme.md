[![CircleCI](https://circleci.com/gh/emugaya/andela-buddy-server.svg?style=svg)](https://circleci.com/gh/emugaya/andela-buddy-server)
[![Test Coverage](https://api.codeclimate.com/v1/badges/0820fce7f11d56d58e54/test_coverage)](https://codeclimate.com/github/emugaya/andela-buddy-server/test_coverage)
[![Maintainability](https://api.codeclimate.com/v1/badges/0820fce7f11d56d58e54/maintainability)](https://codeclimate.com/github/emugaya/andela-buddy-server/maintainability)
## Andela Buddy Server
Server side for Andela Buddy Application
### Technologies Used
- PHP 7
- Composer
- Lumen
- Postgres SQL
- Redis

### Getting Started
_*Manual Installation*_(for mac)
* Clone the application:

        $ git clone https://github.com/emugaya/andela-buddy-server.git

- Install [PHP 7](http://php.net/manual/en/install.php)
  Run the following commands to install/upgrade Php for Mac
    
    - ```brew update```
    - ```brew install homebrew/php/php71 ```
    - ```export PATH="$(brew --prefix homebrew/php/php70)/bin:$PATH"```

  If you encounter errors during installation, runt the below commands. There after rerun the commands above.
    - ```brew untap josegonzalez/php```

- Install [Redis](https://redis.io/download)
- Install [Postresql ](https://www.postgresql.org/download/)
- Install [Composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
- Install [PHP CodeSniffer](https://github.com/andela/lenken-server/wiki/Installing-PHP-Code-Sniffer-with-Composer)
- Install [PHP Mess Detector](https://github.com/andela/lenken-server/wiki/Installing-PHP-Mess-Detector-with-Composer)
- Run ```Composer install``` in your terminal to install dependencies
- Copy the .env.example file and rename it to .env
- Fill in the required settings values for the .env settings
- Run ```php artisan migrate``` to create the tables
  - When running this command, you can possibly run into a ```cannot find driver``` error
    You can fix that by running ```brew install php71-pdo-pgsql```
- Run ```php artisan db:seed``` to seed the tables
- Run ```cd public``` to navigate to the entry point, `index.php`
- Start the server with ```php -S <localhost>:<port>```

### Testing
- [PHPUnit](https://phpunit.de/)
  - Test files are located at `~/tests`
  - Run ```composer test``` to run tests

### Running the Server
```php -S localhost:3000 -t public/```

### CodeStyle
- To contribute, you MUST adhere to the style guide as provided by:
  - [phpcs](https://github.com/andela/lenken-server/wiki/Installing-PHP-Code-Sniffer-with-Composer)
  - [phpmd](https://github.com/andela/lenken-server/wiki/Installing-PHP-Mess-Detector-with-Composer)
