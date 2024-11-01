<?php
session_start();
require 'config.php';
require_once 'src/dao/LeadsDaoMySql.php';

$leadsDao = new LeadsDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id');

$leadsDao->check($id);

header("Location: listar_leads.php");
exit;

