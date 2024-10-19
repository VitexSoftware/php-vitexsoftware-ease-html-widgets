# VitexSoftware Ease HTML Widgets

Welcome to the VitexSoftware Ease HTML Widgets project! This repository contains a collection of reusable HTML widgets for PHP applications.

## Table of Contents

- [Introduction](#introduction)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Introduction

VitexSoftware Ease HTML Widgets is a library designed to simplify the creation and management of HTML widgets in PHP applications. It provides a set of pre-built widgets that can be easily integrated into your projects.

## Installation

To install the library, you can use Composer:

```bash
composer require vitexsoftware/ease-html-widgets
```

## Usage

Here is a basic example of how to use one of the widgets:

```php
require '../vendor/autoload.php';

use \VitexSoftware\Ease\Html\Widgets\SandClock();

$widget = new SandClock();
echo $widget;
```

It gives you nice SandClock

![SandClock Widget](sandclock.svg?raw=true)


## Contributing

We welcome contributions! Please read our [contributing guidelines](CONTRIBUTING.md) to get started.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.