<?php include "head.php" ?>
<?php
	if (isset($_GET['action']) && $_GET['action']=="edit_kategori") {
		include "edit_kategori.php";
	}
	else{
?>
<script type="text/javascript">
	document.title="Kategori Barang";
	document.getElementById('kategori').classList.add('active');
</script>
<div class="content">
	<div class="padding">
		<div class="bgwhite">
			<div class="padding">
			<div class="contenttop">
				<div class="left">
					<form action="handler.php?action=tambah_kategori" method="post">
						<input type="text" name="nama_kategori" placeholder="Nama Kategori..." style="margin-right: 10px;border-right: 1px solid #ccc;border-radius: 3px;">
						<button style="background: #41b3f9;color: #fff;border-radius: 3px;border-color: #41b3f9;border:1px solid #41b3f9">Tambahkan</button>
					</form>
				</div>
				<div class="both"></div>
			</div>
			<span class="label">Jumlah Kategori : <?= $root->show_jumlah_cat() ?></span>
			<table class="datatable" style="width: 500px;">
				<thead>
				<tr>
					<th width="35px">NO</th>
					<th>Nama Kategori</th>
					<th width="60px">Aksi</th>
				</tr>
			</thead>
			<tbody>
					<?php $root->tampil_kategori() ?>
</tbody>

			</table>
			</div>
		</div>
	</div>
</div>

<?php 
}
include "foot.php" ?>
