<?php 

$env = parse_ini_file('.env');

return [
    'host' => $env['HOST'],
    'dbname' => $env['DB'],
    'user'=> $env['USER'],
    'password' => $env['PASSWORD']
];