<?PHP
	$this->load->view('header_v');
	
?>
<div class="container" >
<?php
		 if($this->uri->segment(3)=="success")
		{
		?>
        <div class="alert alert-success alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data Jabatan berhasil ditambahkan 
            </div>
        <?php
        }else if($this->uri->segment(3)=="hapus")
		{
		?>
        <div class="alert alert-danger alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data Jabatan berhasil dihapus
            </div>
        <?php
        }else if($this->uri->segment(3)=="hapus")
		{
		?>
        <div class="alert alert-success alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data Jabatan berhasil diubah
            </div>
        <?php
        }?>


<div class="panel panel-default panel_tambah">
        	<div class="panel-heading">
            	<h3 class="panel-title"><i class="glyphicon glyphicon-add"></i> TAMBAH JABATAN</h3>
             </div>
             <div class="panel-body">
			<form method="post" id="form_tambah" role="form" >
				 <div class="form-group">
					 <label for="tipe">NAMA JABATAN</label>
					 <input class="form-control" type="text" name="nama_jabatan" id="nama_jabatan" required/>
					 <input class="form-control" type="hidden" name="id_jabatan" id="id_jabatan" />
				 </div>
			</form>
            
            </div>
				<div class="panel-footer">
                	<button type="submit" class="btn btn-primary tambah" form="form_tambah">
					SIMPAN
                    </button>
					<button type="submit" class="btn btn-default batal">BATAL
                    </button>
                </div>
				
            	
           </div>
		   
		<div class="panel panel-default tabel">
        	<div class="panel-heading">
			<div class="pull-left">
            <h3 class="panel-title">JABATAN</h3>
            </div>
            <div class="pull-right">
           <button class="btn btn-primary btn-sm add" title="tambah" data-toggle="modal" ><i class="glyphicon glyphicon-plus"></i> Tambah</button>
		</div>
        <div class="clearfix"></div>
             </div>
             <div class="panel-body">
				
				<table class="table table-responsive ">
            <thead>
            	<tr>
                	<th>ID JABATAN</th>
                    <th>NAMA</th>
                    <th>MODIFIKASI</th>
                </tr>
               </thead>
               <tbody>
                <?PHP 
					foreach($jab->result() AS $row) :
				?>
                <tr>
				<td>
				<?php echo $row->id_jabatan;?>
                <input type="hidden" id="id_jabatan_<?php echo $row->id_jabatan;?>" value="<?php echo $row->id_jabatan;?>">
                <input type="hidden" id="jabatan_<?php echo $row->id_jabatan;?>" value="<?php echo $row->nama_jabatan;?>">
                </td>
                
                <td><?php echo $row->nama_jabatan;?></td>
                    <td>
						<button class="btn btn-primary btn-sm edit" title="edit" data-toggle="modal" id="edit_<?php echo $row->id_jabatan;?>"><i class="glyphicon glyphicon-edit"></i> Edit</button>
						<button class="btn btn-danger btn-sm delete" title="hapus" data-toggle="modal" data-target="#modal_konfirmasi" id="hapus_<?php echo $row->id_jabatan;?>"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                    </td>
                </tr>
                <?PHP 
				endforeach;
				?></tbody>
            </table>
			
            </div>
			
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


</div> <!-- /container -->

<?PHP
	$this->load->view('footer_v');
?>

<script type="text/javascript">
	$(document).ready(function(e) {
	$(".tabel").show();
	$(".panel_tambah").hide();
		$(".add").click(function() {
			$("#save").show();
			$(".panel_tambah").show();
			$(".tabel").hide();
			$("#id_jabatan").val('');
			$("#form_tambah").attr("action", "<?PHP echo site_url(); ?>jabatan/insert");
			});
		$(".edit").click(function() {
			var id = this.id.substr(5);
			$("#save").show();
			$(".panel_tambah").show();
			$(".tabel").hide();
			$("#id_jabatan").val(id);
			$("#nama_jabatan").val($("#jabatan_" + id).val());
			$("#form_tambah").attr("action", "<?PHP echo site_url(); ?>jabatan/update");
			
		});
		$(".batal").click(function() {
			$("#save").show();
			$(".panel_tambah").hide();
			$(".tabel").show();
		});
	});
	$('.delete').click(function(){
		var id = this.id.substr(6);
		//	alert(id);
		$('#id_jabatan').val(id);
		$('#confirm_str').html('Apaka Anda Ingin Menghapus Data Ini')
		});
		
		
		$('#delete').click(function(){
			
			window.location = '<?php echo site_url();?>jabatan/delete/' + $('#id_jabatan').val();;
		});
</script>