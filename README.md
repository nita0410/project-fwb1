<p align="center"><strong>Sistem Informasi menajemen data barang elektronik</strong></p>

<div align="center">

![logo_unsulbar](public/logo.jpeg)

 

<b>Nita</b><br>
<b>D0222044</b><br>
<b>Framework Web Based</b><br>
<b>2025</b>
</div>

---
### FITUR DAN ROLE
### 1. **Admin**
- **mengelola data Pengguna**: 
- **mengelola Data barang**: 
- **Kelola Kategori Barang**:
- **melihat dan mengedit semua data barang**: 
- **Backup dan Restore Data**:

### 2. **Petugas Gudang/Staf**
- **Input Barang Masuk**:
- **Input Barang Keluar**:
- **Update Kondisi Barang**:
- **Lihat Detail dan Stok Barang**:
- **Cetak Laporan**:

### 3. **Manajer**
- **Lihat Laporan data barang**: 
- **Lihat Riwayat Barang Masuk & Keluar** 
- **melakukan persetujuan barang masuk dan keluar** 

---
### 1. **users**
| Field           | Tipe Data       | Keterangan                  |
|----------------|-----------------|-----------------------------|
| id             | BIGINT (Auto)   | Primary key                 |
| name           | VARCHAR(100)    | Nama pengguna               |
| email          | VARCHAR(100)    | Email unik                  |
| password       | VARCHAR(255)    | Password terenkripsi        |
| role           | ENUM            | admin, staf, manajer        |
| created_at     | TIMESTAMP       |                             |
| updated_at     | TIMESTAMP       |                             |

---

### 2. **categories**
| Field           | Tipe Data       | Keterangan                  |
|----------------|-----------------|-----------------------------|
| id             | BIGINT (Auto)   | Primary key                 |
| name           | VARCHAR(100)    | Nama kategori barang        |
| created_at     | TIMESTAMP       |                             |
| updated_at     | TIMESTAMP       |                             |

---

### 3. **items** (Data master barang)
| Field           | Tipe Data       | Keterangan                      |
|----------------|-----------------|---------------------------------|
| id             | BIGINT (Auto)   | Primary key                     |
| name           | VARCHAR(100)    | Nama barang                     |
| category_id    | BIGINT          | Foreign key → categories.id     |
| stok           | INTEGER(50)     | Jumlah stok                     |
| price          | Decimal         | harga  satuan                   |
| condition      | ENUM            | baik, rusak, servis             |
| created_at     | TIMESTAMP       |                                 |
| updated_at     | TIMESTAMP       |                                 |

---

### 4. **incoming_items** (Barang masuk)
| Field           | Tipe Data       | Keterangan                      |
|----------------|-----------------|---------------------------------|
| id             | BIGINT (Auto)   | Primary key                     |
| item_id        | BIGINT          | Foreign key → items.id          |
| quantity       | INTEGER         | Jumlah barang masuk             |
| date_in        | DATE            | Tanggal  barang masuk           |
| user_id        | BIGINT          | Petugas yang input              |
| created_at     | TIMESTAMP       |                                 |
| updated_at     | TIMESTAMP       |                                 |

---

### 5. **outgoing_items** (Barang keluar)
| Field           | Tipe Data       | Keterangan                      |
|----------------|-----------------|---------------------------------|
| id             | BIGINT (Auto)   | Primary key                     |
| item_id        | BIGINT          | Foreign key → items.id          |
| quantity       | INTEGER         | Jumlah barang keluar            |
| date_out       | DATE            | Tanggal barang keluar           |
| destination    | VARCHAR(100)    | keterangan penggunaan           |
| user_id        | BIGINT          | Petugas yang input              |
| created_at     | TIMESTAMP       |                                 |
| updated_at     | TIMESTAMP       |                                 |

---

### 6. **activity_logs** (Opsional: Log aktivitas pengguna)
| Field           | Tipe Data       | Keterangan                  |
|----------------|-----------------|-----------------------------|
| id             | BIGINT (Auto)   | Primary key                 |
| user_id        | BIGINT          | Foreign key → users.id      |
| action         | VARCHAR(255)    | Deskripsi aktivitas         |
| created_at     | TIMESTAMP       |                             |

---
## 🔗 Jenis Relasi dan Tabel yang Berelasi

###  One-to-Many (1:M)

| Tabel Utama   | Tabel Relasi     | Jenis Relasi | Keterangan                                         |
|---------------|------------------|--------------|----------------------------------------------------|
| users         | incoming_items   | One-to-Many  | Satu user bisa mencatat banyak barang masuk        |
| users         | outgoing_items   | One-to-Many  | Satu user bisa mencatat banyak barang keluar       |
| users         | activity_logs    | One-to-Many  | Satu user bisa melakukan banyak aktivitas          |
| categories    | items            | One-to-Many  | Satu kategori memiliki banyak barang               |
| items         | incoming_items   | One-to-Many  | Satu barang bisa masuk berkali-kali                |
| items         | outgoing_items   | One-to-Many  | Satu barang bisa keluar berkali-kali               |

---

###  Many-to-One (M:1)

| Tabel Relasi     | Tabel Utama   | Jenis Relasi | Keterangan                                         |
|------------------|---------------|--------------|----------------------------------------------------|
| incoming_items   | items         | Many-to-One  | Banyak data barang masuk mengacu ke satu barang    |
| outgoing_items   | items         | Many-to-One  | Banyak data barang keluar mengacu ke satu barang   |
| items            | categories    | Many-to-One  | Banyak barang berada dalam satu kategori           |
| incoming_items   | users         | Many-to-One  | Banyak entri masuk dicatat oleh satu user staf     |
| outgoing_items   | users         | Many-to-One  | Banyak entri keluar dicatat oleh satu user staf    |
| activity_logs    | users         | Many-to-One  | Setiap log aktivitas dikaitkan ke satu user        |
