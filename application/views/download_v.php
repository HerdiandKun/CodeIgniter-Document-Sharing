<?PHP
	$this->load->view('header_v');
	
?>
<div class="container" >
		<div class="panel panel-default tabel">
        	<div class="panel-heading">
			
            <h3 class="panel-title">TABEL DOWNLOAD</h3>
           
             </div>
             <div class="panel-body">
				
				<table class="table table-responsive ">
            <thead>
            	<tr>
                	<th>ID DOKUMEN</th>
                    <th>NAMA DOKUMEN</th>
                    <th>PEGAWAI</th>
                    <th>WAKTU</th>
  
                </tr>
               </thead>
               <tbody>
                <?PHP 
					foreach($down->result() AS $row) :
				?>
                <tr>
				<td>
				<?php echo $row->id_dokumen;?>
                </td>
                <td><?php echo $row->nama_dokumen;?></td>
                <td><?php echo $row->nama;?></td>
                <td><?php echo $row->waktu;?></td>
                    
                </tr>
                <?PHP 
				endforeach;
				?></tbody>
            </table>
			
            </div>
			
			
			            	
           </div>


</div> <!-- /container -->

<?PHP
	$this->load->view('footer_v');
?>
