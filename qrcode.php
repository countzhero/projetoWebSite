<?php

require 'vendor/autoload.php';

use Endroid\QrCode\QrCode;

$qrcode =
new QrCode(
'http://localhost/flowfit/checkin.php?equipamento=1'
);

header('Content-Type: image/png');

echo $qrcode->writeString();