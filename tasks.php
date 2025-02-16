<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\DTO\Save;


// 1. убрать прямое указание переменных в аргументах при этом чтобы метод оставался с перечисленнием переменных
// либо передать прям DTO в параметры метода
$arguments = new Save();

SomeOtherClassInstance->execute($arguments);
// OR
SomeOtherClassInstance->execute(...$arguments);


// -------------------------------------------------------------
// 2. получить поля для запроса в бд или даже готовую комбинацию