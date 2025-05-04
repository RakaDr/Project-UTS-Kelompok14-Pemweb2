<?php
require_once 'Controllers/Kategori.php';
require_once 'Helpers/helper.php';

$kategori_id = isset($_GET['id']) ? $_GET['id'] : null;
$show_kategori = $kategori_id ? $kategoritokoh->show($kategori_id) : [];

if (isset($_POST['type'])) {
  if ($_POST['type'] === 'create') {
    $kategoritokoh->create($_POST);
    echo "<script>alert('Data berhasil ditambahkan')</script>";
    echo "<script>window.location='?url=kategori'</script>";
  } elseif ($_POST['type'] === 'update') {
    $row = $kategoritokoh->update($kategori_id, $_POST);
    echo "<script>alert('Data $row[nama] berhasil diperbarui')</script>";
    echo "<script>window.location='?url=kategori'</script>";
  }
}
?>

<!-- Styling tambahan -->
<style>
  .card-header-info {
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

<div class="container">
  <form method="post">
    <div class="card shadow">
      <div class="card-header card-header-info">
        <?= $kategori_id ? '<i class="fas fa-edit me-2"></i>Edit' : '<i class="fas fa-users mr-2 me-2"></i>Tambah' ?> Kategori Tokoh
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="nama" class="fw-bold">Nama Kategori Tokoh</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= getSafeFormValue($show_kategori, 'nama') ?>" required>
        </div>
      </div>
      <div class="card-footer text-end">
        <input type="hidden" name="type" value="<?= $kategori_id ? 'update' : 'create' ?>">
        <input type="hidden" name="id" value="<?= $kategori_id ?>">
        <button type="submit" class="btn btn-info-custom">
          <i class="fas fa-save me-1"></i> Submit
        </button>
      </div>
    </div>
  </form>
</div>
