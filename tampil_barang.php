<?php
// jalankan init.php (untuk session_start dan autoloader)
/**
 * kode untuk proses autoloading. 
 * Dengan memanggil file init.php, maka ketika kode program menemukan class yang tidak 
 * terdefinisi, otomatis akan mencarinya ke dalam folder class
 */
require 'init.php';

// cek apakah user sudah login atau belum
$user = new User();
$user->cekUserSession();

// Terdapat perintah proses instansiasi class DB ke dalam variabel $DB. Object
// $DB inilah yang akan kita pakai untuk mengakses berbagai method dari class DB.

// buat koneksi ke database
$DB = DB::getInstance();  

if (!empty($_GET)) {
  // jika terdeteksi form di submit, tampilkan hasil pencarian
  $tabelBarang = $DB->getLike('barang','nama_barang',
                              '%'.Input::get('search')."%");
}
else {
  // jika form tidak di submit, ambil semua isi tabel barang
  $tabelBarang = $DB->get('barang');
}

// include head
include 'template/header.php';
?>

  <div class="container">
    <div class="row">
      <div class="col-12">

        <!-- Form pencarian -->
        <div class="py-4 d-flex justify-content-end align-items-center">
          <h1 class="h2 mr-auto">
            <a class="text-info" href="tampil_barang.php">Tabel Barang</a>
          </h1>
          <a href="tambah_barang.php" class="btn btn-primary">Tambah Barang</a>
          <form class="w-25 ml-4" method="get">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="search"
            name="search">
            <div class="input-group-append">
              <input type="submit" class="btn btn-outline-secondary"
              value="Cari">
            </div>
          </div>
          </form>
        </div>

      <!-- Tabel barang -->
      <?php
        if (!empty($tabelBarang)) :
      ?>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Barang</th>
              <th>Jumlah</th>
              <th>Harga (Rp.)</th>
              <th>Tanggal Update</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
            foreach ($tabelBarang as $barang) {
              echo "<tr>";
              echo "<th>{$barang->id_barang}</th>";
              echo "<td>{$barang->nama_barang}</td>";
              echo "<td>{$barang->jumlah_barang}</td>";
              echo "<td>".number_format($barang->harga_barang, 0, ',', '.').
              "</td>";
              $tanggal = new DateTime($barang->tanggal_update);
              echo "<td>".$tanggal->format("d-m-Y H:i")."</td>";
              echo "<td>";
                echo "<a href=\"edit_barang.php?id_barang={$barang->id_barang}\"
                class=\"btn btn-info\">Edit</a> ";
                echo "<a href=\"hapus_barang.php?id_barang={$barang->id_barang}\"
                class=\"btn btn-danger\">Hapus</a>";
              echo "</td>";
              echo "</tr>";
            }
          ?>
          </tbody>
        </table>

      <?php
        endif;
      ?>

      </div>
    </div>
  </div>

<?php
// include footer
include 'template/footer.php';
?>
