<center><strong>Laporan PT BETON Konstruksi Wijaksana</strong></center>
<center>Head Office</center>				
<br>
<left>Subyek            : Daftar Dokumen dan Form</left>
<br>
<left>Department Divisi : Quality Assurance</left>
<br>
<br>
				<table class="table table-responsive table-border" border="1">
            <thead>
            	<tr>
                	<th>ID DOKUMEN</th>
                    <th>NAMA DOKUMEN</th>
                    <th>TANGGAL</th>
                    <th>TIPE</th>
                    <th>KETERANGAN</th>
					<th>REVISI</th>
                    
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
                <td><?php echo $row->nama_dok;?></td>
                <td><?php echo $row->tanggal_upload;?></td>
                <td><?php echo $row->tipe;?></td>
                <td><?php echo $row->keterangan;?></td>
				<td>revisi ke <?php echo $row->revisi;?></td>
                </tr>
                <?PHP 
				endforeach;
				?></tbody>
            </table>

