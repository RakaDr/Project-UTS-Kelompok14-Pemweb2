<?php
require_once 'Controllers/Testimoni.php';
require_once 'Controllers/Kategori.php';
require_once 'Controllers/Produk.php'; // Anda perlu buat controller Produk juga

$testimoni_id = $_GET['id'] ?? null;
$detail = $testimoni_id ? $testimoni->show($testimoni_id) : [];

$list_produk = $produk->index();
$list_kategori = $kategoritokoh->index();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'tanggal' => $_POST['tanggal'],
        'nama_tokoh' => $_POST['nama_tokoh'],
        'komentar' => $_POST['komentar'],
        'rating' => $_POST['rating'],
        'produk_id' => $_POST['produk_id'],
        'kategori_tokoh_id' => $_POST['kategori_tokoh_id']
    ];

    if ($_POST['type'] === 'create') {
        $testimoni->create($data);
        echo "<script>alert('Testimoni berhasil ditambahkan')</script>";
    } else {
        $testimoni->update($testimoni_id, $data);
        echo "<script>alert('Testimoni berhasil diperbarui')</script>";
    }
    echo "<script>window.location='?url=testimoni'</script>";
}
?>

<div class="container">
  <form method="post">
    <div class="card shadow">
      <div class="card-header bg-info text-white  fw-bold">
        <i class="fas fa-comments mr-2 me-2"></i>
        <?= $testimoni_id ? 'Edit' : 'Tambah' ?> Testimoni
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label>Tanggal</label>
          <input type="date" name="tanggal" class="form-control" value="<?= $detail['tanggal'] ?? '' ?>" required>
        </div>
        <div class="mb-3">
          <label>Nama Tokoh</label>
          <input type="text" name="nama_tokoh" class="form-control" value="<?= $detail['nama_tokoh'] ?? '' ?>" required>
        </div>
        <div class="mb-3">
          <label>Komentar</label>
          <textarea name="komentar" class="form-control" required><?= $detail['komentar'] ?? '' ?></textarea>
        </div>
        <div class="mb-3">
          <label>Rating</label>
          <input type="number" name="rating" class="form-control" min="1" max="5" value="<?= $detail['rating'] ?? '' ?>" required>
        </div>
        <div class="mb-3">
          <label>Produk</label>
          <select name="produk_id" class="form-control" required>
            <option value="">Pilih Produk</option>
            <?php foreach ($list_produk as $p): ?>
              <option value="<?= $p['id'] ?>" <?= ($detail['produk_id'] ?? '') == $p['id'] ? 'selected' : '' ?>>
                <?= $p['nama'] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-3">
          <label>Kategori Tokoh</label>
          <select name="kategori_tokoh_id" class="form-control" required>
            <option value="">Pilih Kategori</option>
            <?php foreach ($list_kategori as $k): ?>
              <option value="<?= $k['id'] ?>" <?= ($detail['kategori_tokoh_id'] ?? '') == $k['id'] ? 'selected' : '' ?>>
                <?= $k['nama'] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="card-footer text-end">
        <input type="hidden" name="type" value="<?= $testimoni_id ? 'update' : 'create' ?>">
        <button type="submit" class="btn btn-info">
          <i class="fas fa-save me-1"></i> Submit
        </button>
      </div>
    </div>
  </form>
</div>
