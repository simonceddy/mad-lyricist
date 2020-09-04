<?php
namespace Eddy\MadLyricist;

class SongOptions implements \JsonSerializable, \ArrayAccess
{
    private array $options;

    protected function __construct(array $options)
    {
        $this->options = $options;
    }

    public function toArray()
    {
        return $this->options;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function offsetExists($offset)
    {
        return isset($this->options[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->options[$offset];
    }

    public function offsetSet($offset, $value)
    {
        // Does nothing
    }

    public function offsetUnset($offset)
    {
        // Does nothing
    }

    /**
     * Static factory method that parses options from Symfony/Console
     *
     * @param array $options
     *
     * @return static
     */
    public static function make(array $options)
    {
        // TODO parse options
        // dd($options);
        return new static($options);
    }
}
