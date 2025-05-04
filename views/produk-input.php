<?php
require_once 'Controllers/Produk.php';
require_once 'Controllers/JenisProduk.php';
require_once 'Helpers/helper.php';

$produk_id = isset($_GET['id']) ? $_GET['id'] : null;
$show_produk = $produk_id ? $produk->show($produk_id) : [];
$list_jenis = $jenisproduk->index();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (empty($_POST['jenis_produk_id'])) {
    echo "<script>alert('Silakan pilih Jenis Produk'); window.history.back();</script>";
    exit;
  }

  if ($_POST['type'] === 'create') {
    $produk->create($_POST);
    echo "<script>alert('Data berhasil ditambahkan'); window.location='?url=produk';</script>";
  } elseif ($_POST['type'] === 'update') {
    $produk->update($produk_id, $_POST);
    echo "<script>alert('Data berhasil diperbarui'); window.location='?url=produk';</script>";
  }
}
?>
<style>
  .card-header-custom {
    background-color: #17a2b8;
    color: white;
    font-weight: bold;
  }

  .btn-info-custom {
    background-color: #17a2b8;
    color: white;
    border: none;
  }

  .btn-info-custom:hover {
    background-color: #138496;
  }

  .form-control:focus {
    border-color: #17a2b8;
    box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.25);
  }
</style>

<div class="container mt-4">
  <form method="post">
    <div class="card shadow">
      <div class="card-header card-header-custom d-flex align-items-center" style="gap: 8px;">
        <i class="fas fa-boxes"></i>
        <span><?= $produk_id ? 'Edit' : 'Tambah' ?> Produk</span>
      </div>

      <div class="card-body">
        <div class="form-group mb-3">
          <label for="kode">Kode</label>
          <input type="text" class="form-control" id="kode" name="kode" value="<?= getSafeFormValue($show_produk, 'kode') ?>" required>
        </div>

        <div class="form-group mb-3">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= getSafeFormValue($show_produk, 'nama') ?>" required>
        </div>

        <div class="form-group mb-3">
          <label for="harga">Harga</label>
          <input type="number" class="form-control" id="harga" name="harga" value="<?= getSafeFormValue($show_produk, 'harga') ?>" required>
        </div>

        <div class="form-group mb-3">
          <label for="stok">Stok</label>
          <input type="number" class="form-control" id="stok" name="stok" value="<?= getSafeFormValue($show_produk, 'stok') ?>" required>
        </div>

        <div class="form-group mb-3">
          <label for="min_stok">Min Stok</label>
          <input type="number" class="form-control" id="min_stok" name="min_stok" value="<?= getSafeFormValue($show_produk, 'min_stok') ?>" required>
        </div>

        <div class="mb-3">
          <label>Rating</label>
          <input type="number" name="rating" class="form-control" min="1" max="5" value="<?= $detail['rating'] ?? '' ?>" required>
        </div>

        <div class="form-group mb-3">
          <label for="jenis_produk_id">Jenis Produk</label>
          <select class="form-control" id="jenis_produk_id" name="jenis_produk_id" required>
            <option value="">-- Pilih Jenis Produk --</option>
            <?php foreach ($list_jenis as $jenis): ?>
              <option value="<?= $jenis['id'] ?>" <?= getSafeFormValue($show_produk, 'jenis_produk_id') == $jenis['id'] ? 'selected' : '' ?>>
                <?= $jenis['nama'] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group mb-3">
          <label for="deskripsi">Deskripsi</label>
          <textarea class="form-control" id="deskripsi" name="deskripsi"><?= getSafeFormValue($show_produk, 'deskripsi') ?></textarea>
        </div>
      </div>

      <div class="card-footer text-end">
        <input type="hidden" name="type" value="<?= $produk_id ? 'update' : 'create' ?>">
        <button type="submit" class="btn btn-info-custom">
          <i class="fas fa-save me-1"></i> Simpan
        </button>
      </div>
    </div>
  </form>
</div>