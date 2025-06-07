<?php ob_start(); ?>

<h2>Listado de Empleados</h2>

<?php if (empty($empleados)): ?>
    <p>No hay usuarios registrados.</p>
<?php else: ?>
    <table >
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Salario Base</th>
                <th>Comisión (%)</th>
                <th>Salario Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empleados as $empleado): ?>
                <tr>
                    <td><?php echo htmlspecialchars($empleado['id']); ?></td>
                    <td><?php echo htmlspecialchars($empleado['nombre']); ?></td>
                    <td><?php echo number_format(htmlspecialchars($empleado['salario_base']), 2); ?></td>
                    <td><?php echo number_format(htmlspecialchars($empleado['comision_pct'] * 100), 2); ?>%</td>
                    <td><?php echo number_format(htmlspecialchars($empleado['salario_base'] * (1 + $empleado['comision_pct'])), 2); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
