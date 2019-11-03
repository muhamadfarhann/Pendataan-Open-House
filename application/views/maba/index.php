<div class="row">
    <div class="col-md-12">
        <!-- <div class="input-group input-group-md">
                <input type="text" class="form-control" placeholder="Cari Data..">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                    </span>
              </div>
              <br> -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Maba</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('maba/add'); ?>" class="btn btn-success btn-sm">Tambah Data</a> 
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-striped">
                    <tr>
						<th>No</th>
						<th>Nama</th>
						<th>Kelas</th>
						<th>Nrp</th>
						<th>No Wa</th>
						<th>Line</th>
						<!-- <th>Actions</th> -->
                    </tr>
                    <?php foreach($maba as $m){ ?>
                    <tr>
						<td><?php echo $m['id']; ?></td>
						<td><?php echo $m['nama']; ?></td>
						<td><?php echo $m['kelas']; ?></td>
						<td><?php echo $m['nrp']; ?></td>
						<td><?php echo $m['no_wa']; ?></td>
						<td><?php echo $m['line']; ?></td>
						<!-- <td>
                            <a href="<?php echo site_url('maba/edit/'.$m['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('maba/remove/'.$m['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td> -->
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
        <a href="<?php echo base_url('maba/pdf'); ?>" class="btn btn-danger"><i class="fa fa-print"></i> Ekspor PDF</a>
        <a href="<?php echo base_url('maba/excel'); ?>" class="btn btn-warning"><i class="fa fa-file"></i> Ekspor Excel</a>   
    </div>
</div>
