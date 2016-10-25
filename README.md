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

In your application, call `SermonAudio::Initialize()` to set up your facade.

```
$apiKey = YOUR__KEY_HERE;
$sourceID = YOUR_SOURCE_ID_HERE;

SermonAudio::Initialize($apiKey, $sourceID);
```

## Usage

```
use SermonAudio
```

Then, just call any of the methods in that file.

```
SermonAudio::getSermonsBySource();
```

Parameters should be sent as an associative array to any API call, so the above call will take an associative array and then build the parameters for your query.

## License

MIT
