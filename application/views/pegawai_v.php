<?PHP
	$this->load->view('header_v');
	
?>
<div class="container" >
<?php
			if($this->uri->segment(3)=="error")
		{
		?>
        <div class="alert alert-danger alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Username telah digunakan
            </div>
        <?php
        } 
			else if($this->uri->segment(3)=="validat")
		{
		?>
        <div class="alert alert-danger alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Maaf mohon masukan email dengan benar
            </div>
        <?php
        }else if($this->uri->segment(3)=="success")
		{
		?>
        <div class="alert alert-success alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data Pegawai berhasil ditambahkan 
            </div>
        <?php
        }?>


<div class="panel panel-default panel_tambah">
        	<div class="panel-heading">
            	<h3 class="panel-title"><i class="glyphicon glyphicon-add"></i> TAMBAH PEGAWAI</h3>
             </div>
             <div class="panel-body">
			<form method="post" id="form_tambah" role="form" action="<?php echo site_url(); ?>pegawai/insert">
				 <div class="form-group">
					 <label for="tipe">ID USER</label>
					 <input class="form-control" type="text" name="id_user" id="id_user" maxlength="3" required/>
				 </div>
				 <div class="form-group">
					 <label for="tipe">NAMA</label>
					 <input class="form-control" type="text" name="nama" id="nama" required/>
				 </div>
				 <div class="form-group">
					 <label for="tipe">EMAIL</label>
					 <input class="form-control" type="text" name="email" id="email" required/>
				 </div>
				 <div class="form-group">
					 <label for="tipe">JABATAN</label>
					<select name="jabatan" class="form-control" id="abatan">
					<?php foreach($jab->result() as $row)
					 {
					 ?>					 
					 <option value="<?PHP echo $row->id_jabatan; ?>"><?PHP echo $row->nama_jabatan; ?></option>
					 <?php 
					 }
					 ?>
					 </select>
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
            <h3 class="panel-title">TAMBAH PEGAWAI</h3>
            </div>
            <div class="pull-right">
           <button class="btn btn-primary btn-sm add" title="tambah" data-toggle="modal" data-target="#modal_mahasiswa"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
		</div>
        <div class="clearfix"></div>
             </div>
             <div class="panel-body">
				
				<table class="table table-responsive ">
            <thead>
            	<tr>
                	<th>ID USER</th>
                    <th>NAMA</th>
                    <th>EMAIL</th>
                    <th>JABATAN</th>
                    <th>MODIFIKASI</th>
                </tr>
               </thead>
               <tbody>
                <?PHP 
					foreach($user->result() AS $row) :
				?>
                <tr>
				<td>
				<?php echo $row->id_user;?>
                <input type="hidden" id="nama_<?php echo $row->id_user;?>" value="<?php echo $row->nama;?>">
                <input type="hidden" id="email_<?php echo $row->id_user;?>" value="<?php echo $row->email;?>"> 
                <input type="hidden" id="jabatan_<?php echo $row->id_user;?>" value="<?php echo $row->nama_jabatan;?>">
                </td>
                <td><?php echo $row->nama;?></td>
                <td><?php echo $row->email;?></td>
                <td><?php echo $row->nama_jabatan;?></td>
                    <td>
						<button class="btn btn-danger btn-sm delete" title="hapus" data-toggle="modal" data-target="#modal_konfirmasi" id="hapus_<?php echo $row->id_user;?>"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
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
			$("#id_user").val('');
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
		$('#id_user').val(id);
		$('#confirm_str').html('Apaka Anda Ingin Menghapus Data Ini')
		});
		
		
		$('#delete').click(function(){
			
			window.location = '<?php echo site_url();?>pegawai/delete/' + $('#id_user').val();;
		});
</script>