# Server Requirements:
- Laravel Framework 8.
- PHP 7.3 or higher.
    + Configure `php.ini`:
    
    ```
    max_input_vars=100000
    ```
- MySQL 5.7 or higher.
# Add-on & Themes:
- Home: [VsMovCMS.COM](https://vsmov.com)
- Admin: [Demo.VsMovCMS.COM/admin](https://vsmov.com)
- Free Movies Data: [VsMov.COM](https://vsmov.com)

- Add-on:
    - [VsMov Crawler](https://github.com/vsmov/vsmov-crawler)
- Theme: [MORE...](https://vsmov.com)

# Installation:
1. CD to project root and run: `composer require vsmov/vsmov-core -W`
2. Configuration your database connection information in file `.env`
3. Then, run command: `php artisan vsmov:install`
4. Change app\Models\User:
```php
use Vsmov\Core\Models\User as VsmovUser;

class User extends VsmovUser {
    use HasApiTokens, HasFactory, Notifiable;
    // ...
}
```
5. Create new user by command: `php artisan vsmov:user`

6. Remove this route definition in routes/web.php
```php
Route::get('/', function () {
    return view('welcome');
});
```
7. Run `php artisan optimize:clear`

# Update:
1. CD to project root and run: `composer update vsmov/vsmov-core -W`
2. Then, run command: `php artisan vsmov:install`
3. Run `php artisan optimize:clear`
4. Clear PHP Opcache in server (if enabled)

# Note
- Configure a production environment file `.env`
    + `APP_NAME=your_app_name`
    + `APP_ENV=production`
    + `APP_DEBUG=false`
    + `APP_URL=https://your-domain.com`
- Configure timezone `/config/app.php`
    + `'timezone' => 'Asia/Ho_Chi_Minh'`
    + `'locale' => 'vi'`

- Command CMS
    + `php artisan vsmov:menu:generate` : Generate menu
    + `php artisan vsmov:episode:change_domain` : Change episode domain play stream

# Command:
- Generate menu categories & regions: `php artisan vsmov:menu:generate`

# Reset view counter:
- Setup crontab, add this entry:
```
* * * * * cd /path/to/project && php artisan schedule:run >> /dev/null 2>&1
```
