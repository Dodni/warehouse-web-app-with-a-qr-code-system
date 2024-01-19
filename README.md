# warehouse-web-app-with-a-qr-code-system

# Install:

 1. IMPORTANT! Change the main directory to "qr_kod_app" or set the dir name in the .htaccess second line: RewriteBase /qr_kod_app/  <- HERE
 2. IMPORTANT! Change the .htaccess.txt format to the .htaccess
 3. IMPORTANT! Set your database in the system/config.php file
 4. Set your base url to yours in the system/config.php file

 # Directory structure:
 ```
qr_kod_app/ 
├── app/ 
│   └── controllers/ 
│       └── about_controller.php
│       └── admin_controller.php
│       └── egyke_termek_controller.php
│       └── home_controller.php
│       └── login_controller.php
│       └── logout_controller.php
│       └── oldal_controller.php
│       └── qr_kod_controller.php
│       └── raktarkeszlet_controller.php
│       └── raktarkeszlet_csoportositott_termek_controller_controller.php
│       └── raktarkeszlet_uj_termek_hozzadasa_controller.php
│       └── TermekInfoAPI_controller.php
│   └── javascript/
│       └── ellenorizEsKuld.js 
│       └── keresesTabla.js 
│       └── menu.js 
│   └── models/ 
│       └── oldal_model.php 
│       └── termekInfoAPI_model.php 
│       └── test_model.php 
│       └── user_model.php 
│   └── views/ 
│       └── about_view.php 
│       └── admin_view.php 
│       └── egyke_termek_view.php 
│       └── error_view.php 
│       └── footer_view.php 
│       └── header_view.php 
│       └── home_view.php 
│       └── login_view.php 
│       └── logout_view.php 
│       └── qr_kod_view.php 
│       └── raktarkeszlet_csoportositott_termek_view.php 
│       └── raktarkeszlet_uj_termek_hozzaadasa_view.php 
│       └── raktarkeszlet_view.php 
├── public/ 
│   └── css/
│       └── style.css 
│   └── img/ 
│       └── qrcode.png
│   └── production_images/
├── system/ 
│   └── config.php 
│   └── database.php 
├── index.php 
├── init.php 
├── route.php 
└── .htaccess
```

