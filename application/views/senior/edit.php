<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Ubah Data</h3>
            </div>
			<?php echo form_open('senior/edit/'.$senior['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="divisi" class="control-label"><span class="text-danger">*</span>Divisi</label>
						<div class="form-group">
							<select name="divisi" class="form-control">
								<option value="">select</option>
								<?php 
								$divisi_values = array(
									'Inti'=>'Inti',
									'Humas'=>'Humas',
									'Animasi'=>'Animasi',
									'Software'=>'Software',
									'Hardware'=>'Hardware',
								);

								foreach($divisi_values as $value => $display_text)
								{
									$selected = ($value == $senior['divisi']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('divisi');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="angkatan" class="control-label"><span class="text-danger">*</span>Angkatan</label>
						<div class="form-group">
							<select name="angkatan" class="form-control">
								<option value="">select</option>
								<?php 
								$angkatan_values = array(
									'1'=>'1',
									'2'=>'2',
									'3'=>'3',
									'4'=>'4',
									'5'=>'5',
									'6'=>'6',
									'7'=>'7',
									'8'=>'8',
									'9'=>'9',
									'X'=>'X',
									'X1'=>'X1',
									'X2'=>'X2',
									'X3'=>'X3',
									'X4'=>'X4',
									'X5'=>'X5',
									'X6'=>'X6',
									'X7'=>'X7',
									'X8'=>'X8',
									'X9'=>'X9',
									'X10'=>'X10',
									'X11'=>'X11',
								);

								foreach($angkatan_values as $value => $display_text)
								{
									$selected = ($value == $senior['angkatan']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('angkatan');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nama" class="control-label"><span class="text-danger">*</span>Nama</label>
						<div class="form-group">
							<input type="text" name="nama" value="<?php echo ($this->input->post('nama') ? $this->input->post('nama') : $senior['nama']); ?>" class="form-control" id="nama" />
							<span class="text-danger"><?php echo form_error('nama');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="line" class="control-label"><span class="text-danger">*</span>Line</label>
						<div class="form-group">
							<input type="text" name="line" value="<?php echo ($this->input->post('line') ? $this->input->post('line') : $senior['line']); ?>" class="form-control" id="line" />
							<span class="text-danger"><?php echo form_error('line');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="no_wa" class="control-label"><span class="text-danger">*</span>No Wa</label>
						<div class="form-group">
							<input type="text" name="no_wa" value="<?php echo ($this->input->post('no_wa') ? $this->input->post('no_wa') : $senior['no_wa']); ?>" class="form-control" id="no_wa" />
							<span class="text-danger"><?php echo form_error('no_wa');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="alamat" class="control-label"><span class="text-danger">*</span>Alamat</label>
						<div class="form-group">
							<textarea name="alamat" class="form-control" id="alamat"><?php echo ($this->input->post('alamat') ? $this->input->post('alamat') : $senior['alamat']); ?></textarea>
							<span class="text-danger"><?php echo form_error('alamat');?></span>
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