<?php
require_once 'Controllers/Kategori.php';

$list_kategori = $kategoritokoh->index();

if (isset($_POST['type']) && $_POST['type'] === 'delete') {
    $row = $kategoritokoh->delete($_POST['id']);
    echo "<script>alert('Data $row[nama] berhasil dihapus')</script>";
    echo "<script>window.location='?url=kategori'</script>";
}
?>

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

  .add-button {
    margin-top: 20px;
  }

  .action-buttons .btn {
    margin: 0 4px;
  }

  @media (max-width: 768px) {
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
  <div class="card shadow">
    <div class="card-header card-header-custom d-flex align-items-center" style="gap: 8px;">
      <i class="fas fa-tags"></i>
      <span>Data Kategori Tokoh</span>
    </div>

    <div class="card-body">
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Kategori Tokoh</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($list_kategori as $row): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= htmlspecialchars($row['nama']) ?></td>
              <td>
                <div class="d-flex justify-content-center action-buttons">
                  <a href="?url=kategori-input&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <form method="post" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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

      <div class="text-center add-button">
        <a class="btn btn-info-custom btn-sm" href="?url=kategori-input">
          <i class="fas fa-plus me-1"></i> Tambah Kategori Tokoh
        </a>
      </div>
    </div>
  </div>
</div>
