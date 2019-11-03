<!DOCTYPE html>
<html><head>
	<title></title>
</head><body>

<h2 align="center">Data Maba Open House 2019</h3>

<hr>
<br>
	<table border="1" width="100%" style="border-collapse: collapse;">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Kelas</th>
			<th>NRP</th>
			<th>No Whatsapp</th>
			<th>Line</th>
		</tr>
		<?php foreach($maba as $m): ?>
		<tr>
			<td><?php echo $m->id; ?></td>
			<td><?php echo $m->nama; ?></td>
			<td><?php echo $m->kelas; ?></td>
			<td><?php echo $m->nrp; ?></td>
			<td><?php echo $m->no_wa; ?></td>
			<td><?php echo $m->line; ?></td>
		</tr>
		<?php endforeach; ?>
	</table>

</body></html>