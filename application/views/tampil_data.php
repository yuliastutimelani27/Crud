<html>
<head>
	<title>Tampil Data</title>
</head>
<body>
	<center><h1>Data Mahasiswa</h1></center>
	<table style="margin:20px auto;" border="1">
		<tr>
			<th>No</th>
			<th>Nim</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Pekerjaan</th>
			<th>Action</th>
		</tr>
		<?php
		$no = 1;
		foreach($mahasiswa as $u){
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $u->nim ?></td>
			<td><?php echo $u->nama ?></td>
			<td><?php echo $u->alamat ?></td>
			<td><?php echo $u->pekerjaan ?></td>
			<td>
				<?php echo anchor('kampus/edit/'.$u->id,'Edit'); ?>
				<?php echo anchor('kampus/hapus/'.$u->id,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>
	<center><?php echo anchor('kampus/tambah','<input type=button value=\'Tambah Data\'>'); ?></center>
</body>
</html>