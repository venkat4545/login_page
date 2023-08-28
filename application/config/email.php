<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol']    = 'smtp';
$config['smtp_host']    = 'ssl://smtp.gmail.com';
$config['smtp_port']    = '465';
// $config['smtp_timeout'] = '7';
$config['smtp_user']    = 'info@instantventures.com';
$config['smtp_pass']    = 'Default@2023';
// $config['smtp_crypto']  = 'tls';
$config['charset']    = 'utf-8';
$config['newline']    = "\r\n";
$config['mailtype'] = 'html'; // or html
$config['validation'] = TRUE; // bool whether to validate email or not 