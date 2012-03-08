Basic usage
===========


```php
<?php

$cache = new cachedValue('myValueId', 3600);

if ($cache->start()){

	echo 'BLOCK CONTENT';

	$cache->end();
}
```

Setting driver
==============

```php
<?php

$cache = new cachedValue('myCachedBlock', 3600);

$apcDriver = new apcCache('prefix'); // apc key will be 'prefix'.$id
$fileDriver = new fileCache(__DIR__.'/cache'); // filename will be __DIR__.'/cache/'.$id
$nullDriver = new nullCache(); // it will be created and used by default (does nothing)

cachedValue::setDefaultDriver($fileDriver); // set default driver

$cache->setDriver($apcDriver); // set driver for concrete cachedValue
```


LICENSE
=======

MIT


