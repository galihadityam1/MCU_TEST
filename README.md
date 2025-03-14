# Employee Task Management


## 📌 Fitur Utama
- **Daftar Karyawan & Tugas**: Menampilkan nama karyawan, tugas, dan due date dalam bentuk tabel.
- **Tambah Tugas Baru**: Form untuk menambahkan tugas ke karyawan tertentu tanpa reload halaman (**AJAX/React hooks**).

## 🛠️ Teknologi yang Digunakan
- **Backend**: Laravel 12.2.0,
- **Frontend**: Next.js, Bootstrap
- **API**: REST API menggunakan Laravel

---
## ⚙️ Instalasi & Konfigurasi

### 1️⃣ Clone Repository
```sh
$ git clone https://github.com/username/MCU_TEST.git
$ cd employee-task-management
```

### 2️⃣ Setup Backend (Laravel)
```sh
$ cd backend_laravel
$ composer install
$ cp .env.example .env
$ php artisan key:generate
```

**Konfigurasi Database di `.env`**:
```env
DB_DATABASE=employee_task_management
DB_USERNAME=root
DB_PASSWORD=yourpassword
```

**Jalankan migrasi & seeder:**
```sh
$ php artisan migrate --seed
```

**Jalankan server Laravel:**
```sh
$ php artisan serve
```

### 3️⃣ Setup Frontend (Next.js)
```sh
$ cd frontend_nextjs
$ npm install
```

**Jalankan server Next.js:**
```sh
$ npm run dev
```

