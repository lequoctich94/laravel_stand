# Blade Template sử dụng component
# Sử dụng  jetstream để thực hiện authen https://jetstream.laravel.com/2.x/introduction.html

 composer require laravel/jetstream
 php artisan jetstream:install livewire --teams
 npm install
 npm run dev
 php artisan migrate
 php artisan vendor:publish --tag=jetstream-views
 
 # lưu ý: thêm này vào app config 
 #Target [Laravel\Fortify\Contracts\CreatesNewUsers] is not instantiable.
 App\Providers\FortifyServiceProvider::class,
 App\Providers\JetstreamServiceProvider::class,

   # cach su dung va custom
   # config
   config/fortify.php
   # class authen
   app/Actions
   resources/views
   # view
   resources/views/auth/login.blade.php


   # Custom template, and process authen
   https://jetstream.laravel.com/2.x/features/authentication.html

   composer require laravel/jetstream
   # Register
   Custom register
   app/action/Fority/CreateNewUser.php line 25
   resources\views\auth\register.blade.php
   Thêm account vào model user fillable

   # Login
   Custom login
   - Change user name: config/fortify.php => change 'username' => 'email'  ->>>>>>>  'username' => 'account'
   - i want to login by account and email => change in JetstreamServiceProvider

   # Route Authen
    laravel_stand\vendor\laravel\fortify\routes\routes.php 
    có thể lấy ra ghi đề nếu cần custom thêm

   # Team
   https://jetstream.laravel.com/2.x/features/teams.html
   
   # Permission middleware
   # ---------------------------------------------------------------------------------------------------------------------------
   # Eloquent relation ship
   # Chi tiết bên controller RelationEloquent
   # ---------------------------------------------------------------------------------------------------------------------------
   # Exel
   # https://docs.laravel-excel.com/3.1/exports/export-formats.html

   - composer require maatwebsite/excel
   - add in config/app
     Maatwebsite\Excel\ExcelServiceProvider::class,
    'Excel' => Maatwebsite\Excel\Facades\Excel::class,
    php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config


    Import: Phải tạo 1 lớp Import trước khi thực hiện import, nếu không sẽ không import được (không ra lỗi)
    C:\xampp8.0\htdocs\laravel_stand\app\Imports\CsvImport.php

    ----------------

    Import sử dụng queue
    - Nên chuyển sang chế độ queue driver là database
      env: QUEUE_CONNECTION=database
      php artisan q()ueue:table
      php artisan migrate 

      chạy queue
      php artisan queue:work
    --------------------------------
    Export
    sử dụng Excel::download() phải return để file được tải về


    
    # Lưu Ý
    Khi sử dụng 1 inteface, kiểm tra xem đã implement chúng chưa



  # Sử dung flag session để in thông báo

  # --------------------------------------------------------------------------------------------------------------------------------
  # Email: https://laravel.com/docs/8.x/mail#configuration
  Nếu sài mail gun (không thì thôi)
    cài driver mail gun
    composer require guzzlehttp/guzzle
  Nếu sài SES Driver
    cũng phải cài

  Mặc định thì sài STMP

  ----------------------
  Tạo email
  php artisan make:mail ModelSendMail

  Lưu ý: 
  nếu không có severemail thì test bằng mail trap
     MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=517016213ebf71
    MAIL_PASSWORD=1f8cb63b6108cf
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS=from@example.com
    MAIL_FROM_NAME="${APP_NAME}"
Account và pass đăng kí trên mail trap

# Crawler
Sử dụng thư viện 
 "kub-at/php-simple-html-dom-parser": "^1.9"

# Reponsitory

- Interface: App/Contracts/Repositories
- Repository: App/Repositories
- Controller:Controllers/RepositoryController
- Depency interface: AppServiceProvider.php

