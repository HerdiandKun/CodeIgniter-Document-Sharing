<?PHP
	$this->load->view('header_v');
?>
<div class="container" >
<div class="panel panel-default">
        	<div class="panel-heading">
            	<h3 class="panel-title">HAK AKSES</h3>
             </div>
			 
             <div class="panel-body">
				 <div class="form-group">
					 
					 <?php foreach($hak->result() as $row)
					 {
					 ?>		
					 <div class="col-md-4">
						
						  <span><?php echo $row->nama_jabatan; ?></span>
						
					 </div>
					 <?php
					 }
					 ?>
				</div>		
            	
           </div>
		   
		   </div>
		   
	

</div> <!-- /container -->
<?PHP
$this->load->view('footer_v');
?>