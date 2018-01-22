<script type="text/javascript">
	document.title="Edit Barang";
	document.getElementById('barang').classList.add('active');
</script>

<div class="content">
	<div class="padding">
		<div class="bgwhite">
			<div class="padding">
				<h3 class="jdl">Edit Barang</h3>
				<?php
				$f=$root->edit_barang($_GET['id_barang']);
				?>
				<form class="form-input" method="post" action="handler.php?action=edit_barang" style="padding-top: 30px;">	<input type="hidden" name="id_barang" value="<?= $f['id_barang'] ?>">
					<input type="text" placeholder="ID Kategori" disabled="disabled" value="ID barang : <?= $f['id_barang'] ?>">
					<label>Nama Barang :</label>
					<input type="text" name="nama_barang" placeholder="Nama Barang" required="required" value="<?= $f['nama_barang'] ?>">
					<label>Stock :</label>
					<input name="stok" placeholder="Stok" required="required" value="<?= $f['stok'] ?>">
					<label>Harga Beli :</label>
					<input type="number" name="harga_beli" placeholder="Harga Beli" required="required"value="<?= $f['harga_beli'] ?>">
					<label>Harga Jual :</label>
					<input type="number" name="harga_jual" placeholder="Harga Jual" required="required" value="<?= $f['harga_jual'] ?>">
					<label>Kategori :</label>
					<select style="width: 372px;cursor: pointer;" required="required" name="kategori">
						<option value="">Pilih Kategori :</option>
						<?php $root->tampil_kategori3($_GET['id_barang']); ?>
					</select>
					<button class="btnblue" type="submit"><i class="fa fa-save"></i> Simpan</button>
					<a href="barang.php" class="btnblue" style="background: #f33155"><i class="fa fa-close"></i> Batal</a>
				</form>
			</div>
		</div>
	</div>
</div>
