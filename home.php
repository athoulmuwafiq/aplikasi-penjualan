<?php include "head.php"; ?>
<script type="text/javascript">
	document.title="Dashboard";
	document.getElementById('dash').classList.add('active');
</script>
<div class="content">
	<div class="padding">
		<div class="box">
			<div class="padding">
			<i class="fa fa-user"></i>
			Login sebagai
			<span class="status greend">
				
				<?php if ($_SESSION['status']==1) {
					echo "Admin";
				}else{
					echo "Kasir";
					} ?>
			</span>
			</div>
		</div>
		<div class="box">
			<div class="padding">
				<i class="fa fa-clock-o"></i>
				Waktu
				<span class="status blued"> <?= date("d-m-Y") ?></span>
			</div>
		</div>
		<div class="box">
			<div class="padding">
				<i class="fa fa-bars"></i>
				Data Barang
				<span class="status blued"><?= $root->show_jumlah_barang() ?></span>
			</div>
		</div>
		<div class="box">
			<div class="padding">
				<i class="fa fa-book"></i>
				Laporan
				<span class="status blued"><?= $root->show_jumlah_trans2() ?></span>
			</div>
		</div>
	</div>
</div>
<?php include"foot.php" ?>
