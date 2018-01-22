<script type="text/javascript">
	document.title="Edit Kategori Barang";
	document.getElementById('kategori').classList.add('active');
</script>

<div class="content">
	<div class="padding">
		<div class="bgwhite">
			<div class="padding">
				<h3 class="jdl">Edit Kategori</h3>
				<?php $f=$root->edit_kategori($_GET['id_kategori']) ?>
				<form class="form-input" method="post" action="handler.php?action=edit_kategori">
					<input type="text" placeholder="ID Kategori" disabled="disabled" value="ID kategori : <?= $f['id_kategori'] ?>">
					<input type="text" name="nama_kategori" placeholder="Nama Barang" required="required" value="<?= $f['nama_kategori'] ?>">
					<input type="hidden" name="id_kategori" value="<?= $f['id_kategori'] ?>">
					<button class="btnblue" type="submit"><i class="fa fa-save"></i> Update</button>
					<a href="kategori.php" class="btnblue" style="background: #f33155"><i class="fa fa-close"></i> Batal</a>
				</form>
			</div>
		</div>
	</div>
</div>
