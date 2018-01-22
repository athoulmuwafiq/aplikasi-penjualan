<?php include "head.php" ?>
<script type="text/javascript">
	document.title="Setting akun admin";
</script>
<div class="content">
	<div class="padding">
		<div class="bgwhite">
			<div class="padding">
				<h3 class="jdl">Setting akun admin</h3>
				<span class="label">* silahkan melakukan perubahan username atau password untuk admin.</span>
				<form class="form-input" method="post" action="handler.php?action=edit_admin" style="padding-top: 30px;">
					<?php
					$f=$root->edit_admin();
					?>
					<label>Username : </label>
					<input type="text" name="username" value="<?= $f['username'] ?>">
					<label>Password Baru :</label>
					<input type="text" name="password">
					<label>* Password tidak bisa ditampikan karena terenkripsi</label><br>
					<label>* Kosongkan form password jika tidak ingin merubah password</label><br><br>
					<button class="btnblue" type="submit"><i class="fa fa-save"></i> Simpan</button>
					<a onclick="return confirm('yakin ingin reset akun admin?')" href="handler.php?action=reset_admin" class="btnblue" style="background: #f33155"><i class="fa fa-rotate-left"></i> Reset Akun</a>
					<a href="home.php" class="btnblue" style="background: #f33155"><i class="fa fa-close"></i> Batal</a>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
include "foot.php";
?>
