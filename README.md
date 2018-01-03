# Goutte PhantomJs Bridge
use Goutte using PhantomJs client

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ByTIC/goutte-phantomjs-bridge.svg?style=flat-square)](https://packagist.org/packages/ByTIC/goutte-phantomjs-bridge)
[![Latest Stable Version](https://poser.pugx.org/ByTIC/goutte-phantomjs-bridge/v/stable)](https://packagist.org/packages/ByTIC/goutte-phantomjs-bridge)
[![Latest Unstable Version](https://poser.pugx.org/ByTIC/goutte-phantomjs-bridge/v/unstable)](https://packagist.org/packages/ByTIC/goutte-phantomjs-bridge)

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://img.shields.io/travis/ByTIC/goutte-phantomjs-bridge/master.svg?style=flat-square)](https://travis-ci.org/ByTIC/goutte-phantomjs-bridge)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/f8016d1b-b3df-4a00-8978-eed53709e13f/mini.png)](https://insight.sensiolabs.com/projects/f8016d1b-b3df-4a00-8978-eed53709e13f)
[![Quality Score](https://img.shields.io/scrutinizer/g/ByTIC/goutte-phantomjs-bridge.svg?style=flat-square)](https://scrutinizer-ci.com/g/ByTIC/goutte-phantomjs-bridge)
[![StyleCI](https://styleci.io/repos/116179375/shield?branch=master)](https://styleci.io/repos/116179375)
[![Total Downloads](https://img.shields.io/packagist/dt/ByTIC/goutte-phantomjs-bridge.svg?style=flat-square)](https://packagist.org/packages/ByTIC/goutte-phantomjs-bridge)


## Installation
It is recommended that you use Composer to install PHP PhantomJS. 
First, add the following to your project’s composer.json file:
``` composer.json
#composer.json

"scripts": {
    "post-install-cmd": [
      "ByTIC\\GouttePhantomJs\\Composer\\PhantomInstaller::installPhantomJS"
    ],
    "post-update-cmd": [
      "ByTIC\\GouttePhantomJs\\Composer\\PhantomInstaller::installPhantomJS"
    ]
}
```

Finally, install the library from the root of your project:
``` bash
$ composer require bytic/goutte-phantomjs-bridge
```

## Changelog