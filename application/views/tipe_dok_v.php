<?PHP
	$this->load->view('header_v');
?>
<div class="container" >
<div class="panel panel-default">
        	<div class="panel-heading">
            	<h3 class="panel-title"><i class="glyphicon glyphicon-upload"></i> TAMBAH TIPE DOKUMEN</h3>
             </div>
             <div class="panel-body">
			 <?php if($this->uri->segment(3)=="success")
		{
		?>
        <div class="alert alert-success alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data Berhasil ditambah
            </div>
        <?php
        } else if($this->uri->segment(3)=="error")
		{
		?>
        <div class="alert alert-danger alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            ID Tipe sudah digunakan
            </div>
        <?php
        } 
		?>
			<form method="post" id="form_upload" role="form" action="<?php echo site_url(); ?>tipe_dokumen/insert">
				 <div class="form-group">
					 <label for="tipe">ID Prosedur</label>
					 <input class="form-control" type="text" name="id_tipe" id="id_tipe" required/>
				 </div>   
					 <div class="form-group">
					 <label for="file">Nama Dokumen</label>
					 <input class="form-control" type="text" name="tipe" id="tipe" required/>  
				 </div>
				 <label for="tipe">Hak Akses</label>
				 <div class="form-group">
					 
					 <?php foreach($jabat->result() as $row)
					 {
					 ?>		
					 <div class="col-md-4">
						<div class="input-group">
						  <span class="input-group-addon">
							<input type="checkbox" aria-label="..." value="<?php echo $row->id_jabatan; ?>" name="check[]">
						  </span>
						  <input type="text" value="<?php echo $row->nama_jabatan; ?>" disabled="disabled">
						</div><!-- /input-group -->
					 </div>
					 <?php
					 }
					 ?>
				</div>
			</form>
            
            </div>
				<div class="panel-footer">
                	<button type="submit" class="btn btn-primary btn-block" form="form_upload">
                    <i class="glyphicon glyphicon-upload"></i> Simpan
                    </button>
                </div>
				
            	
           </div>
		   
		   
		   <div class="panel panel-default">
        	<div class="panel-heading">
			<div class="pull-left">
            <h3 class="panel-title">TIPE DOKUMEN</h3>
            </div>
           
        <div class="clearfix"></div>
             </div>
             <div class="panel-body">
				
				<table class="table table-responsive">
            <thead>
            	<tr>
                	<th>ID TIPE</th>
                    <th>TIPE DOKUMEN</th>
					<th>HAK AKSES</th>
					<th>MODIFIKASI</th>
                </tr>
               </thead>
               <tbody>
                <?PHP 
					foreach($tipe->result() AS $row) :
				?>
                <tr>
				<td>
				<?php echo $row->id_tipe;?>
				<input type="hidden" id="id_tipe"></input>
				</td>
                <td><?php echo $row->tipe;?></td>
				<td>
					<a href="<?php echo base_url();?>hak_akses?id=<?php echo $row->id_tipe; ?>"><button class="btn btn-primary">Lihat Hak Akses</button>
				</td>
				<td>
						<button class="btn btn-danger btn-sm delete" title="hapus" data-toggle="modal" data-target="#modal_konfirmasi" id="hapus_<?php echo $row->id_tipe;?>"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                    </td>
                </tr>
                <?PHP 
				endforeach;
				?></tbody>
            </table>
			<div class="modal fade" id="modal_konfirmasi">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                     			<h4 class="modal-title">Konfirmasi</h4>
                                </div>
                                <div class="modal-body">
									
                    			   <p id="confirm_str">Apakah Anda Yakin Menghapus Semua</p>
                                </div>
                                <div class="modal-footer">
								   <button class="btn btn-primary btn-sm" id="delete">Ya</button>
                                   <button class="btn btn-primary btn-sm" data-dismiss="modal">Tidak</button>
                                </div>
                            </div>
                        </div>
                </div>
			
            </div>    	
           </div>


</div> <!-- /container -->
<?PHP
$this->load->view('footer_v');
?>

<script type="text/javascript">
	$(document).ready(function(e) {

	});
	$('.delete').click(function(){
		var id = this.id.substr(6);
		//alert(id);
		$('#id_tipe').val(id);
		$('#confirm_str').html('Apaka Anda Ingin Menghapus Data Ini')
		});
		
		
		$('#delete').click(function(){
			
			window.location = '<?php echo site_url();?>tipe_dokumen/delete/' + $('#id_tipe').val();;
		});
</script>