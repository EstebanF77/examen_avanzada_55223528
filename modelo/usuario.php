<?php

class Usuario {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function crear($nombre, $salario_base, $comision_pct) {
        $stmt = $this->pdo->prepare("INSERT INTO nomina_db (name, salario_base, comision_pct) VALUES (?, ?, ?)");
        return $stmt->execute([$nombre, $salario_base, $comision_pct]);
    }

    public function listar() {
        $stmt = $this->pdo->query("SELECT * FROM nomina_db");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function calcularsalario($salario_base, $comision_pct) {
        return $salario_base + ($salario_base * ($comision_pct / 100));
    }
}