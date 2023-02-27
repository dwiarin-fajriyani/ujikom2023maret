<div class="container mt-3">
	<?php if($this->session->flashdata('notif') ) : ?>
		<div class="row mt-3">
			<div class="col-md-12">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data transaksi <strong> berhasil </strong> <?php echo $this->session->flashdata('notif'); ?>
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
		</div>
	<?php endif; ?>
	
	<div class="card">
		<div class="card-header">Data Transaksi</div>
		<div class="card-body">
			<div class="row mt-3">
				<div class="col-md-12 d-flex justify-content-between align-items-center">
					<a href="<?php echo base_url('transaksi/tambah'); ?>" role="button" class="btn btn-primary">Tambah Transaksi</a>
					<form action="" method="post">
						<div class="input-group">
						  <input type="text" class="form-control" placeholder="Cari Data Transaksi" name="keyword">
						  <button class="btn btn-primary" type="submit">Cari</button>
						</div>
					</form>
				</div>
			</div>
			
			<?php if (empty($transaksi)) : ?>
			<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
						Data transaksi tidak ditemukan
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php endif; ?>
			<table class="table table-hover mt-3">
					<tr>
						<th>No</th>
						<th>Kode Transaksi</th>
						<th>Tanggal</th>
						<th>Rekening</th>
						<th>Nama</th>
						<th>Transaksi</th>
						<th>Petugas</th>
						<th>Nominal</th>
						<th>Action</th>
					</tr>
				<?php 
				$no = 1;
				foreach ($transaksi as $row) {
					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $row->kd_transaksi ?></td>
						<td><?php echo $row->tanggal ?></td>
						<td><?php echo $row->no_rek ?></td>
						<td><?php echo $row->nama_nasabah ?></td>
						<td><?php echo $row->jenis_transaksi ?></td>
						<td><?php echo $row->nama_petugas ?></td>
						<td><?php echo $row->nominal ?></td>
						<td> 
							<a href="<?php echo base_url('transaksi/edit/').$row->kd_transaksi;?>" class="badge bg-success"> Edit</a>
							<a href="<?php echo base_url('transaksi/hapus/').$row->kd_transaksi;?>" class="badge bg-danger" onclick="return confirm('Yakin ingin menghapus data nilai ?');"> Hapus</a>
						</td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</div>

