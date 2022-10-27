<a href=?p=akses&aksi=list class="btn btn-danger">List Akses Masuk</a>
<?php
include ("koneksi.php");
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
	case 'list' :
?>

<h2 style="color : #fff">List Akses Masuk</h2>
<table class="table table-striped">
	<tr style="color : #fff">
		<th>No</th>
		<th>ID User</th>
		<th>Nama</th>
		<th>Suhu</th>
		<th>Access</th>
		<th>Tanggal</th>
		<?php 
		if($_SESSION['level']=='administrator'){
			echo "<th>Aksi</th>";
		}
		?>
	</tr>
	<?php
	
	$no=1;
	$t=mysqli_query($koneksi,"SELECT * FROM akses where access='1' order by tanggal DESC");
	while ($data=mysqli_fetch_array($t)) {
	?>
	<tr style="color : #fff">
		<td><?php echo $no; ?></td>
		<td><?php echo $data['id_user']; ?></td>
		<td><?php echo $data['nama']; ?></td>
		<td><?php echo $data['suhu']; ?></td>
		<td><?php echo $data['access']; ?></td>
		<td><?php echo $data['tanggal']; ?></td>
		<?php 
		if($_SESSION['level']=='administrator'){
		?>
		<td>
			<a href="aksi_akses.php?page=akses&proses=hapus&id=<?php echo $data['id']; ?>">Hapus</td> </a>
		<?php
			}
		?>
	</tr>
	<?php
		$no++;
	}
	?>
</table>
<?php
	break;
}
?>
<?php 
	$data_barang=mysqli_query($koneksi,"SELECT * from akses where access='1'");
	$jumlah_data=mysqli_num_rows($data_barang);
?>
jumlah data yang masuk : <?php echo $jumlah_data; ?>