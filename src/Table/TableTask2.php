<?php

declare(strict_types=1);

use App\DTO\SaveTask2;

class TableTask2 /*extends Table*/
{
    public  const FIELD_NAME = 'name';
    public  const FIELD_EMAIL = 'email';
    public  const FIELD_ADDRESS = 'address';

    // понятно что этот метод будет уже как в Table рабоатать через Reflection и реализован в Table
    public function getFields(): array
    {
        return [
            $this::FIELD_NAME,
            $this::FIELD_EMAIL,
            $this::FIELD_ADDRESS
        ];
    }
}

class Fields
{
    public function getFieldsForReqest(): array
    {
        return ['params' => [], 'where' => 'string', 'fields' => [], 'order' => "string"];
    }
}


class InsertWhere extends Fields
{
    public function __construct(public Fields $fields,) {}

    public function getFieldsForReqest(): array
    {
        // насамом деле получаем через контейнер или аргументы
        $table = new TableTask2();
        $dto = new SaveTask2();
        return [
            ...$this->fields->getFieldsForReqest($table),
            'where' => implode(',', [
                sprintf('%s = :%s', $table::FIELD_NAME, $table::FIELD_NAME),
                sprintf('%s = :%s', $table::FIELD_EMAIL, $table::FIELD_EMAIL)
            ])
        ];
    }
}

class InsertFields extends Fields
{
    public function __construct(public Fields $fields) {}
    public function getFieldsForReqest(): array
    {
        // насамом деле получаем через контейнер или аргументы
        $table = new TableTask2();
        $dto = new SaveTask2();
        return [
            ...$this->fields->getFieldsForReqest($this->table),
            'fields' => $this->table->getFields(),
        ];
    }
}
