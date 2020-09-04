<?php

use Eddy\MadLyricist\GenerateSongCommand;
use Eddy\MadLyricist\SongGenerator;
use Eddy\MadLyricist\StoreSongToTxt;
use Faker\Factory;
use Symfony\Component\Console\Application;
use Symfony\Component\Filesystem\Filesystem;

require 'vendor/autoload.php';

$app = new Application('Song Generator', '1.0.0');

$app->add(new GenerateSongCommand(
    new SongGenerator(Factory::create()),
    new StoreSongToTxt(new Filesystem())
));

$app->setDefaultCommand('gen:song');

$app->run();
