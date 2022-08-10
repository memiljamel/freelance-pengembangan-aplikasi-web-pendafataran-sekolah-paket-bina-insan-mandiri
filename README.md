# Setup Laravel Mode Production
1. Terapkan perubahan pada file .env:
   * APP_ENV=production
   * APP_DEBUG=false
2. Yakinkan bahwa kamu telah optimizing Composer's class autoloader map:
   * ```
     composer dump-autoload --optimize
     ```
   * atau bersamaan dengan menginstall
     ```
     composer install --optimize-autoloader --no-dev
     ```
   * atau bersamaan dengan mengupdate
     ```
     composer update --optimize-autoloader
     ```
3. Mengoptimalkan pemuatan konfigurasi
   ```
   php artisan config:cache
   ```
4. Mengoptimalkan Pemuatan Rute
   ```
   php artisan route:cache
   ```
5. Compile semua templat Blade aplikasi
   ```
   php artisan view:cache
   ```
6. Cache file bootstrap
   ```
   php artisan optimize
   ```
7. (Opsional) Mengkompilasi aset [(docs)](https://laravel.com/docs/master/mix#running-mix)
     ```
     npm run production
     ```
8. (Opsional) Buat kunci enkripsi yang dibutuhkan Laravel Passport [(docs)](https://laravel.com/docs/master/passport#deploying-passport)
     ```
     php artisan passport:keys
     ```
9. (Opsional) Mulai penjadwal tugas Laravel dengan menambahkan entri Cron berikut [(docs)](https://laravel.com/docs/master/scheduling#introduction)
     ```
     php artisan passport:keys
     ```
10. (Opsional) Install, konfigurasi, dan mulai Supervisor [(docs)](https://laravel.com/docs/master/queues#supervisor-configuration)
     ```
     * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
     ```
12. (Opsional) Buat tautan simbolis dari public/storage ke storage/app/public [(docs)](https://laravel.com/docs/master/filesystem#the-public-disk)
     ```
     php artisan storage:link
     ```

Sumber: [https://stackoverflow.com/questions/59663762/laravel-what-steps-should-one-take-to-make-a-laravel-app-ready-for-production](https://stackoverflow.com/questions/59663762/laravel-what-steps-should-one-take-to-make-a-laravel-app-ready-for-production)

# Cara Hosting
1. Upload file project tahap production ke folder public_html.
2. Jika file .env tidak ditemukan, klik tombol settings yang berada kiri atas. Kemudian centang Show Hidden Files (dotfiles) dan klik Save.
3. Buat file baru di root project (public_html) dengan nama .htaccess.
4. Kemudian isikan file tersebut dengan kode berikut

```
<IfModule mod_rewrite.c> 
    RewriteEngine On 
    
    RewriteCond %{HTTPS} off
    RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
    RewriteCond %{REQUEST_URI} !^public/
    RewriteRule ^(.*)$ public/$1 [L] #relative substitution
</IfModule>
```

5. Coba akses domain hosting, besar kemungkinan aplikasi web kamu telah bekerja.
