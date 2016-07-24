# Sermon Audio API PHP Wrapper for Laravel

This is a simple wrapper for many of the methods available in the Sermon Audio API.

## Installation

```
composer require hoppities\sermon-audio
```

After your composer dependencies finish, you will need to add the service provider to your app.php config file.

```
Hoppities\SermonAudio\SermonAudioServiceProvider::class,
```

The facade is set to automatically load.

Now, you can publish the config file for the package by running:

```
php artisan vendor:publish
```

## Usage

```
use Hoppities\SermonAudio\SermonAudio
```

Then, just call any of the methods in that file.

## License

MIT
