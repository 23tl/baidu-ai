<h1 align="center"> baidu-ai </h1>

<p align="center"> 免费强大的百度 AI 处理技术</p>

[![Build Status](https://scrutinizer-ci.com/g/23tl/baidu-ai/badges/build.png?b=master)](https://scrutinizer-ci.com/g/23tl/baidu-ai/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/23tl/baidu-ai/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/23tl/baidu-ai/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/23tl/baidu-ai/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![StyleCI](https://github.styleci.io/repos/170268483/shield?branch=master)](https://github.styleci.io/repos/170268483)
[![Latest Stable Version](https://poser.pugx.org/strays/baidu-ai/v/stable)](https://packagist.org/packages/strays/baidu-ai)
[![License](https://poser.pugx.org/strays/baidu-ai/license)](https://packagist.org/packages/strays/baidu-ai)
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
    'apiKey' => 'xxxxxxxxxxxxxxxxxxxxxxxxx',
    'secretKey' => 'xxxxxxxxxxxxxxxxxxxxxxxxx',
    'ssl' => false,
];

$app = Factory::language($config);

$result = $app->lexer->send('百度是一个伟大的公司');
```

### Api

百度自然语言处理：

* `$app->lexer->send()` 词法分析，对应百度AI开放平台中自然语言中 [词法分析](https://cloud.baidu.com/doc/NLP/NLP-API.html#.E8.AF.8D.E6.B3.95.E5.88.86.E6.9E.90.E6.8E.A5.E5.8F.A3) API
* `$app->lexer->custom()` 词法分析(定制版)，对应百度AI开放平台中自然语言中 [词法分析](https://cloud.baidu.com/doc/NLP/NLP-API.html#.E8.AF.8D.E6.B3.95.E5.88.86.E6.9E.90.E6.8E.A5.E5.8F.A3) API
* `$app->depParser->send()` 依存句法分析，对应百度AI开放平台中自然语言中 [依存句法分析](https://cloud.baidu.com/doc/NLP/NLP-API.html#.3C.74.03.A3.2E.F7.7C.9E.E2.FE.C6.95.19.58.08.D9) API
* `$app->wordEmbedding->send()` 词向量表示，对应百度AI开放平台中自然语言中 [词向量表示](https://cloud.baidu.com/doc/NLP/NLP-API.html#.E8.AF.8D.E5.90.91.E9.87.8F.E8.A1.A8.E7.A4.BA.E6.8E.A5.E5.8F.A3) API
* `$app->dnnlm->send()` DNN语言模型，对应百度AI开放平台中自然语言中 [DNN语言模型](https://cloud.baidu.com/doc/NLP/NLP-API.html#DNN.E8.AF.AD.E8.A8.80.E6.A8.A1.E5.9E.8B.E6.8E.A5.E5.8F.A3) API
* `$app->wordSimEmbedding->send()` 词义相似度，对应百度AI开放平台中自然语言中 [词义相似度](https://cloud.baidu.com/doc/NLP/NLP-API.html#.E8.AF.8D.E4.B9.89.E7.9B.B8.E4.BC.BC.E5.BA.A6.E6.8E.A5.E5.8F.A3) API
* `$app->simnet->send()` 短文本相似度，对应百度AI开放平台中自然语言中 [短文本相似度](https://cloud.baidu.com/doc/NLP/NLP-API.html#.9B.EF.6A.4F.BE.F7.B8.EF.B0.CC.A3.4A.62.3B.C5.00) API
* `$app->comment->send()` 评论观点抽取，对应百度AI开放平台中自然语言中 [评论观点抽取](https://cloud.baidu.com/doc/NLP/NLP-API.html#.AA.B9.D3.04.C8.6C.47.E2.34.C9.0B.11.98.A4.6C.66) API
* `$app->sentimentClassify->send()` 情感倾向分析，对应百度AI开放平台中自然语言中 [情感倾向分析](https://cloud.baidu.com/doc/NLP/NLP-API.html#.69.65.EA.9A.5B.DB.98.A4.9F.5D.DF.1F.B8.CD.AC.05) API
* `$app->keyword->send()` 文章标签，对应百度AI开放平台中自然语言中 [文章标签](https://cloud.baidu.com/doc/NLP/NLP-API.html#.E6.96.87.E7.AB.A0.E6.A0.87.E7.AD.BE.E6.8E.A5.E5.8F.A3) API
* `$app->topic->send()` 文章分类，对应百度AI开放平台中自然语言中 [文章分类](https://cloud.baidu.com/doc/NLP/NLP-API.html#.E6.96.87.E7.AB.A0.E5.88.86.E7.B1.BB.E6.8E.A5.E5.8F.A3) API

内容审核：

```php
<?php

use Strays\BaiDuAi\Factory;

$config = [
    'apiKey' => 'xxxxxxxxxxxxxxxxxxxxxxxxx',
    'secretKey' => 'xxxxxxxxxxxxxxxxxxxxxxxxx',
    'ssl' => false,
];

$app = Factory::review($config);

$result = $app->text->send('百度是一个伟大的公司');
```

* `$app->text->send()` 文本审核，对应百度AI开放平台中内容审核中 [文本审核](https://ai.baidu.com/docs#/TextCensoring-API/top) API
* `$app->image->antiPornGif()` Gif 图片审核，对应百度AI开放平台中内容审核中 [Gif 图片审核](https://cloud.baidu.com/doc/ANTIPORN/Antiporn-API.html#GIF.E8.89.B2.E6.83.85.E5.9B.BE.E5.83.8F.E8.AF.86.E5.88.AB) API
* `$app->image->faceAudit()` 用户头像审核，对应百度AI开放平台中内容审核中 [用户头像审核](https://cloud.baidu.com/doc/ANTIPORN/Antiporn-API.html#.E7.94.A8.E6.88.B7.E5.A4.B4.E5.83.8F.E5.AE.A1.E6.A0.B8) API
* `$app->image->imageCensorComb()` 组合服务接口，对应百度AI开放平台中内容审核中 [组合服务接口](https://cloud.baidu.com/doc/ANTIPORN/Antiporn-API.html#.E7.BB.84.E5.90.88.E6.9C.8D.E5.8A.A1.E6.8E.A5.E5.8F.A3) API
* `$app->image->imageCensorUserDefined()` 自定义图像审核，对应百度AI开放平台中内容审核中 [自定义图像审核](https://cloud.baidu.com/doc/ANTIPORN/Antiporn-API.html#.C0.89.BD.09.84.D8.4E.69.2E.C2.E9.77.8A.F6.66.3B) API



## Documentation

[百度开发平台](https://cloud.baidu.com/doc/index.html)

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/strays/baidu-ai/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/strays/baidu-ai/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT