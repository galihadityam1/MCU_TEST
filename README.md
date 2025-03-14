# Employee Task Management

Sistem sederhana untuk menampilkan daftar karyawan dan tugas yang diberikan kepada mereka menggunakan **Laravel, Bootstrap, dan Next.js**.

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

---
## 📖 Struktur Database

### Tabel Employees
| id  | name       | position  |
| --- | --------- | --------- |
| 1   | Nafsirudin | Developer |
| 2   | Putri     | Designer  |

### Tabel Tasks
| id  | employees_id | task_name                     | due_date  |
| --- | ------------ | ---------------------------- | --------- |
| 1   | 1           | Mengerjakan API               | 2024-09-15 |
| 2   | 2           | Membuat desain UI halaman create | 2024-09-20 |
| 3   | 1           | Slicing HTML                  | 2024-08-02 |
| 4   | 2           | Membuat icon                  | 2024-10-03 |
| 5   | 2           | Mengubah ukuran gambar        | 2024-10-03 |

---
## 🔗 API Endpoint

### **1. Ambil daftar karyawan & tugas**
```http
GET /api/employees
```

### **2. Tambah tugas baru**
```http
POST /api/task
```
**Body:**
```json
{
  "employee_id": 1,
  "task_name": "Membuat API",
  "due_date": "2024-09-15"
}
```

---
## 🚀 Cara Menggunakan
1. Buka **http://localhost:3000** di browser.
2. Lihat daftar karyawan dan tugas yang mereka miliki.
3. Tambah tugas baru melalui form tanpa reload halaman.

---
## 🤝 Kontribusi
Pull request selalu diterima! Silakan fork repo ini dan buat perubahan yang diperlukan.

---
## 📜 Lisensi
Proyek ini menggunakan lisensi **MIT**.

