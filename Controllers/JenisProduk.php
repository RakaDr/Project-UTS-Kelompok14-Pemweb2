<?php
require_once 'Config/DB.php';

class JenisProduk
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT * FROM jenis_produk");
        return $stmt->fetchAll();
    }

    public function show($id)
    {
        $stmt = $this->pdo->query("SELECT * FROM jenis_produk WHERE id = $id");
        return $stmt->fetch();
    }

    public function create($data)
    {
        $sql = "INSERT INTO jenis_produk (id, nama) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['id'], $data['nama']]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE jenis_produk SET nama = :nama WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $this->show($id);
    }

    public function delete($id)
    {
        $row = $this->show($id);
        $stmt = $this->pdo->prepare("DELETE FROM jenis_produk WHERE id = ?");
        $stmt->execute([$id]);
        return $row;
    }
}

$jenisproduk = new JenisProduk($pdo);
