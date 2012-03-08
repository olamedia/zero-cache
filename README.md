Basic usage
===========


```php
$cache = new cachedValue('myCachedBlock', 3600);

if ($cache->start()){

	echo 'BLOCK CONTENT';

	$cache->end();
}
```

LICENSE
=======

MIT


