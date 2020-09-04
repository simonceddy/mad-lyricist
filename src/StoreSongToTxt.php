<?php

namespace Eddy\MadLyricist;

use Symfony\Component\Filesystem\Filesystem;

class StoreSongToTxt
{
    private Filesystem $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function filesystem()
    {
        return $this->filesystem;
    }

    public function store(
        Song $song,
        string $dir = null,
        string $filename = null,
        bool $overwrite = false
    ) {
        isset($dir) ?: $dir = getcwd();
        $fn = $dir . DIRECTORY_SEPARATOR . ($filename ?: $song->title()) . '.txt';

        if (file_exists($fn) && !$overwrite) {
            throw SongExistsException::forFile($fn);
        }

        $text = (string) $song;

        $this->filesystem->dumpFile($fn, $text);
    }


}
