<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\DTO\SaveTask2;


$saveTask = new SaveTask2();
$saveTask->name = 'name';
$saveTask->email = 'email@email.by';
$saveTask->address = 'address';

// можем передать DTO в аргументы метода МОДЕЛИ и там получить данные.
['name' => $name, 'email' => $email, 'address' => $address] = [...$saveTask];
// instance->method(...$saveTask);
var_dump($name, $email, $address);

// ПОЛУЧЕНИЕ ПОЛЕЙ
// на основе нашего talbe делаем декораторы
$insertCommand = new InsertWhere(new InsertFields(new Fields()));

// $model->insert($insertCommand['params'], $insertCommand['where'], ...);
// либо если сделать Fields также иттератором то можно
// $model->insert(...$insertCommand);
