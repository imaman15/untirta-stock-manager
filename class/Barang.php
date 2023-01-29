<?php
/**
 * Class Barang adalah sebuah class yang saya rancang untuk memproses berbagai 'urusan' yang 
 * berkaitan dengan data barang. Dengan membuat class terpisah, kode program kita akan lebih 
 * rapi dan mudah dikelola. Setiap method yang ada juga bisa dipakai oleh file-file lain, tidak
 * hanya oleh satu halaman saja.
 */
class Barang{
  private $_formItem = [];
  private $_db = null;
//  Class barang saya rancang dengan 2 private property: $_db dan $_formItem. Property $_db
// akan dipakai untuk menampung instansiasi dari class DB, sedangkan property $_formItem
// disiapkan untuk menampung nilai inputan form dari hasil validasi.


  public function __construct(){
    $this->_db = DB::getInstance();
  }
// terdapat pendefinisian constructor dari class Barang. Constructor ini hanya berisi
// 1 baris perintah, yakni proses instansiasi class DB ke dalam private property $this->_db. Class 
// DB ini akan kita butuhkan untuk proses yang perlu mengakses database

// dimana perintah untuk import file DB.php ?
// Ini tidak perlu dilakukan karena class Barang sendiri akan diakses dari file yang sudah 
// menjalankan perintah require 'init.php', seperti dari file tambah_barang.php. Dengan 
// demikian, kita tidak perlu melakukan proses import terpisah. Kecuali ada kemungkinan class 
// Barang ini dijalankan oleh file yang tidak mengakses file init.php, maka barulah kita perlu 
// meng-import class DB.php secara langsung dari dalam class Barang 

// Method validasi() butuh sebuah parameter berupa variabel global inputan form, yang 
// disimpan ke dalam $formMethod. Variabel global yang dimaksud adalah salah satu dari $_POST
// atau $_GET, tergantung dari jenis metode pengiriman form. Dalam contoh kita di halaman 
// tambah_barang.php, parameter ini berupa variabel $_POST

// Method validasi() ini pada dasarnya berisi syarat validasi yang dipakai untuk memanggil 
// method setRules() milik class Validate. Jadi dalam class Barang ini kita juga butuh class 
// Validate

  public function validasi($formMethod){
    $validate = new Validate($formMethod);
    //  saya melakukan proses instansiasi class Validate ke dalam variabel $validate. Class
    // Validate sendiri perlu argument berupa variabel global inputan form, yang sebelumnya sudah
    // disimpan dalam parameter $formMethod

    $this->_formItem['nama_barang'] = $validate->setRules('nama_barang',
    'Nama barang', [
      'required' => true,
      'sanitize' => 'string'
    ]);

    $this->_formItem['jumlah_barang'] = $validate->setRules('jumlah_barang',
    'Jumlah barang', [
      'numeric' => true,
      'min_value' => 0
    ]);

    $this->_formItem['harga_barang'] = $validate->setRules('harga_barang',
    'Harga barang', [
      'numeric' => true,
      'min_value' => 0
    ]);

    if(!$validate->passed()) {
      return $validate->getError();
    }
  }

  public function getItem($item){
    return isset($this->_formItem[$item]) ? $this->_formItem[$item] : '';
  }

  public function insert(){
    $newBarang = [
      'nama_barang' => $this->getItem('nama_barang'),
      'jumlah_barang' => $this->getItem('jumlah_barang'),
      'harga_barang' => $this->getItem('harga_barang')
    ];
    return $this->_db->insert('barang',$newBarang);
  }
  // untuk mengakses nilai private property di dalam sebuah method, kita
  // harus menggunakan tambahan pseudo variable $this. Misalnya untuk mengakses 
  // property $_db yang berisi object dari class DB, di dalam method insert() harus diakses 
  // sebagai $this->_db, tidak bisa hanya $_db saja

  public function generate($id_barang){
    $result = $this->_db->getWhereOnce('barang',['id_barang','=',$id_barang]);
    foreach ($result as $key => $val) {
      $this->_formItem[$key] = $val;
    }
  }

  public function update($id_barang){
    $newBarang = [
      'nama_barang' => $this->getItem('nama_barang'),
      'jumlah_barang' => $this->getItem('jumlah_barang'),
      'harga_barang' => $this->getItem('harga_barang')
    ];
    $this->_db->update('barang',$newBarang,['id_barang','=',$id_barang]);
  }

  public function delete($id_barang){
    $this->_db->delete('barang',['id_barang','=',$id_barang]);
  }
}
