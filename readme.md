# Mad Lyricist

Mad Lyricist is a small PHP library and CLI app that generates gibberish lyrics using [Faker](https://github.com/fzaninotto/Faker).

## Requirements

- PHP 7.4 or greater
- mbstring extension
- zlib extension (required to use compressed binary releases)

## PHAR Binary

PHAR binaries are [available here](https://github.com/simonceddy/mad-lyricist/releases).

See [requirements](#requirements) above.

## Usage

More complete instructions in the works.

Basic usage is as follows:

```sh
bin/madlyric [options]
```

This will create a text file in the current directory using a generated song title as the filename.

You can use the option flag --display (shortcut -D) to output the generated lyrics directly to the console instead of creating a text file.

```sh
bin/madlyric --display
# or
bin/madlyric -D
```

[See below](#options) for a list of available options.

## Options

Base [Symfony/Console](https://symfony.com/doc/current/components/console.html) options included.

- -T, --title=TITLE - Specify the song title
- -N, --noTitle - Do not generate a title
- -A, --verses=VERSES - Number of verses to generate
- -D, --display - Display the song in console instead of storing to file.
- -C, --choruses - Add choruses between each verse
- -O, --overwrite - Overwrite existing files
- -F, --filename=FILENAME - Store the song using the given filename. Sets --display to false.
- -L, --dir=DIR - Specify a directory to store text files in
- -h, --help - Display this help message
- -q, --quiet - Do not output any message
- -V, --version - Display this application version
- --ansi - Force ANSI output
- --no-ansi - Disable ANSI output
- -n, --no-interaction - Do not ask any interactive question
- -v|vv|vvv, --verbose - Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

You can view the available options from the CLI with the --help option (shortcut -H):

```sh
bin/madlyric --help
# or
bin/madlyric -H
```
