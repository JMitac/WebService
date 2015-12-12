<?php

$fecha = date('d_m_Y');
require_once 'php/controller/contacto.controller.php';
$controller = new contactoController();
$lisConta = call_user_func(array($controller,'lisConta'));
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=reporte_certificaciones_$fecha.xls");

?>
<!DOCTYPE html>

<html>

<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<style>
        .tablaresul tr td{
            border: 1px solid;
            border-color: #363535;
            border-collapse: collapse;
              padding:10px;
        }
        
        .tablaresul{
            border: 1px solid;
            border-color: #363535;
            border-collapse: collapse;
            text-align: center;
        }
        .cabetabla{
          border: 0px solid;
        
          
        }
        .cabetabla th{
            padding:10px;
            height: 50px;
               background-color: #363535;
            color:white;
        }
    </style>
</head>

<body>
<h3 align="center">Lista de Certificaciones Cliente</h3>
<table width="700" class="tablaresul">
	<tr class="cabetabla">			
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Tipo</th>
        <th>Marca</th>
        <th>Motor</th>
        <th>Tubo</th>
        <th>Bujias</th>
        <th>Filtros</th>				
	</tr>
	<?php foreach ($lisConta as $row) { ?>
	<tr>
		<td><?php echo $row->cli_nombre; ?></td>
        <td><?php echo $row->cli_pater; ?></td>
        <td><?php echo $row->cli_tipvehiculo; ?></td>
        <td><?php echo $row->cli_marca; ?></td>
		<td><?php echo $row->rev_motor; ?></td>
		<td><?php echo $row->rev_tubo; ?></td>
		<td><?php echo $row->rev_bujias; ?></td>
        <td><?php echo $row->rev_filtros; ?></td>
	</tr>
	<?php } ?>
</table>
</body>
</html>
