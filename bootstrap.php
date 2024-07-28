<?php

declare(strict_types=1);

date_default_timezone_set('Asia/Tashkent');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();