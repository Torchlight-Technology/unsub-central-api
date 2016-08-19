Install with composer

```
composer require torchlighttechnology/unsub-central-api:"~1.0"
```

Usage in your project

```php
use torchlighttechnology\UnsubCentralAPI;

$client = new UnsubCentralAPI(
	'USERNAME',
	'PASSWORD'
);

$email = 'test@test.com';
$aff_key = 'YOUR_AFFILIATE_KEY';
$aff_salt = 'YOUR_AFFILIATE_KEY_SALT';

$client->emailAddressCheck($email, $aff_key, $aff_salt);
```