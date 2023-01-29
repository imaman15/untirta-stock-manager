# Langkah - langkah :
1. Header.php
2. style.css 
3. Footer.php  
4. Autoloading Init.php
5. db_generate_tabel_barang_dan_user.php
6. tampil_barang.php
7. tambah_barang.php
8. Barang.php (# Penjelasan mengenai CLass dan Object)
9. edit_barang.php 
- # Query String
10. hapus_barang.php
11. register_user.php (# Autentikasi User)
12. User.php
13. register_berhasil.php
14. login.php
15. Proteksi Halaman
16. logut.php
17. profile.php
18. ubah_password_berhasil.php
19. index.php
20. db_generate_tabel_barang_dan_user.php

21. Exception


# Perbedaan fungsi include() dan require()
Perbedaan fungsi include() dan require() adalah jika file yang di sisipkan dengan menggunakan fungsi include tidak tersedia atau salah dalam peletakan lokasi maka file akan tetap di jalankan dengan mengabaikan error.
Tetapi jika menggunakan require() dan file yang disisipkan tidak tersedia atau salah dalam peletakan lokasi maka isi dari file tidak akan di lanjutkan dan akan di hentikan penyisipannya pada letak error.

# Penjelasan mengenai Class dan Object
  Class dan object merupakan fondasi paling dasar dari object oriented programming, keduanya 
serupa tapi tak sama. Class adalah blueprint atau "cetakan" untuk object. Bisa disebut juga 
bahwa object adalah implementasi konkret dari sebuah class
  Sebagai analogi, ibaratnya kita ingin membuat object rumah. Class adalah gambar desain 
rumah yang dirancang oleh arsitek. Melalui gambar design ini, nantinya bisa dibuat tidak 
hanya 1 rumah, tapi bisa banyak rumah (seperti yang ada di kompleks perumahan). Di sini, 
object rumah adalah implementasi konkret dari class gambar rumah
https://res.cloudinary.com/practicaldev/image/fetch/s--pwoNQaku--/c_limit%2Cf_auto%2Cfl_progressive%2Cq_auto%2Cw_880/https://thepracticaldev.s3.amazonaws.com/i/58317pr3m4h3fbkz9bfu.png
  Pemrograman berbasis object mencoba menjadikan object dunia nyata ke dalam konsep pemrograman. Misalnya jika nanti kita 
membuat kode untuk pemrosesan user (login, register, logout, dst), maka akan ada class User. 
Jika kita ingin membuat website jual beli, nanti akan ada class Produk, Invoice, dst.
  Namun tidak selamanya class dan object ini merujuk ke object asli. Object juga bisa berbentuk 
virtual seperti class FileUpload, atau class FormValidation

  Nama dari class boleh bebas selama mengikuti aturan identifier PHP, yakni tidak boleh diawali 
dengan angka, tidak boleh mengandung spasi dan tidak boleh berisi karakter "aneh" seperti %, 
# atau !. Aturan ini sebenarnya sama seperti penamaan variabel dan function
 Jika nama class tersebut lebih dari 2 kata, gunakan penulisan camel case, seperti class ProdukTelevisi atau class UserAdmin
Ini hanya tips dan kebiasaan saja. Jika pun kita ingin menulis nama class produk atau class 
produk_televisi, itu pun tetap bisa di proses oleh PHP
Instansiasi object adalah proses pembuatan object dari sebuah class

# Penjelasan Property dan Method
  Property dan method tidak lain adalah sebutan untuk variabel dan function yang berada di 
dalam class. Cara penulisannya pun sama seperti variabel dan function, tapi dengan tambahan 
access modifier di awal penulisan
  Access modifier berfungsi untuk mengatur batasan hak akses dari sebuah property atau 
method. Access modifier public artinya semua property dan method bisa diakses dari mana 
saja, termasuk dari luar class.
  semua property dan method harus memiliki awalan public, jika tidak PHP akan
mengeluarkan pesan error.
Karena function berada di dalam class, namanya berubah menjadi method

  Untuk mengakses property dan method yang ada di dalam sebuah object, kita menggunakan 
operator tanda panah " -> ", yakni gabungan dari tanda minus " - " dan tanda lebih besar " > "

!Ingat bahwa dalam pemrograman berbasis 
object, yang akan kita akses adalah object, bukan class

# Pseudo-variable $this 
  $this adalah sebuah variabel khusus yang merujuk kepada object pada saat kita menulis sesuatu di dalam class

# Argument Method
Method di dalam sebuah class atau object tidak berbeda dengan function, oleh karena itu 
seluruh fitur-fitur function juga bisa kita terapkan. Salah satunya mengirim argument.

Argument adalah sebutan untuk nilai input yang diberikan pada saat pemanggilan function. 
Sebagai contoh, PHP memiliki function bawaan sqrt() untuk mencari nilai akar kuadrat. 
Function sqrt() butuh 1 argumen berupa angka yang akan dicari nilai akar kuadratnya. Untuk 
mencari akar kuadrat dari 49, perintahnya adalah sqrt(49), angka 49 di sini merupakan 
sebuah argument. 
php\oop\bab_02\14.method_argument.php

# Argument vs Parameter
  Istilah argument dan parameter juga serupa tapi tak sama. Keduanya sama-sama dipakai
untuk menyebut nilai yang diinput ke dalam function atau method. Argument adalah 
sebutan untuk inputan pada saat pemanggilan method, sedangkan parameter adalah 
sebutan untuk inputan pada saat pendefinisian method. 
  Dalam contoh di atas, variabel $jumlah adalah sebuah parameter, sedangkan angka 10 
dan 25 pada saat pemanggilan method adalah argument. Kedua istilah ini sering di 
pertukarkan, malah di dokumentasi resmi PHP (PHP Manual) istilah argument dipakai 
untuk menyebut keduanya

# Constructor dan Destructor
  Constructor adalah method khusus yang otomatis dijalankan ketika sebuah object dibuat 
(yakni pada saat proses inisialisasi dengan perintah new). Sedangkan destructor adalah 
method khusus yang otomatis dijalankan pada saat object di hapus.

  Dengan constructor, kita bisa membuat "persiapan" untuk sebuah object, seperti mengisi nilai 
awal atau membuka koneksi ke database. Sebaliknya, destructor bisa dipakai untuk proses 
"pembersihan" setelah object dihapus seperti menutup koneksi ke database, tujuannya agar 
ruang memory bisa kembali kosong.

  Dibandingkan constructor, destructor relatif jarang dipakai karena PHP sudah memiliki sistem 
"garbage collection" internal, yang secara otomatis akan menghapus semua object dan 
membersihkan memory tanpa perlu perintah tambahan.

# Query String
Query string adalah sebutan untuk tambahan data di dalam alamat URL. Data ini diawali 
dengan tanda tanya '?', seperti ?id_barang=1. Selain ditulis manual, query string 
umumnya berasal dari inputan form yang dikirim dengan metode GET. 
Tambahan query string di sebuah URL bisa diambil dari global variabel $_GET. Sebagai 
contoh, jika tertulis edit_barang.php?id_barang=99, kita bisa mengambil nilai "99" 
dengan perintah $_GET['id_barang']

# Autentikasi User
  Maksud dari Autentikasi User adalah kita akan membuat sebuah mekanisme login dan register
user. Nantinya, hanya user yang terdaftar saja yang bisa mengakses tabel barang. Selain login 
dan register, kita juga akan merancang tampilan halaman untuk melihat data user, ubah 
password dan logout.
  Proses autentikasi sangat erat kaitannya dengan pemeriksaan password. Seseorang baru bisa 
diberi hak akses jika username dan password yang diisi di form login sesuai dengan data yang 
tersimpan di database

# Password Hasing
  Secara sederhana, hashing adalah sebuah teknik mengacak karakter agar tidak bisa dibaca 
secara langsung. Sebagai contoh, teks 'rahasia' jika di hashing dengan algoritma MD5 akan 
menjadi string 'ac43724f16e9241d990427ab7c8f4228'
  Fitur lain dari hashing adalah hanya bekerja satu arah. Maksudnya kita tidak bisa mencari tahu 
apa teks asli dari kode 'ac43724f16e9241d990427ab7c8f4228', setidaknya secara teori hal ini 
tidak bisa dilakukan. 
  PHP mendukung banyak algoritma hashing. Yang cukup lama beredar adalah function md5()
dan sha1(), yang merupakan implementasi dari algoritma hashing Message-Digest algortihm 
5 (disingkat MD5) dan Secure Hash Algorithm 1 (disingkat SHA1)
  Fungsi password_hash() akan meng-generate hasil hash sepanjang 60 karakter (ke depannya 
bisa lebih). Fungsi ini butuh 2 buah argument, berupa string asal yang akan di hash, serta 
konstanta dari jenis algoritma yang akan dipakai.
  Fungsi password_verify() butuh 2 buah argument, pertama berupa string password, dan 
kedua berupa serta teks hasil hash (yang biasanya akan di ambil dari database). Fungsi 
password_verify() mengembalikan boolean true jika password cocok, atau boolean false jika 
password tidak cocok

# Proteksi Halaman
  Sampai di sini kita sudah membuat mekanisme login, tapi setiap halaman dari tabel barang 
tetap bisa diakses langsung. Misalnya dengan mengetik di web browser, halaman 
tampil_barang.php tetap bisa diakses tanpa login sekalipun. Kita perlu membuat langkah 
proteksi sehingga hanya user yang sudah login saja yang bisa mengakses.
  Prinsip kerjanya adalah, periksa apakah terdapat session username di variabel $_SESSION. Jika 
ada, maka artinya user sudah login. Jika tidak ada, maka user belum login dan tampilkan pesan
error. Dalam contoh ini saya hanya akan me-redirect user ke halaman login.php jika session 
tidak ditemukan
  Pertama, karena akan mengakses session, maka di bagian atas semua file PHP perlu 
memanggil fungsi session_start(). Fungsi ini dibutuhkan agar kita bisa mengakses variabel 
$_SESSION. 
  Langkah proteksi kedua adalah dengan membuat pemeriksaan session username di setiap 
halaman yang hanya bisa diakses setelah login. Halaman tersebut adalah:
 - tampil_barang.php
 - tambah_barang.php
 - hapus_barang.php
 - edit_barang.php

# Exception
  Exception merupakan salah satu fitur standar dari object oriented programming. Hampir 
semua bahasa pemrograman yang menerapkan prinsip OOP juga memiliki exception (tidak 
hanya PHP saja). Dalam bab ini kita akan membahas lebih jauh apa itu exception dan 
bagaimana cara penggunaannya
  Exception adalah sebuah mekanisme untuk mengelola error secara lebih "elegan". Dalam 
prakteknya nanti, PHP juga menyediakan class yang bernama Exception. Karena dipakai untuk
mengelola error, istilah exception ini sering juga disebut sebagai exception handling, yakni 
cara penanganan exception