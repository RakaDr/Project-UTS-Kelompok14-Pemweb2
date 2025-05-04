<?php
require_once 'Controllers/JenisProduk.php';
require_once 'Controllers/Produk.php';
require_once 'Controllers/Kategori.php';
require_once 'Controllers/Testimoni.php';



$total_jenis = count($jenisproduk->index());
$total_produk = count($produk->index());
$total_tokoh = count($kategoritokoh->index());
$total_testimoni = count($testimoni->index());

session_start();
$username = $_SESSION['username'] ?? 'Pengguna';
?>

<!-- Styling selaras dan modern -->
<style>
  .dashboard-title {
    margin: 30px 0 10px;
    font-size: 2.2rem;
    color: #17a2b8;
    font-weight: bold;
    text-align: center;
  }

  .dashboard-subtitle {
    text-align: center;
    color: #6c757d;
    margin-bottom: 30px;
    font-size: 1.1rem;
  }

  .dashboard-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 24px;
  }

  .card-summary {
    background: linear-gradient(135deg, #17a2b8, #138496);
    border: none;
    border-radius: 16px;
    padding: 28px;
    box-shadow: 0 8px 20px rgba(23, 162, 184, 0.2);
    text-align: center;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    color: white;
  }

  .card-summary:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 24px rgba(23, 162, 184, 0.3);
  }

  .card-summary i {
    font-size: 2.5rem;
    margin-bottom: 12px;
  }

  .card-summary h3 {
    font-size: 2.2rem;
    margin: 0;
  }

  .card-summary p {
    margin-top: 6px;
    font-size: 1.1rem;
  }

  .alert-success {
    background-color: #17a2b8;
    font-size: 1.25rem;
    border-radius: 6px;
    color: white;
    text-align: center;
    padding: 12px;
    margin-bottom: 30px;
  }
</style>

<div class="container mt-4">
  <div class="dashboard-title">Selamat Datang, <?= htmlspecialchars($username) ?>!</div>
  <div class="dashboard-subtitle">Berikut ringkasan data sistem POS anda</div>

  <div class="dashboard-container">
    <div class="card-summary">
      <i class="fas fa-tags"></i>
      <h3><?= $total_jenis ?></h3>
      <p>Total Jenis Produk</p>
    </div>

    <div class="card-summary">
      <i class="fas fa-box-open"></i>
      <h3><?= $total_produk ?></h3>
      <p>Total Produk</p>
    </div>

    <div class="card-summary">
      <i class="fas fa-users"></i>
      <h3><?= $total_tokoh ?></h3>
      <p>Total Kategori Tokoh</p>
    </div>

    <div class="card-summary">
      <i class="fas fa-comments"></i>
      <h3><?= $total_testimoni ?></h3>
      <p>Total Testimoni</p>
    </div>
  </div>
</div>
