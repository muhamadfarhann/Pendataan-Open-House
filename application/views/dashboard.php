<h3>Dashboard</h3>
<div class="row">
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-orange"><i class="fa fa-user-o"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Maba</span>
				<span class="info-box-number"><?= $maba; ?> Peserta</span>
				<a href="<?php echo base_url('maba/index');?>">Lihat Data</a>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-blue"><i class="fa fa-user-o"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Senior</span>
					<span class="info-box-number"><?= $senior; ?> Peserta</span>
					<a href="<?php echo base_url('senior/index');?>">Lihat Data</a>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>		
	</div>