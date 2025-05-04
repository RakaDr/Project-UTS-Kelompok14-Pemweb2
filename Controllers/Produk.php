<?php
require_once 'Config/DB.php';

class Produk
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT 
        p.*, j.nama AS nama_jenis_produk
        FROM produk p
        LEFT JOIN jenis_produk j ON j.id = p.jenis_produk_id
    ");
        return $stmt->fetchAll();
    }


    public function show($id)
    {
        $stmt = $this->pdo->prepare("SELECT 
            p.*, j.nama AS nama_jenis_produk
            FROM produk p
            LEFT JOIN jenis_produk j ON j.id = p.jenis_produk_id
            WHERE p.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $sql = "INSERT INTO produk (kode, nama, harga, stok, rating, min_stok, jenis_produk_id, deskripsi) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $data['kode'],
            $data['nama'],
            $data['harga'],
            $data['stok'],
            $data['rating'],
            $data['min_stok'],
            $data['jenis_produk_id'],
            $data['deskripsi']
        ]);
        return $this->pdo->lastInsertId();
    }


    public function update($id, $data)
    {
        $sql = "UPDATE produk SET 
                    kode = :kode,
                    nama = :nama,
                    harga = :harga,
                    stok = :stok,
                    rating = :rating,
                    min_stok = :min_stok,
                    jenis_produk_id = :jenis_produk_id,
                    deskripsi = :deskripsi
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':kode', $data['kode']);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':harga', $data['harga']);
        $stmt->bindParam(':stok', $data['stok']);
        $stmt->bindParam(':rating', $data['rating']);
        $stmt->bindParam(':min_stok', $data['min_stok']);
        $stmt->bindParam(':jenis_produk_id', $data['jenis_produk_id']);
        $stmt->bindParam(':deskripsi', $data['deskripsi']);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $this->show($id);
    }

    public function delete($id)
    {
        $row = $this->show($id);
        $stmt = $this->pdo->prepare("DELETE FROM produk WHERE id = ?");
        $stmt->execute([$id]);
        return $row;
    }

    public function getLatestProduk()
    {
        $stmt = $this->pdo->query("SELECT * FROM produk ORDER BY id DESC LIMIT 1");
        return $stmt->fetch();
    }
}

$produk = new Produk($pdo);
