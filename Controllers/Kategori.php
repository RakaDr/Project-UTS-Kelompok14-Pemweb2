<?php
require_once 'Config/DB.php';

class KategoriTokoh
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT * FROM kategori_tokoh");
        return $stmt->fetchAll();
    }

    public function show($id)
    {
        $stmt = $this->pdo->query("SELECT * FROM kategori_tokoh WHERE id = $id");
        return $stmt->fetch();
    }

    public function create($data)
    {
        $sql = "INSERT INTO kategori_tokoh (id, nama) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['id'], $data['nama']]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE kategori_tokoh SET nama = :nama WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $this->show($id);
    }

    public function delete($id)
    {
        $row = $this->show($id);
        $stmt = $this->pdo->prepare("DELETE FROM kategori_tokoh WHERE id = ?");
        $stmt->execute([$id]);
        return $row;
    }
}

$kategoritokoh = new KategoriTokoh($pdo);
