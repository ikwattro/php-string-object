<?php

namespace Ikwattro\String;

class StringObject
{
    /**
     * @var string
     */
    protected $string;

    /**
     * @param string $string
     */
    public function __construct($string)
    {
        if (!is_string($string)) {
            throw new \InvalidArgumentException('Expected string');
        }

        $this->string = $string;
    }

    /**
     * @param string $string
     * @return StringObject
     */
    public static function newInstance($string)
    {
        return new self($string);
    }

    /**
     * @return StringObject
     */
    public function trim()
    {
        $this->string = trim($this->string);

        return $this;
    }

    /**
     * @return StringObject
     */
    public function toUpper()
    {
        $this->string = strtoupper($this->string);

        return $this;
    }

    /**
     * @return StringObject
     */
    public function toLower()
    {
        $this->string = strtolower($this->string);

        return $this;
    }

    /**
     * @return int
     */
    public function length()
    {
        return strlen($this->string);
    }

    /**
     * @param string $needle
     * @param string $haystack
     * @return $this
     */
    public function replace($needle, $haystack)
    {
        $this->string = str_replace($needle, $haystack, $this->string);

        return $this;
    }

    public function split($pattern)
    {
        return new StringArray(explode($pattern, $this->string));
    }

    public function append($string)
    {
        $this->string = $this->string.(string) $string;
    }

    /**
     * @return string
     */
    public function value()
    {
        return $this->string;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->string;
    }

    private function checkStringOrObject($v)
    {
        if (!is_string($v) && !$v instanceof StringObject) {
            throw new \InvalidArgumentException('Expected string or StringObject');
        }
    }

}