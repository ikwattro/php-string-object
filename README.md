## String-Object

PHP String manipulation with objects.

Get it :

```bash
composer require ikwattro/string-object
```


Example :

```php

$code = StringObject::newInstance("Toys - Bicycles and Bikes - 12398")
    ->split("-")
    ->get(2)
    ->trim();`

# 12398
```


```php
$formatted = StringObject::newInstance("Christmas is on 25/12")
    ->toLower()
    ->replace("/","-");

# christmas is on 25-12
```

## Licence

MIT