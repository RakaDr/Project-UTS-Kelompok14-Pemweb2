<?php
require_once 'Controllers/JenisProduk.php';

$list_jenis = $jenisproduk->index();

if (isset($_POST['type']) && $_POST['type'] === 'delete') {
  $row = $jenisproduk->delete($_POST['id']);
  echo "<script>alert('Data $row[nama] berhasil dihapus')</script>";
  echo "<script>window.location='?url=jenis'</script>";
}
?>

<!-- Styling tambahan -->
<style>
  .card-header-custom {
    background-color: #17a2b8;
    color: white;
    font-weight: 600;
    font-size: 1.1rem;
  }

  .table thead {
    background-color: #17a2b8;
    color: white;
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

  .table td, .table th {
    vertical-align: middle;
    text-align: center;
  }

  .action-buttons .btn {
    margin: 0 3px;
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

  @media (max-width: 576px) {
    .action-buttons {
      flex-direction: column;
    }
    .action-buttons .btn {
      width: 100%;
      margin: 2px 0;
    }
  }
</style>

<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header card-header-custom d-flex justify-content-between align-items-center">
      <span><i class="fas mr-2 fa-tags me-2"></i>Data Jenis Produk</span>
    </div>

    <div class="card-body table-container">
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th style="width: 50px;">No</th>
            <th>Nama Jenis</th>
            <th style="width: 180px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($list_jenis as $row): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td class="text-start"><?= $row['nama'] ?></td>
              <td>
                <div class="d-flex justify-content-center action-buttons">
                  <a href="?url=jenis-input&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <form method="post" onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="d-inline">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="hidden" name="type" value="delete">
                    <button class="btn btn-sm btn-danger">
                      <i class="fas fa-trash"></i> Hapus
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <!-- Tombol Tambah di tengah bawah -->
      <div class="add-button text-center">
        <a class="btn btn-info-custom btn-sm" href="?url=jenis-input">
          <i class="fas fa-plus"></i> Tambah Jenis Produk
        </a>
      </div>
    </div>
  </div>
</div>
