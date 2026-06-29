# Breeze Blog - Laravel

Platform blogging sederhana dan elegan yang dibangun dengan Laravel dan Breeze.

## Fitur

- 📝 Sistem manajemen artikel/blog
- 👤 Autentikasi pengguna dengan Laravel Breeze
- 📁 Kategori untuk organisasi artikel
- 🖼️ Avatar pengguna
- 📱 Responsive design
- 🔐 Autentikasi dan otorisasi
- 📊 Dashboard pengguna

## Persyaratan Sistem

Sebelum memulai, pastikan Anda memiliki:

- **PHP** >= 8.2
- **Composer** (untuk mengelola dependensi PHP)
- **Node.js** >= 18 dan **npm** atau **yarn** (untuk aset frontend)
- **Database**: MySQL, PostgreSQL, SQLite, atau SQL Server
- **Git** (untuk clone repository)

## Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/yourusername/breeze_blog_laravel.git
cd breeze_blog_laravel
```

### 2. Install Dependensi PHP

```bash
composer install
```

### 3. Install Dependensi JavaScript

```bash
npm install
# atau jika menggunakan yarn
yarn install
```

### 4. Setup Konfigurasi Environment

Copy file `.env.example` ke `.env`:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

### 5. Konfigurasi Database

Edit file `.env` dan sesuaikan konfigurasi database Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=breeze_blog
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Jalankan Migrasi Database

```bash
php artisan migrate
```

### 7. Seed Database (Opsional)

Untuk mengisi database dengan data dummy:

```bash
php artisan db:seed
```

### 8. Build Frontend Assets

```bash
npm run build
# atau untuk development dengan hot reload
npm run dev
```

## Menjalankan Aplikasi

### Opsi 1: Menggunakan Artisan Server

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

### Opsi 2: Menggunakan Laravel Valet (Recommended untuk macOS/Linux)

```bash
valet link
valet open
```

## Development

Untuk development dengan hot reload:

```bash
npm run dev
```

Di terminal lain, jalankan Laravel server:

```bash
php artisan serve
```

## Testing

Jalankan test suite menggunakan Pest:

```bash
php artisan test
```

Dengan coverage:

```bash
php artisan test --coverage
```

## Struktur Folder

```
├── app/
│   ├── Http/Controllers/      # Controller aplikasi
│   ├── Models/               # Model Eloquent (User, Post, Category)
│   └── Providers/            # Service Provider
├── database/
│   ├── migrations/           # Database migration files
│   ├── seeders/              # Database seeder
│   └── factories/            # Factory untuk testing
├── resources/
│   ├── views/                # Blade template views
│   ├── js/                   # JavaScript files
│   └── css/                  # CSS files
├── routes/
│   ├── web.php              # Web routes
│   ├── auth.php             # Authentication routes (Breeze)
│   └── console.php          # Console commands
├── storage/                 # Penyimpanan file (logs, cache)
└── tests/                   # Test files
```

## Fitur Utama

### Autentikasi
- Register dan Login dengan email
- Password reset
- Email verification
- Profile management

### Artikel/Blog
- Create, Read, Update, Delete artikel
- Kategorisasi artikel
- Tampilkan artikel berdasarkan kategori
- Search artikel

### Pengguna
- User profile dengan avatar
- User management untuk admin
- Role-based access control

## Troubleshooting

### Masalah Umum

**Error: "No application encryption key has been specified"**
```bash
php artisan key:generate
```

**Database connection error**
- Pastikan database sudah dibuat
- Periksa konfigurasi `.env` file
- Pastikan database server sedang berjalan

**Permission denied pada folder storage**
```bash
chmod -R 775 storage bootstrap/cache
```

**Npm module tidak ditemukan**
```bash
rm -rf node_modules package-lock.json
npm install
```

## Kontribusi

Kami menerima kontribusi! Silakan:

1. Fork repository
2. Buat feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## License

Proyek ini dilisensikan di bawah MIT License. Lihat file [LICENSE](LICENSE) untuk detail lebih lanjut.
