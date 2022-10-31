## 🛠️ Confido Development

### Pre-Requirement
- Sebelum menggunakan platform, terlebih dahulu perlu menginstall bahasa pemrograman `PHP` dan `Composer`

### Clone Via GIT
> #### clone [github repository](https://github.com/beranidigital/inventory-system.git)
Jalankan perintah git untuk menyalin project ke local system
```sh
git clone https://github.com/FikriDean/confido.git
```

### Download Via ZIP

#### Atau download versi ZIP dibawah ini
> [Download ZIP](https://github.com/FikriDean/confido/archive/refs/heads/main.zip)

### Inventory System App Setup

#### Create `.env` File
- Gunakan file .env.example untuk membuat file `.env` baru. Silahkan atur sesuai keperluan.
```sh
cp .env.example .env
```

#### `.env` File Configuration
- Konfigurasi Database di file `.env`

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventory
DB_USERNAME=root
DB_PASSWORD=password
```

- Konfigurasi `APP` di file `.env` (Opsional)

```sh
APP_NAME=confido
APP_ENV=local
APP_KEY=base64:Rxk2gFb8KpFzcUfTc+uleho30kw/L/GwRnwfZ+9cY2M=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000/
```

#### Install Composer
- Install composer terlebih dahulu
```sh
composer install
```

- Jalankan perintah `generate key`

```sh
php artisan key:generate
```

#### Make Database
- Buat `database` dengan nama yang sesuai dengan nama database yang ada di file `.env`.

#### Migration
- Setelah itu, jalankan perintah `migrate` pada projek ini sehingga dapat membuat tabel-tabel yang diperlukan di database.
```sh
php artisan migrate
```

#### Database Seeder
- Gunakan database seeder yang terdapat di project `Inventory System` ini. Jalankan perintah berikut
```sh
php artisan migrate:fresh --seed
```

#### Install and run NPM
- Instal and run NPM
```sh
npm install
```

```sh
npm run dev
```

#### Run Application
- Jalankan perintah untuk menjalankan aplikasi di local system
```sh
php artisan serve
```
