<?php
namespace Eddy\MadLyricist;

class Song
{
    private string $title;

    private array $lyrics;

    public function __construct(array $lyrics, string $title = '')
    {
        $this->title = $title;

        $this->lyrics = $lyrics;
    }

    /**
     * Get the Song title
     */ 
    public function title()
    {
        return $this->title;
    }

    /**
     * Get the song lyrics.
     * 
     * Returns lyrics in an array by default.
     *
     * @param bool $asString If set to true lyrics are returned as string
     *
     * @return array|string
     */
    public function lyrics(bool $asString = false)
    {
        if (!$asString) {
            return $this->lyrics;
        }

        return implode("\n\n", $this->lyrics);
    }

    /**
     * Returns the songs lyrics as a string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->lyrics(true);
    }
}
