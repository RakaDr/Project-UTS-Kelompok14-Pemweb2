<?php
require_once 'Controllers/Testimoni.php';

if (isset($_POST['type']) && $_POST['type'] === 'delete') {
    $testimoni->delete($_POST['id']);
    echo "<script>alert('Testimoni berhasil dihapus');</script>";
    echo "<script>window.location='?url=testimoni';</script>";
    exit;
}

$list_testimoni = $testimoni->index();
?>

<!-- Custom CSS -->
<style>
  .card-header-info {
    background-color: #17a2b8;
    color: white;
    font-weight: bold;
  }

  .btn-warning {
    background-color: #17a2b8;
    color: white;
    border: none;
  }

  .btn-warning:hover {
    background-color: #138496;
    color: white;
  }

  .btn-info-custom {
    background-color: #17a2b8;
    color: white;
    border: none;
  }

  .btn-info-custom:hover {
    background-color: #138496;
    color: white;
  }

  .form-control:focus {
    border-color: #17a2b8;
    box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.25);
  }

  .table thead {
    background-color: #17a2b8;
    color: white;
  }

  .table td, .table th {
    vertical-align: middle;
    text-align: center;
  }

  .action-buttons .btn {
    margin: 0 4px;
  }
</style>

<div class="container mt-4">
  <div class="card shadow">
    <div class="card-header card-header-info d-flex align-items-center" style="gap: 8px;">
      <i class="fas fa-comments"></i>
      <span>Data Testimoni</span>
    </div>

    <div class="card-body">
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Tokoh</th>
            <th>Komentar</th>
            <th>Rating</th>
            <th>Produk</th>
            <th>Kategori Tokoh</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($list_testimoni as $t): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= htmlspecialchars($t['tanggal']) ?></td>
              <td><?= htmlspecialchars($t['nama_tokoh']) ?></td>
              <td><?= htmlspecialchars($t['komentar']) ?></td>
              <td><?= $t['rating'] ?></td>
              <td><?= htmlspecialchars($t['nama_produk']) ?></td>
              <td><?= htmlspecialchars($t['nama_kategori']) ?></td>
              <td>
                <div class="d-flex justify-content-center action-buttons">
                  <a href="?url=testimoni-input&id=<?= $t['id'] ?>" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form method="post" onsubmit="return confirm('Yakin ingin menghapus testimoni ini?')">
                    <input type="hidden" name="id" value="<?= $t['id'] ?>">
                    <input type="hidden" name="type" value="delete">
                    <button class="btn btn-sm btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <div class="mt-3 text-center">
        <a class="btn btn-info-custom btn-sm" href="?url=testimoni-input">
          <i class="fas fa-plus me-1"></i>Tambah Testimoni
        </a>
      </div>
    </div>
  </div>
</div>
