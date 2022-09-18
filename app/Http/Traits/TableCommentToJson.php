<?php

namespace App\Http\Traits;

/**
 * @property string $at_list
 * @property string $at_edit
 * @property string $at_insert
 * @property string $description
 */
trait TableCommentToJson
{
    private array $properties;

    public function __set(string $name, string $value)
    {
        $this->properties[$name] = $value;
    }

    public function getComment(): string
    {
        return json_encode($this->properties, JSON_NUMERIC_CHECK);
    }
}
