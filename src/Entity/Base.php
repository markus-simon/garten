<?php

namespace App\Entity;

class Base
{
    /**
     * @param array $data
     */
    public function setData($data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * @return array $data
     */
    public function getData()
    {
        $data = get_object_vars($this);
        return $data;
    }
}