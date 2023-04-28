<?php 

require_once '../../vendor/autoload.php';
use Ramsey\Uuid\Uuid;

$uuid = Uuid::uuid4();

echo $uuid->toString();
?>