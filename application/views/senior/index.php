<div class="row">
    <div class="col-md-12">
        <!-- <form action="" method="post">
        <div class="input-group input-group-md">
                <input type="text" class="form-control" name="keyword" placeholder="Cari Data..">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                    </span>
              </div>
              <br>
          </form> -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Senior</h3>
            	<div class="box-tools">
                    <a href="<?php echo base_url('senior/add'); ?>" class="btn btn-success btn-sm">Tambah Data</a>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-striped">
                    <tr>
						<th>No</th>
						<th>Nama</th>
                        <th>Divisi</th>
						<th>Angkatan</th>
						<th>Line</th>
						<th>No Whatsapp</th>
						<th>Alamat</th>
						<!-- <th>Actions</th> -->
                    </tr>
                    <?php foreach($senior as $s){ ?>
                    <tr>
                        <td><?php echo $s['id']; ?></td>
						<td><?php echo $s['nama']; ?></td>
                        <td><?php echo $s['divisi']; ?></td>
                        <td><?php echo $s['angkatan']; ?></td>
						<td><?php echo $s['line']; ?></td>
						<td><?php echo $s['no_wa']; ?></td>
						<td><?php echo $s['alamat']; ?></td>
						<!-- <td>
                            <a href="<?php echo base_url('senior/edit/'.$s['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo base_url('senior/remove/'.$s['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td> -->
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
        <a href="<?php echo base_url('senior/pdf'); ?>" class="btn btn-danger"><i class="fa fa-print"></i> Ekspor PDF</a>
        <a href="<?php echo base_url('senior/excel'); ?>" class="btn btn-warning"><i class="fa fa-file"></i> Ekspor Excel</a>          
    </div>
</div>
