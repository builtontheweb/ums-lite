
UMS LITE
=============

Introducing UMS LITE: A free to use, lightweight PHP framework Developed by [Built on the web](https://builtontheweb.co.uk). For those of you who want an out-of-the-box working solution to user management with easy scalability and an intuitive Controller System.

Works on PHP >= 7.0 & MySQL >= 5.7

Here is a list of feature included in UMS LITE

1.  USER MANAGEMENT & LEVELS
2.  Admin dashboard
3.  Create Accounts & Password Reset
4.  Support for multiple themes (two included)
5.  Easy to follow Controller based system
6.  Pretty URLS out of the box
7.  Should work on any shared / dedicated apache server

**This is a lightweight application**: please weigh up your options with all frameworks. Yes, this can be adapted and built upon to accommodate for most uses, we do not recommend building extremely large scale applications using this. (I.E, Facebook this probably won't be an upgrade from your user management system, but who knows? Hi Mark Zuckerberg) 

Personal use cases so far:

1.  eCommerce dashboard & stock manager
2.  Web hosting & cloud API dashboard
3.  Online payment gateway with crypto trading

demo url [here](https://builtontheweb.co.uk/)
Accounts:
| Username | Password | Account Level |
|----	|----|----|
| demo@demo.com | 12345678 | Admin (7) |
| demo2@demo.com | 12345678 | Basic (1) |

Feel free to try out the account register process too, it's super simple! (Email verification is required - all accounts are terminated after 15 mins)	

* * * * *

Installation & Usage
------------------------

**Using GIT** *recommended*
Firstly clone this repository
```git
git clone https://github.com/builtontheweb/ums-lite
```

Now use composer (This will install all the dependencies (vendor folder) - )

```composer
composer install
```
**USING ZIP** *for shared hosts*

1. download this file [ums-lite.zip](https://builtontheweb.co.uk/dl/umslite.zip) ~~Choose the latest version~~ Coming soon
2. Upload to your server & unzip
3. Ensure the .htaccess files are there (if not rename htaccess.zip to .htaccess)

**Shared Instructions** *must follow carefully*

1. Create an empty database
2. open *application/config/config.development.php* and edit the following code with your details:
```php
    'DB_TYPE' => 'mysql',
    'DB_HOST' => '127.0.0.1',
    'DB_NAME' => 'DatabaseName',
    'DB_USER' => 'DatabaseUser',
    'DB_PASS' => 'DatabasePass',
    'DB_PORT' => '3306',
    'DB_CHARSET' => 'utf8',
```
Find these lines 
*You will need to use an SMTP enabled email account or us Mailgun SMTP*
```php
    'EMAIL_USED_MAILER' => 'phpmailer',
    'EMAIL_USE_SMTP' => true,
    'EMAIL_SMTP_HOST' => 'mail.yourprovider.com',
    'EMAIL_SMTP_AUTH' => true,
    'EMAIL_SMTP_USERNAME' => 'youremail',
    'EMAIL_SMTP_PASSWORD' => 'youremailpass',
    'EMAIL_SMTP_PORT' => 465,
    'EMAIL_SMTP_ENCRYPTION' => 'ssl',
    /**
     * Configuration for: Email content data
     */
    'EMAIL_PASSWORD_RESET_URL' => 'login/verifypasswordreset',
    'EMAIL_PASSWORD_RESET_FROM_EMAIL' => 'no-reply@ums-lite.com',
    'EMAIL_PASSWORD_RESET_FROM_NAME' => 'User Management LITE',
    'EMAIL_PASSWORD_RESET_SUBJECT' => 'Password reset for User Management LITE',
    'EMAIL_PASSWORD_RESET_CONTENT' => 'Please click on this link to reset your password: ',
    'EMAIL_VERIFICATION_URL' => 'register/verify',
    'EMAIL_VERIFICATION_FROM_EMAIL' => 'no-reply@ums-lite.com',
    'EMAIL_VERIFICATION_FROM_NAME' => 'User Management LITE',
    'EMAIL_VERIFICATION_SUBJECT' => 'Account activation for User Management LITE',
    'EMAIL_VERIFICATION_CONTENT' => 'Please click on this link to activate your account: ',
```
3. Now rename this file to *config.live.php*
4. open access your database (probably phpMyAdmin) and import / copy and paste the contents of *application/_installation/install_user_management_lite.sql*
if you cant find the file here's the sql:
```SQL
CREATE TABLE IF NOT EXISTS `users` (
 `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
 `session_id` varchar(48) DEFAULT NULL COMMENT 'stores session cookie id to prevent session concurrency',
 `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
 `user_password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s password in salted and hashed format',
 `user_email` varchar(254) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
 `user_full_name` varchar(254) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s full name',
 `user_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s activation status',
 `user_deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s deletion status',
 `user_account_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'user''s account type (basic, premium, etc)',
 `user_has_avatar` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if user has a local avatar, 0 if not',
 `user_remember_me_token` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s remember-me cookie token',
 `user_creation_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the creation of user''s account',
 `user_suspension_timestamp` bigint(20) DEFAULT NULL COMMENT 'Timestamp till the end of a user suspension',
 `user_last_login_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of user''s last login',
 `user_failed_logins` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s failed login attempts',
 `user_last_failed_login` int(10) DEFAULT NULL COMMENT 'unix timestamp of last failed login attempt',
 `user_activation_hash` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s email verification hash string',
 `user_password_reset_hash` char(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s password reset code',
 `user_password_reset_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the password reset request',
 `user_provider_type` text COLLATE utf8_unicode_ci,
 PRIMARY KEY (`user_id`),
 UNIQUE KEY `user_name` (`user_name`),
 UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

INSERT INTO `users` (`user_id`, `session_id`, `user_name`, `user_password_hash`, `user_email`, `user_full_name`, `user_active`, `user_deleted`, `user_account_type`,
`user_has_avatar`, `user_remember_me_token`, `user_creation_timestamp`, `user_suspension_timestamp`, `user_last_login_timestamp`,
`user_failed_logins`, `user_last_failed_login`, `user_activation_hash`, `user_password_reset_hash`,
`user_password_reset_timestamp`, `user_provider_type`) VALUES
  (1, NULL, 'demo', '$2y$10$OvprunjvKOOhM1h9bzMPs.vuwGIsOqZbw88rzSyGCTJTcE61g5WXi', 'demo@demo.com','Demo Admin', 1, 0, 7, 0, NULL, 1422205178, NULL, 1422209189, 0, NULL, NULL, NULL, NULL, 'DEFAULT'),
  (2, NULL, 'demo2', '$2y$10$OvprunjvKOOhM1h9bzMPs.vuwGIsOqZbw88rzSyGCTJTcE61g5WXi', 'demo2@demo.com','Demo User', 1, 0, 1, 0, NULL, 1422205178, NULL, 1422209189, 0, NULL, NULL, NULL, NULL, 'DEFAULT');

CREATE TABLE IF NOT EXISTS `notes` (
 `note_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
 `note_text` text NOT NULL,
 `user_id` int(11) unsigned NOT NULL,
 PRIMARY KEY (`note_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user notes';

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siteTitle` varchar(255) NOT NULL,
  `contactEmail` varchar(255) NOT NULL,
  `topBarTheme` varchar(55) NOT NULL DEFAULT 'bg-white navbar-dark',
  `sideBarTheme` varchar(55) NOT NULL DEFAULT 'sidenav-dark',
  `VERSION` varchar(15) NOT NULL,
  `filePath` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `settings` (`id`, `siteTitle`, `contactEmail`, `topBarTheme`, `sideBarTheme`, `VERSION`, filePath) VALUES
(1, 'User management LITE', 'info@emailaddress.com', 'bg-white navbar-light', 'sidenav-dark', '1.0.0 build 1', 'null');
```
This installs the two demo users

5. Login in as demo | 12345678 & you can change all the account info from the dashboard (or create a new account and just update the *database > users > user_level* from 1 to 7)


**Making Changes**
*Changing the theme*: to change the theme edit *application/config/config.live.php* and change this line:
```php
'THEME' => 'classic', //Pre-installed themes are: modern or classic
```

I am planning on making these editable via the dashboard



* * * * *

Creating New Pages & Controllers
------------------------

First let's discuss the way pages are rendered. it's not your simple page.php (link.com/page.php) we use controllers and constructors.
**Understanding the layout**
each link is made up of the base domain (can be in a sub folder) for this example we are assuming it is in the root folder
*e.g.* https://builtontheweb.co.uk/dashboard/index
let's break this down with some examples:

root/dashboard/index
| BASE | Controller | Page |
|---|---|---|
| [root] | *application/Controller/DashboardController.php* | *application/views/theme/dashboard/index.php* |

root/user/updatePassword
| BASE | Controller | Page |
|---|---|---|
| [root] | *application/Controller/UserController.php* | *application/views/theme/dashboard/updatePassword.php* |

In the *application/Controllers* directory

Example Controller file (*application/Controllers/DashboardController.php*)
```PHP
<?php

/**
 * This controller shows an area that's only visible for logged in users (because of Auth::checkAuthentication(); in line 16)
 */
class DashboardController extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();

        // this entire controller should only be visible/usable by logged in users, so we put authentication-check here
        Auth::checkAuthentication();
    }

    /**
     * This method controls what happens when you move to /dashboard/index in your app.
     */
    public function index()
    {
        $this->View->render('dashboard/index', array(
            'user_name' => Session::get('user_name'),
            'user_email' => Session::get('user_email'),
            'user_gravatar_image_url' => Session::get('user_gravatar_image_url'),
            'user_avatar_file' => Session::get('user_avatar_file'),
            'user_account_type' => Session::get('user_account_type')
        ));
    }
}
```
For each page in your *application/views/theme/dashboard/...* folder you need to construct it in the Controller (*DashboardController.php* in this case) 

So lets say we want a page called **overview** which we want to show as *link/dashboard/overview*. 
1. We need to create the file *application/views/{theme}/dashboard/overview.php*
2. Now we need to construct the page in the *DashboardController.php* file we do this by creating a new public function and naming it to how we want to type it in the url (i.e a public function named *test* will be accesible by typing root/dashboard/test - We want to call it overview. we then want to tell it where to find the file to load from (you don't need to add *.php* that's added later automatically). The View->render() section is where we put the file location (**you only need the folder and the file** - the rest of the file location is configured) Below is an example of the new *DashboardController.php* file with overview added
```PHP
<?php

/**
 * This controller shows an area that's only visible for logged in users (because of Auth::checkAuthentication(); in line 16)
 */
class DashboardController extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();

        // this entire controller should only be visible/usable by logged in users, so we put authentication-check here
        Auth::checkAuthentication();
    }

    /**
     * This method controls what happens when you move to /dashboard/index in your app.
     */
    public function index()
    {
        $this->View->render('dashboard/index', array(
            'user_name' => Session::get('user_name'),
            'user_email' => Session::get('user_email'),
            'user_gravatar_image_url' => Session::get('user_gravatar_image_url'),
            'user_avatar_file' => Session::get('user_avatar_file'),
            'user_account_type' => Session::get('user_account_type')
        ));
    }
	//example code
	public function overview()
    {
        $this->View->render('dashboard/overview', array(
            'user_name' => Session::get('user_name'),
            'user_email' => Session::get('user_email'),
            'user_gravatar_image_url' => Session::get('user_gravatar_image_url'),
            'user_avatar_file' => Session::get('user_avatar_file'),
            'user_account_type' => Session::get('user_account_type')
        ));
    }
}
```
3. Now you can make your page content in: *views/{theme}/dashboard/overview.php* **Note**: YOu only need to add the main content (The header and footer is managed by the header and footer file within *application/view/{theme}/_templates/...*

**Creating a new controller**
Example Controller Code:
```php
<?php

/**
 * This controller shows an area that's only visible for logged in users (because of Auth::checkAuthentication(); in line 16)
 */
class ExampleController extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();

        // this entire controller should only be visible/usable by logged in users, so we put authentication-check here
        Auth::checkAuthentication();
    }

    /**
     * This method controls what happens when you move to /example/index in your app.
     */
    public function index()
    {
        $this->View->render('example/index', array(
            'user_name' => Session::get('user_name'),
            'user_email' => Session::get('user_email'),
            'user_gravatar_image_url' => Session::get('user_gravatar_image_url'),
            'user_avatar_file' => Session::get('user_avatar_file'),
            'user_account_type' => Session::get('user_account_type')
        ));
    }
}

```
1. Create your new controller in *application/controller/...* name it whatever you want your sub link to be named (use capitals for the first letter and the 'C' in controller) e.g OrdersController.php - use the other files as an indicator 
2. Create a new folder in *application/view/{theme}/...* with the name of your controller (all lowercase)
3. Create your first file within that folder (index.php)
4. Change the class name to the name you just named your Controller (OrdersController)
5. Setup your first page (Follow the instructions for creating a new page) index is already setup in the example code above - you just have to edit the render to the name of your folder (hence why all lowercase for the folder)
6. To add new pages follow the above instructions
7. The `array(...)` section after render allows you to pass custom variables (which are accessed by `$this->array_key` *where array key is the name of the variable you passed*

**Creating pages with passed variables**
You can create a page with a passed variables - example case would be if you're linking to a page where you want to load dynamic content based of a variable - instead of ugly GET parameters you can use the following structure *link/controller/page/{variable}* - but how do we do this? Let's build off the ExampleController Above: 
All you have to do is in *public function pagename($variable)* - just add the variable you're passing. now anything after */example/pagename/...* will be assigned to a variable called $variable - we can then add that to the render(array()) - We can also add an if statement to redirect back to the homepage if no variable is passed.
**See Below**
```php
<?php

/**
 * This controller shows an area that's only visible for logged in users (because of Auth::checkAuthentication(); in line 16)
 */
class ExampleController extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();

        // this entire controller should only be visible/usable by logged in users, so we put authentication-check here
        Auth::checkAuthentication();
    }

    /**
     * This method controls what happens when you move to /example/index in your app.
     */
    public function index()
    {
        $this->View->render('example/index', array(
            'user_name' => Session::get('user_name'),
            'user_email' => Session::get('user_email'),
            'user_gravatar_image_url' => Session::get('user_gravatar_image_url'),
            'user_avatar_file' => Session::get('user_avatar_file'),
            'user_account_type' => Session::get('user_account_type')
        ));
    }
    
    public function pagename($variable) // e.g. /example/pagename/123 ($variable = 123)
    {
	    if(isset($variable)){
	        $this->View->render('example/pagename', array(
	            'user_name' => Session::get('user_name'),
	            'user_email' => Session::get('user_email'),
	            'user_gravatar_image_url' => Session::get('user_gravatar_image_url'),
	            'user_avatar_file' => Session::get('user_avatar_file'),
	            'user_account_type' => Session::get('user_account_type'),
	            'id' => $variable //Accessible via $this->id
	        ));
		} else {
			Redirect::home();
		}
    }
}

```

With a bit of playing around you'll find many more ways to extend this system to your needs.

Adding models is more advanced, and if you want to do that you probably won't need instructions

* * * * *

Understanding the public/... folder
------------------------
In *public/vendor* is not the composer autoload (this is in *vendor/*) this is the core files for the dashboards public controls - you can also add your own php functions etc within *public/vendor/function_files/core.php*

You can create new themes by adding the css /js /img / font files in a new directory For example: *public/themes/NEW_THEME/...*

You can then create a new theme in  *application/view/NEW_THEME/..* bare in mind you will have to create all the pages and folders with your new theme -- following the same structure (I'd copy and paste an old theme - rename the {theme} directory and edit them that way!

Happy coding! - I'll be adding updated as I get my free time 
