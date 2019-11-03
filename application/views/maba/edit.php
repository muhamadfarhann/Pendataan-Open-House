<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Ubah Data</h3>
            </div>
			<?php echo form_open('maba/edit/'.$maba['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nama" class="control-label"><span class="text-danger">*</span>Nama</label>
						<div class="form-group">
							<input type="text" name="nama" value="<?php echo ($this->input->post('nama') ? $this->input->post('nama') : $maba['nama']); ?>" class="form-control" id="nama" />
							<span class="text-danger"><?php echo form_error('nama');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="kelas" class="control-label"><span class="text-danger">*</span>Kelas</label>
						<div class="form-group">
							<input type="text" name="kelas" value="<?php echo ($this->input->post('kelas') ? $this->input->post('kelas') : $maba['kelas']); ?>" class="form-control" id="kelas" />
							<span class="text-danger"><?php echo form_error('kelas');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nrp" class="control-label"><span class="text-danger">*</span>Nrp</label>
						<div class="form-group">
							<input type="text" name="nrp" value="<?php echo ($this->input->post('nrp') ? $this->input->post('nrp') : $maba['nrp']); ?>" class="form-control" id="nrp" />
							<span class="text-danger"><?php echo form_error('nrp');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="no_wa" class="control-label"><span class="text-danger">*</span>No Wa</label>
						<div class="form-group">
							<input type="text" name="no_wa" value="<?php echo ($this->input->post('no_wa') ? $this->input->post('no_wa') : $maba['no_wa']); ?>" class="form-control" id="no_wa" />
							<span class="text-danger"><?php echo form_error('no_wa');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="line" class="control-label"><span class="text-danger">*</span>Line</label>
						<div class="form-group">
							<input type="text" name="line" value="<?php echo ($this->input->post('line') ? $this->input->post('line') : $maba['line']); ?>" class="form-control" id="line" />
							<span class="text-danger"><?php echo form_error('line');?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>