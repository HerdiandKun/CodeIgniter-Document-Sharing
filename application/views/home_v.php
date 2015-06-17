<?PHP
	$this->load->view('header_v');
	
?>
<div class="container" >
<?php if($this->session->userdata('id_jabatan')=='1')
{
?>
<center>
<div class="panel panel-default" style="width:350px;">
        	<div class="panel-heading">
            	<h3 class="panel-title"><i class="glyphicon glyphicon-upload"></i> UPLOAD FILE</h3>
             </div>
			<div class="panel-body">
			<?php if($this->uri->segment(3)=="success")
		{
		?>
        <div class="alert alert-success alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data Berhasil diupload
            </div>
        <?php
        } else if($this->uri->segment(3)=="error")
		{
		?>
        <div class="alert alert-danger alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            ID Dokumen sudah digunakan
            </div>
        <?php
        } 
		?>
			<form method="post" id="form_upload" enctype="multipart/form-data" role="form" action="<?php echo site_url(); ?>home/upload">
				 <div class="form-group">
					 <label for="tipe">ID Dokumen</label>
					 <input class="form-control" type="text" name="id_dok" id="id_dok" required/>
				 </div>   
					 <div class="form-group">
					 <label for="file">Upload Dokumen</label>
					 <input class="form-control" type="file" name="file" id="file" required/>  
				 </div>
				 <div class="form-group">
					 <label for="tipe">Tipe Dokumen</label>
					 <select name="tipe" class="form-control" id="tipe">
					<?php foreach($id_dok->result() as $row)
					 {
					 ?>					 
					 <option value="<?PHP echo $row->id_tipe; ?>"><?PHP echo $row->id_tipe; ?> - <?PHP echo $row->tipe; ?></option>
					 <?php 
					 }
					 ?>
					 </select>
				</div>
				<div class="form-group">
					 <label for="revisi">Revisi</label>
					 <select name="revisi" class="form-control" id="revisi">
					<?php for($i=0;$i<=6;$i++)
					 {
					 ?>					 
					 <option value="<?PHP echo $i ?>"><?PHP echo $i ?></option>
					 <?php 
					 }
					 ?>
					 </select>
				</div>
				<div class="form-group">
					 <label for="keterangan">Keterangan</label>
					 <textarea name="keterangan" class="form-control" id="keterangan"></textarea>
				</div>
			</form>
            
            </div>
				<div class="panel-footer">
                	<button type="submit" class="btn btn-primary btn-block" form="form_upload">
                    <i class="glyphicon glyphicon-upload"></i> Upload
                    </button>
                </div>
           </div>
		   </center>
<?php
}
if($this->session->userdata('id_jabatan')!='')
{
?>
<div class="panel panel-default">
        	<div class="panel-heading">
			<div class="pull-left">
            <h3 class="panel-title">DOKUMEN</h3>
            </div>
           
        <div class="clearfix"></div>
             </div>
             <div class="panel-body">
				
				<table class="table table-responsive">
            <thead>
            	<tr>
                	<th>ID DOKUMEN</th>
                    <th>NAMA DOKUMEN</th>
                    <th>TANGGAL</th>
                    <th>TIPE</th>
					<th>REVISI</th>
                    <th>DOWNLOAD</th>
                </tr>
               </thead>
               <tbody>
                <?PHP 
					foreach($dok->result() AS $row) :
				?>
                <tr>
				<td>
				<?php echo $row->id_dok;?>
				</td>
                <td width="20%"><?php echo $row->nama_dok;?></td>
                <td><?php echo $row->tanggal_upload;?></td>
                <td><?php echo $row->tipe;?></td>
				<td>revisi ke <?php echo $row->revisi;?></td>
                    <td>
						<a href="<?php echo site_url();?>home/download?nama=<?php echo $row->nama_dok;?>&id=<?php echo $row->id_dok;?>"><button class="btn btn-primary btn-sm" title="hapus" data-toggle="modal" data-target="#modal_konfirmasi" id="hapus_<?php echo $row->id_dok;?>"><i class="glyphicon glyphicon-download"></i> Download</button>
                    </td>
                </tr>
                <?PHP 
				endforeach;
				?></tbody>
            </table>
			
            </div>    	
           </div>
<?php
}
?>

</div> <!-- /container -->

<?PHP
	$this->load->view('footer_v');
?>