<?php

// 1. Решение

use App\DTO\Save;

$arguments = new Save();
$modelClassInstance = new ModelClass();

$modelClassInstance->insert($arguments);


class ModelClass
{
    public function insert(Save $arguments)
    {
        $values = $arguments->toArray();
    }
}
