 <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 /*
 | -------------------------------------------------------------------
 | EMAIL CONFING
 | -------------------------------------------------------------------
 | Configuration of outgoing mail server.
 | */ 
 $config['protocol']='smtp';
 $config['smtp_host']='ssl://smtp.googlemail.com';
 $config['smtp_port']='465';
 $config['smtp_timeout']='30';
 $config['smtp_user']='nallely.ag.sama@gmail.com'; //Remitente. Debe ser un correo de gmail
 $config['smtp_pass']='NALLELY123'; //Contraseña del correo
 $config['charset']='utf-8';
 $config['newline']="\r\n";
 
 /* Location: ./system/application/config/email.php */
 
