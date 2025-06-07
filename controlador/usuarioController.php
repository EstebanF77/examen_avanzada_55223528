<?php

require_once __DIR__ . '/../modelo/usuario.php';

class UsuarioController {
    private $model;

    public function index() {
        
        $this->listarEmpleados();
    }

    public function registrar() {
        $message = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $salario_base = filter_var($_POST['salario_base'] ?? 0, FILTER_VALIDATE_FLOAT);
            $comision_pct = filter_var($_POST['comision_pct'] ?? 0, FILTER_VALIDATE_FLOAT);

            if ($nombre && $salario_base !== false && $salario_base >= 0 && $comision_pct !== false && $comision_pct >= 0 && $comision_pct <= 1) {
                if ($this->model->crear($nombre, $salario_base, $comision_pct)) {
                    $message = "Empleado '$nombre' registrado exitosamente.";
                } else {
                    $error = "Error al registrar al empleado.";
                }
            } else {
                $error = "Datos de entrada inválidos. Asegúrese de que el salario base y la comisión sean números válidos y que la comisión esté entre 0 y 1.";
            }
        }
        
        require_once __DIR__ . '/../vista/usuario_form.php';
    }

    public function listarEmpleados() {
        $empleados = $this->model->listar();
        require_once __DIR__ . '/../views/empleado_list.php';
    }
}
?>