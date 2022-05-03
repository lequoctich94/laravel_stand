# Sử dụng  jetstream để thực hiện authen https://jetstream.laravel.com/2.x/introduction.html

 composer require laravel/jetstream
 php artisan jetstream:install livewire --teams (có thể bỏ --team nếu không muốn sài)
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
   - thay đổi target sau khi login:app\Providers\RouteServiceProvider.php line 20 HOME

   # Route Authen
    laravel_stand\vendor\laravel\fortify\routes\routes.php 
    có thể lấy ra ghi đề nếu cần custom thêm

   # Team
   https://jetstream.laravel.com/2.x/features/teams.html

   # khi tạo mới user sẽ được làm 1 admin của 1 team mới, personal team = 1, acc này có quyền tạo group mới và invite người khác vào group
   # nên custom cái mới để sử dụng


   # Bật tắt các tính năng như team, api, image user... comment hoặc mở comment ở: features (line 58) trong config.jestream
   # ---------------------------------------------------------------------------------------------------------
   # 
   # Authen API sử dụng jetstream
   # jestream đã cài đặt sẵn Santum. đây là thư viện cho phép authen bằng api một cách đơn giản
   # bật api: config.jestream
   https://laravel.com/docs/8.x/sanctum#token-abilities

   còn chưa có thì cài đặt: composer require laravel/sanctum

   # public config: 
   php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
   -> đặt xác thực api cho route api, setting tại: Sanctum Guards
   # nếu chưa có bảng personal_access_tokens
   php artisan migrate

   # thêm middleware này vào app/Http/Kernel.php, api: 
   'api' => [
    \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
    'throttle:api',
    \Illuminate\Routing\Middleware\SubstituteBindings::class,
  ],

   # thêm HasApiTokens và user model
   # Ta có thể tạo token bằng UI ở route:user/api-tokens, hoặc tạo bằng controller:Api/Login
   # Với middleware middleware('auth:sanctum') ở api, sẽ yêu cầu kèm thêm authen ở header,
   ví dụ
   http://127.0.0.1:8000/api/user
   Header: 
   [{"key":"Authorization","value":"Bearer eFr23ghWemWwpxASMaLIQioOYnWv8QIF6ESKtU2s","description":"","type":"text","enabled":true}]
   testpost man:
   Authorization => Bearer eFr23ghWemWwpxASMaLIQioOYnWv8QIF6ESKtU2s
   
   # -------------------------------------------------------------------------------------------------------------
   # Sử Dụng Passport
