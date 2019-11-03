<!DOCTYPE html>
<html><head>
	<title></title>
</head><body>

<h2 align="center">Data Senior Open House 2019</h3>

<hr>
<br>
	<table border="1" width="100%" style="border-collapse: collapse;">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Divisi</th>
			<th>Angkatan</th>
			<th>Line</th>
			<th>No Whatsapp</th>
			<th>Alamat</th>
		</tr>
		<?php foreach($senior as $s): ?>
		<tr>
			<td><?php echo $s->id; ?></td>
			<td><?php echo $s->nama; ?></td>
			<td><?php echo $s->divisi; ?></td>
			<td><?php echo $s->angkatan; ?></td>
			<td><?php echo $s->line; ?></td>
			<td><?php echo $s->no_wa; ?></td>
			<td><?php echo $s->alamat; ?></td>
		</tr>
		<?php endforeach; ?>
	</table>

</body></html>