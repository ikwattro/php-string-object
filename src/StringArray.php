<?php

namespace Ikwattro\String;

class StringArray implements \ArrayAccess
{
    /**
     * @var StringObject[]
     */
    protected $values;

    /**
     * @param array $values
     */
    public function __construct(array $values)
    {
        $this->values = [];
        foreach ($values as $value) {
            $this->add($value);
        }
    }

    /**
     * @param int $position
     * @return StringObject
     */
    public function get($position)
    {
        return $this->values[$position];
    }

    /**
     * @param string $value
     */
    public function add($value)
    {
        if (!is_string($value)) {
            throw new \InvalidArgumentException(sprintf('Expected string'));
        }
        $this->values[] = StringObject::newInstance($value);
    }

    /**
     * @return int
     */
    public function size()
    {
        return count($this->values);
    }

    public function contains($value)
    {
        if (!is_string($value) && !$value instanceof StringObject) {
            throw new \InvalidArgumentException('Expected a string or an instance of StringObject');
        }

        foreach ($this->values as $v) {
            if ($value instanceof StringObject && $value->value() === $v->value()) {
                return true;
            } else {
                if ($value === $v->value()) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @return StringObject|null
     */
    public function first()
    {
        if ($this->size() > 0) {
            return array_values($this->values)[0];
        }

        return null;
    }

    /**
     * @return StringObject|null
     */
    public function last()
    {
        if ($this->size() > 0) {
            return array_values($this->values)[$this->size()-1];
        }

        return null;
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->values);
    }

    /**
     * @param mixed $offset
     * @return stringObject
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * @param mixed $offset
     * @param string $value
     */
    public function offsetSet($offset, $value)
    {
        $this->values[$offset] = StringObject::newInstance($value);
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->values[$offset]);
    }

}