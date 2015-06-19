<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
/* 
| ------------------------------------------------------------------- 
| EMAIL CONFIG 
| ------------------------------------------------------------------- 
| Konfigurasi email keluar melalui mail server
| */  
$config['protocol']='smtp';  //tipe protocol
$config['smtp_host']='ssl://smtp.googlemail.com';  //ini host google. kalo pake yang lain ya ganti
$config['smtp_port']='465';  //port nya juga ganti
$config['smtp_timeout']='30';  
$config['smtp_user']='xxxxxxx@gmail.com';  //alamat email pengirim
$config['smtp_pass']='xxxxxxxxx';  //passwordnya
$config['charset']='utf-8';  
$config['newline']="\r\n";  
   
/* End of file email.php */ 
/* Location: ./system/application/config/email.php */
