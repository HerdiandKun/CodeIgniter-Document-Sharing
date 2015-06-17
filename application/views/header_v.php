<! DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url();?>assets/img/background.png" rel="shortcut icon" rev="shortcut icon">
        <title>PT BETON</title>
        
        <!-- CSS -->
		<link href="<?PHP echo base_url(); ?>assets/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="<?PHP echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
         <style type="text/css">
		
		.jumbotron
			{
			margin-bottom: 20px;	
			}
        </style>
    </head>
    <body>    
		<nav class="navbar navbar-inverse" style="overflow" role="navigation">
        	<div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?PHP echo base_url();?>">
                         <img src="<?PHP echo base_url(); ?>assets/css/images/bpw_logo.png" alt="BPW" />
						
                    </a>
                	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                    	<span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="menu">
                <ul class="nav navbar-nav">
					<?PHP 
						if($this->session->userdata('id_jabatan') != '')
						{
					?>
                	<li <?PHP 
					if($this->uri->segment(1)=='home') echo ' class="active"'; ?>>
                    	
						<a href="<?PHP echo site_url();?>home"> Beranda </a>
					
                    </li>
                    <?PHP 
						if($this->session->userdata('id_jabatan') == '1')
						{
					?>
					<li <?PHP if($this->uri->segment(1)=='download') echo ' class="active"'; ?>>
                    	<a href="<?PHP echo site_url();?>download"> Tabel Download </a>
                    </li>					
                  	<li <?PHP if($this->uri->segment(1)=='pegawai') echo ' class="active"'; ?>>
                    	<a href="<?PHP echo site_url();?>pegawai"> Pegawai </a>
                    </li>
                   	<li <?PHP if($this->uri->segment(1)=='tipe_dokumen') echo ' class="active"'; ?>>
                    	<a href="<?PHP echo site_url();?>tipe_dokumen"> Distribusi Dokumen </a>
                    </li>
                  	<li <?PHP if($this->uri->segment(1)=='tabel_revisi') echo ' class="active"'; ?>>
                    	<a href="<?PHP echo site_url();?>tabel_revisi"> Tabel Revisi </a>
                    </li>
					<li <?PHP if($this->uri->segment(1)=='jabatan') echo ' class="active"'; ?>>
                    	<a href="<?PHP echo site_url();?>jabatan"> Jabatan </a>
                    </li>
                    <?PHP 
						}
					}						
					?>
                </ul>
                	<ul class="nav navbar-nav  navbar-right">
                    <?PHP 
						if($this->session->userdata('id_jabatan') == '')
						{
					?>
                    	<li>
                        	<a href="<?PHP echo site_url();?>">
                            	<i class="glyphicon glyphicon-log-in"></i> Masuk
                            </a>
                        </li>                    	
                        <?PHP 
						} else{
						?>
                        	<li>
                            	<a href="<?PHP echo site_url();?>profil"><i class="glyphicon glyphicon-user"></i> <?PHP echo $this->session->userdata('nama');?></a>
                            </li>
                            <li>
                            	<a href="<?PHP echo site_url(); ?>login/logout"><i class="glyphicon glyphicon-log-out"></i>Keluar</a>
                            </li>
                        <?PHP 
						}
						?>
                    </ul>
                </div>
            </div>
        </nav>
        
        </div>
        