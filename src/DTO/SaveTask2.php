<?php

declare(strict_types=1);

namespace App\DTO;


class SaveTask2 extends Value implements \Iterator
{
    private int $position = 0;

    public string $name;
    public string|EmailAddress $email;
    public string $address;
    public array $keys = ['name', 'email', 'address'];

    // реализацию методов current, key и т.д. можно вынести в отдельный класс.
    public function current(): mixed
    {
        return $this->get($this->key());
    }

    public function key(): mixed
    {
        // собираем через reflection, причем на этапе конструктора
        return $this->keys[$this->position] ?? null;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        if ($this->position === count($this->keys)) {
            return false;
        }
        return $this->get($this->key()) !== null;
    }
}


abstract class Value
{
    public function get(string $key): mixed
    {
        if ($this->$key instanceof EmailAddress) {
            return $this->$key->get();
        }

        return $this->$key;
    }
}

class EmailAddress implements Scalar
{
    public function __construct(public string $email)
    {
        // можно включить или не включать валидацию
        $this->validate($email);
        $this->email = $email;
    }

    // how to get value from this class?
    public function get(): string
    {
        // сделать возрат данных в необходимом формате
        return $this->email;
    }

    public function validate(string $email): bool
    {
        return true;
    }
}

interface Scalar
{
    public function get(): mixed;
}
