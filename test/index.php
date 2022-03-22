<?php

require __DIR__ . '/../lib_ext/autoload.php';
use Notification\Email;

$newEmail = new Email(2, 'smtp.terra.com.br', 'leandrodeyoung@terra.com.br', 'SuperDEV@terra*2017', 'tls', '587', 'leandrodeyoung@terra.com.br', 'Leandro Passos');
$newEmail->sendMail("Teste", "<p>E-mail de teste</p>", 'leandrodeyoung@terra.com.br', 'Leandro Passos', 'leandropassosdw@gmail.com', 'Leandro Passos');

var_dump($newEmail);