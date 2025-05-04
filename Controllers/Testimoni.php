<?php
require_once 'Config/DB.php';

class Testimoni
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $sql = "SELECT t.*, p.nama AS nama_produk, k.nama AS nama_kategori
                FROM testimoni t
                JOIN produk p ON t.produk_id = p.id
                JOIN kategori_tokoh k ON t.kategori_tokoh_id = k.id";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function show($id)
    {
        $sql = "SELECT * FROM testimoni WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $sql = "INSERT INTO testimoni (tanggal, nama_tokoh, komentar, rating, produk_id, kategori_tokoh_id)
                VALUES (:tanggal, :nama_tokoh, :komentar, :rating, :produk_id, :kategori_tokoh_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE testimoni SET tanggal=:tanggal, nama_tokoh=:nama_tokoh, komentar=:komentar,
                rating=:rating, produk_id=:produk_id, kategori_tokoh_id=:kategori_tokoh_id WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $data['id'] = $id;
        $stmt->execute($data);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM testimoni WHERE id = ?");
        $stmt->execute([$id]);
    }
}

$testimoni = new Testimoni($pdo);
