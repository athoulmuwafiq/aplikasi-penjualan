<?php include "head.php" ?>
<?php
	if (isset($_GET['action']) && $_GET['action']=="transaksi_baru") {
		include "transaksi_baru.php";
	}
	else if (isset($_GET['action']) && $_GET['action']=="detail_transaksi") {
		include "detail_transaksi.php";
	}

	else{
?>
<script type="text/javascript">
	document.title="Transaksi";
	document.getElementById('transaksi').classList.add('active');
</script>
<div class="content">
	<div class="padding">
		<div class="bgwhite">
			<div class="padding">
			<div class="contenttop">
				<div class="left">
					<a href="?action=transaksi_baru" class="btnblue">Transaksi Baru</a>
				</div>
				<div class="both"></div>
			</div>
			<span class="label">Jumlah Transaksi : <?= $root->show_jumlah_trans() ?></span>
			<table class="datatable">
				<thead>
				<tr>
					<th width="35px">NO</th>
					<th>Tanggal Transaksi</th>
					<th>Total Bayar</th>
					<th>Nama Pembeli</th>
					<th>No Invoice</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no=1;
				$q=$root->con->query("select * from transaksi where kode_kasir='$_SESSION[id]' order by id_transaksi desc");
				if ($q->num_rows > 0) {
				while ($f=$q->fetch_assoc()) {
					?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= date("d-m-Y",strtotime($f['tgl_transaksi'])) ?></td>
						<td>Rp. <?= number_format($f['total_bayar']) ?></td>
						<td><?= $f['nama_pembeli'] ?></td>
						<td><?= $f['no_invoice'] ?></td>
						<td>
							<a href="?action=detail_transaksi&id_transaksi=<?= $f['id_transaksi'] ?>" class="btn bluetbl m-r-10"><span class="btn-edit-tooltip">Detail</span><i class="fa fa-eye"></i></a>
							<a href="cetak_nota.php?oid=<?= base64_encode($f['id_transaksi']) ?>&id-uid=<?= base64_encode($f['nama_pembeli']) ?>&inf=<?= base64_encode($f['no_invoice']) ?>&tb=<?= base64_encode($f['total_bayar']) ?>&uuid=<?= base64_encode(date("d-m-Y",strtotime($f['tgl_transaksi']))) ?>" target="_blank" class="btn bluetbl"><span class="btn-hapus-tooltip">Cetak</span><i class="fa fa-print"></i></a>
						</td>
					</tr>
					<?php
				}
			}else{
				?>
				<td><?= $no++ ?></td>
				<td colspan="5">Belum Ada Transaksi</td>
				<?php
			}
				?>
			</tbody>
			</table>
			</div>
		</div>
	</div>
</div>

<?php 
}
include "foot.php" ?>
