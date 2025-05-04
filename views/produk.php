<?php
require_once 'Controllers/Produk.php';

$list_produk = $produk->index();

if (isset($_POST['type']) && $_POST['type'] === 'delete') {
  $row = $produk->delete($_POST['id']);
  echo "<script>alert('Produk $row[nama] berhasil dihapus');</script>";
  echo "<script>window.location='?url=produk';</script>";
}
?>

<!-- Custom CSS -->
<style>
  .card-header-info {
    background-color: #17a2b8;
    color: white;
    font-weight: 600;
    font-size: 1.1rem;
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

  .table-container {
    overflow-x: auto;
  }

  .btn-sm i {
    margin-right: 4px;
  }

  .add-button {
    margin-top: 20px;
  }

  .card {
    border-radius: 12px;
  }

  .btn {
    border-radius: 6px;
  }

  @media (max-width: 768px) {
    .action-buttons {
      flex-direction: column;
    }

    .action-buttons .btn {
      width: 100%;
      margin: 2px 0;
    }

    .table th, .table td {
      font-size: 0.9rem;
    }
  }
</style>

<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header card-header-info d-flex align-items-center" style="gap: 8px;">
      <i class="fas fa-boxes mr-2"></i>
      <span>Data Produk</span>
    </div>

    <div class="card-body table-container">
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Min Stok</th>
            <th>Rating</th>
            <th>Jenis Produk</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($list_produk as $row): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= htmlspecialchars($row['kode']) ?></td>
              <td class="text-start"><?= htmlspecialchars($row['nama']) ?></td>
              <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
              <td><?= $row['stok'] ?></td>
              <td><?= $row['min_stok'] ?></td>
              <td><?= $row['rating'] ?></td>
              <td><?= $row['nama_jenis_produk'] ?: '-' ?></td>
              <td class="text-start"><?= htmlspecialchars($row['deskripsi']) ?></td>
              <td>
                <div class="d-flex justify-content-center action-buttons">
                  <a href="?url=produk-input&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <form method="post" onsubmit="return confirm('Yakin ingin menghapus produk ini?')" class="d-inline">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="hidden" name="type" value="delete">
                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                  </form>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <!-- Tombol Tambah Produk di tengah bawah -->
      <div class="add-button text-center">
        <a class="btn btn-info-custom btn-sm" href="?url=produk-input">
          <i class="fas fa-plus"></i> Tambah Produk
        </a>
      </div>
    </div>
  </div>
</div>
