
Nom: Safoora Mansouri
GitHub: https://github.com/Safoora-Mansouri/TP1-laravel.git
WebDev: https://e2296145.webdev.cmaisonneuve.qc.ca/TP1-laravel/newProject

-------------------------------------------------------------------------------------------------------------------
documentation:

In this website, the registration process is the fi rst step for users. Once registered, they can log in to the site. The website off ers complete language support, allowing users to experience it in two languages. If a user visits the site as a guest, they will be greeted with the message "Hello, guest." On the other hand, logged-in users will be greeted with "Hello, user."
Accessing the article page is restricted to registered students only.
Users must register as students before they can view the articles. After obtaining a unique student ID, they can access the article page. All students have the ability to create articles, but only the author of an article can delete or update it. The website supports bilingual functionality, meaning that students can enter information in both French and English. Regardless of the chosen language, articles are accessible in both languages.
Similar rules apply to documents. All inputs are validated to ensure data integrity. Additionally, users can upload and download fi les within the document section of the website. Lastly, users have the option to log out when they are fi nished using the site.
This guide provides an overview of the website's registration process, language support, access restrictions, article creation and management, bilingual functionality,
document handling, input validation, and logout feature. For a more detailed and expert analysis, it would be necessary to consider specifi c implementation details, database structure, security measures, and any additional features or requirements of the website.

--------------------------------------------------------------------------------------------------------------------
Commands:

-php artisan make:Controller DocumentController -r

-php artisan make:model Document

-php artisan make:factory DocumentFactory

-php artisan migrae:fresh

-php artisan db:seed

-php artisan make:model Article

-php artisan make:factory ArticleFactory

-php artisan make:migration -m Article

-php artisan make:Controller ArticleController -r

-php artisan make:Controller LocalizationController

-php artisan make:middleware Localization

-php artisan make:Controller CustomAuthController

-php artisan make:middleware testMid

-php artisan make:controller localizationController

-php artisan tinker "App\Models\Ville::factory()->times(15)->create();"

i do not use it in project , just write a function for download and upload the fi les instead.

-composer require barryvdh/laravel-dompdf


----------------------------------------------------------------------------------------------------------------------

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
