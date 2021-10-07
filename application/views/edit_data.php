<html>
<head>
	<title>Edit Data</title>
</head>
<body>
	<center>
		<h1>Edit Data Mahasiswa</h1>
	</center>
	<?php foreach ($mahasiswa as $u){ ?>
	<form action="<?php echo base_url(). 'index.php/kampus/update'; ?>" method="post" enctype="multipart/form-data">
		<table style="margin:20px auto;">
			<tr>
				<td>NIM</td>
				<td>
					<input type="hidden" name="id" value="<?php echo $u->id ?>">
					<input type="text" name="nim" value="<?php echo $u->nim ?>">
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>
					<input type="text" name="nama" value="<?php echo $u->nama ?>">
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?php echo $u->alamat ?>"></td>
			</tr>
			<tr>
				<td>Pekerjaan</td>
				<td><input type="text" name="pekerjaan" value="<?php echo $u->pekerjaan ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="update"> <?php echo anchor('kampus/index','<input type=button value=kembali>');?></td>
			</tr>
		</table>
	</form>
	<?php } ?>
</body>
</html>