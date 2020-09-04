<?php
namespace Eddy\MadLyricist;

class SongExistsException extends \Exception
{
    public function __construct(
        $message = 'A file with that name already exists!',
        $code = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    public static function forFile(string $filename)
    {
        return new static(
            $filename . ' already exists!'
        );
    }
}
