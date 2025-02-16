<?php

declare(strict_types=1);


// ПОЛУЧЕНИЕ ПРИМИТИВНЫХ ЗНАЧЕНИЙ ИЗ КЛАССА
// 1-ый вариант превратить DTO в itterable /** implements Iterator */
class SaveTask1
{
    public string $name;
    public string|EmailAddress $email;

    public string $address;


    // 1. вариант
    public function toArray(): array
    {
        // validate можно вызывать и на этом этапе
        // через Reflection читать свойства и их типы. собирать значения в массив
        // или прочитать свойство и проверить его через instanceof

    }

    // альтернативно 
    // через магический метод __invoke
    // через магический метод __desctruct , т.е. мы можем получать экз. обьекта из контейнера, 
    // клонировать(кстати на клонирование можно повесить как раз получение скалярных данных)

    // но это все только часть проблемы, вторая часть, это получить поля для запроса в БД. 
}

class EmailAddress implements Scalar
{
    private string $email;

    public function __construct(public string $email)
    {
        $this->validate($mail);
        $this->email = $mail;
    }

    // how to get value from this class?
    public function get(): string {}
}

interface Scalar
{
    public function get(): mixed;
}
