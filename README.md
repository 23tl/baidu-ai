<h1 align="center"> baidu-ai </h1>

<p align="center"> 免费强大的百度 AI 处理技术</p>

## Installing

```shell
$ composer require strays/baidu-ai -vvv
```

## Usage

基本使用（以服务端为例）:

```php
<?php

use Strays\BaiDuAi\Factory;

$config = [
    'apiKey' => 'tPOG2OE7ZMrxCCRuOPl91jYB',
    'secretKey' => 'nPe9swbS0iDh30OmAgEnhktmpRtyrWTF',
    'ssl' => false,
];

$app = Factory::language($config);

$result = $app->lexer->send('百度是一个伟大的公司');
```

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/strays/baidu-ai/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/strays/baidu-ai/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT