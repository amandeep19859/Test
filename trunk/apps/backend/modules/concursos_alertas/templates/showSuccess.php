<div id="sf_admin_container">
<h1>Detalle de la alerta de empresa/entidad o producto</h1>


<div id="sf_admin_content">
<table>
	<thead><tr><th>Tipo de alerta</th><th>Descripción</th><th>Creada el</th></tr></thead>
<tbody>
<tr>
	<td><?php echo $alerta->getType()?></td>
	<td><?php echo $alerta->getMessage(ESC_RAW)?></td>
	<td><?php echo format_datetime($alerta->getCreatedAt(), "dd/MM/y HH:mm", "es_ES")?></td>
</tr>
</tbody>
</table>  
</div>
<?php echo link_to('Volver al Listado','concursos_alertas/index')?>
</div>