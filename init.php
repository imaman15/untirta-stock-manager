<?php
session_start();

/**
 * Dalam project ini kita butuh melakukan banyak proses import class PHP (menggunakan 
 * perintah include atau require). Namun tidak setiap halaman perlu meng-import semua class. 
 * Misalnya halaman A hanya perlu file DB.php saja, halaman B butuh file Validate.php dan
 * Input.php, halaman C perlu file Input.php, dst
 * Agar pengelolaan import file class ini lebih efisien, kita akan membuat sebuah file 'master 
 * import' dengan memanfaatkan fitur autoloading dari PHP.
 * Daripada men-import file satu per satu, kita cukup import file bernama init.php. Di dalam 
 * file init.php terdapat pemanggilan fungsi spl_autoload_register() yang akan memproses 
 * import file class yang diperlukan.
 */

spl_autoload_register(function ($className) {
  $path = "class/{$className}.php";
  if (file_exists($path)) {
    require $path;
  } else {
    die ("File $path tidak tersedia");
  }
});

/**
 * File ini hanya terdiri dari pemanggilan fungsi spl_autoload_register(). Jika dalam sebuah file
 * terdapat pemanggilan class yang tidak terdefinisi, fungsi spl_autoload_register() ini akan 
 * mencari file tersebut di dalam folder class dan melakukan proses import dengan perintah 
 * require. Sehingga kita tidak perlu menjalankan perintah require untuk setiap file class.
 */

 /**
  * Fungsi spl_autoload_register() = diapkai untuk menampung nama class yang tidak terdefinisi
  * SPL sendiri adalah singkatan dari Standard PHP Library (berbagai fungsi bawaan PHP untuk menyelesaikan masalah-masalah umum)
  * spl_autoload_register() akan mendapatkan informasi mengenai
  */
