<?PHP
	$this->load->view('header_v');
?>

<div class="container">

		<?PHP
				foreach($profil->result() as $row) :
			
				?>
    	<div class="panel panel-default">
        <div class="panel-heading">
        	<div class="pull-left">
            <h4>Profil Pegawai</h4>
            </div>
            <div class="pull-right">
             <button class="btn btn-warning btn-default edit" title="ubah" data-toggle="modal" data-target="#modal_profil" id="edit_<?php echo $row->id_user;?>" name="edit_<?php echo $row->id_user;?>"><i class="glyphicon glyphicon-edit"></i> Ubah</button>  
                 <button class="btn btn-danger btn-default edit_pass" title="ubah" data-toggle="modal" data-target="#modal_password"><i class="glyphicon glyphicon-edit"></i> Ubah Username dan Password</button>  
        	</div>
        <div class="clearfix"></div>
        </div>
		<?PHP
		if($this->uri->segment(3)=="error_save")
		{
		?>
        <div class="alert alert-danger alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data Gagal Disimpan
            </div>
        <?php
        }else if($this->uri->segment(3)=="error_pass")
		{
		
		?>
        <div class="alert alert-danger alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Password tidak Cocok
            </div>
        <?php
        }else if($this->uri->segment(3)=="success")
		{
		?>
        <div class="alert alert-success alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data Berhasil Disimpan
            </div>
        <?php
        }
				else if($this->uri->segment(3)=="success_del")
		{
		?>
        <div class="alert alert-success alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data Berhasil Dihapus
            </div>
        <?php
        }
		?>    
        	<div class="panel-body">
            <table class="table table-responsive">
            <head>
            	<tr>
                	<th>ID_USER</th>
					<td><?php echo $row->id_user;?></td>
                	<input type="hidden" id="nama_<?php echo $row->id_user;?>" value="<?php echo $row->nama;?>">
					<input type="hidden" id="email_<?php echo $row->id_user;?>" value="<?php echo $row->email;?>">
                 </tr>
			   	<tr>
                	<th>Nama</th>
					<td><?php echo $row->nama;?></td>
                </tr>
                <tr>
                	<th>Email</th>
					<td><?php echo $row->email;?></td>
                </tr>
             	<tr>
                	<th>Jabatan</th>
					<td><?php echo $row->nama_jabatan;?></td>
                </tr>
               </head>
			   <?php
			   endforeach;
			   ?>
               <body>
               </body>
            </table>
            
         	<div class="modal fade" id="modal_profil">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                     			<h4 class="modal-title">Ubah Data Pegawai</h4>
                                </div>
                                <div class="modal-body">
                    			  <form method="post" id="form_edit" action="<?php echo site_url();?>profil/update">
                                   <div class="form-group">
								   <label>Nama</label>
                                    <input type="text" class="form-control" value="<?php echo $row->nama;?>" name="nama" id="nama" placeholder="Nama" required>  
                                   </div>
                                    <div class="form-group">
                                 	<label>Email</label>
                                    <input type="text" class="form-control" value="<?php echo $row->email;?>" name="email" id="email" placeholder="email" required>  
                                   </div>
                                   </form>
                                </div>
                                <div class="modal-footer">
                                   <button class="btn btn-primary btn-small" type="submit" form="form_edit" id="update">Perbaharui</button>
                                   <button class="btn btn-primary btn-small"data-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </div>
                </div>   
                <div class="modal fade" id="modal_password">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                     			<h4 class="modal-title">Ubah Username dan Password </h4>
                                </div>
                                <div class="modal-body">
                    			   <form method="post" id="form_edit_password" action="<?php echo site_url();?>profil/password" >
                                   <div class="form-group">
                                 	<label>Password Lama</label>
                                    <input type="password" class="form-control" name="pass_lama" id="pass_lama" placeholder="Password Lama" required>  
                                   </div>
                                                                      <div class="form-group">
                                 	<label>Password Baru</label>
                                    <input type="password" class="form-control" name="pass_baru" id="pass_baru" placeholder="Password Baru" required>  
                                   </div>
                                   <div class="form-group">
                                   <label>Konfirmasi Password</label>
                                    <input type="password" class="form-control" name="konf_password" id="konf_password" placeholder="Konfirmasi Password" required>  
                                   </div>
                                   </form>
                                </div>
                                <div class="modal-footer">
                                   <button class="btn btn-primary btn-small" type="submit" form="form_edit_password" id="update">Perbaharui</button>
                                   <button class="btn btn-primary btn-small"data-dismiss="modal">Batal</button>
                                	</div>
                            	</div>
                        	</div>
                		</div>        
                    </div>
 		       </div>
          </div>

<?PHP
	$this->load->view('footer_v');
?>

        