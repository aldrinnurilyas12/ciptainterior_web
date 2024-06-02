<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'protocol' => 'mail', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'mail.kkpubl.my.id', 
    'smtp_port' => 465,
    'smtp_user' => 'ciptainterior@kkpubl.my.id',
    'smtp_pass' => 'ciptainterior',
    'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
    'mailtype' => 'html', //plaintext 'text' mails or 'html'
    'starttls'  => true,
    'newline'   => '\r\n'

);
