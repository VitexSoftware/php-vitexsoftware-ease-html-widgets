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

### SandClock

```php
require '../vendor/autoload.php';

use \VitexSoftware\Ease\Html\Widgets\SandClock();

$widget = new SandClock();
echo $widget;
```

It gives you nice SandClock

![SandClock Widget](sandclock.svg?raw=true)

### OldTerminal

![Old Terminal](oldterminal.png?raw=true)

### Locale Select

Simple chooser of availble locales

```php
new \Ease\ui\LangSelect()
```

![LocaleSelect](LocaleSelect.png?raw=true "Locale select Widget")

### Live Age

Show live age based on unix timestamp

```php
new \Ease\ui\LiveAge(new DateTime);
```

![LiveAge](LiveAge.png?raw=true "Live Age Widget")

### Browsing History

```php
new BrowsingHistory();
```

![Browsing History](BrowsingHistory.png?raw=true "Browsing History")

### Sticky note

```php
new StickyNote();
```

![Sticky Note](StickyNote.png?raw=true "Sticky Note")

### Selectizer trait

Apply Selectize.js to InputBox or Select

```php
class Selector extends \Ease\Html\SelectTag
{
    use \Ease\Html\Widgets\Selectizer;
}

$properties = [
    'valueField' => 'value',
    'labelField' => 'key',
    'searchField' => ['key', 'value']
];

$options = [
    ['key' => 'red', 'value' => 'Red'],
    ['key' => 'blue', 'value' => 'Blue'],
    ['key' => 'green', 'value' => 'Green'],
    ['key' => 'yellow', 'value' => 'Yellow'],
];

$s = new Selector('selector');
$s->selectize($properties, $options);
```

![Selectizer](https://raw.githubusercontent.com/VitexSoftware/Ease-PHP-Bricks/master/Selectizer.png "Selectizer")

## Contributing

We welcome contributions! Please read our [contributing guidelines](CONTRIBUTING.md) to get started.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

### Debian Packages

To install using Debian packages from `repo.vitexsoftware.com`, follow these steps:

1. Add the repository to your sources list:

```bash
wget -qO- https://repo.vitexsoftware.com/keyring.gpg | sudo tee /etc/apt/trusted.gpg.d/vitexsoftware.gpg
echo "deb [signed-by=/etc/apt/trusted.gpg.d/vitexsoftware.gpg]  https://repo.vitexsoftware.com  $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/vitexsoftware.list
sudo apt update
```

2. Update the package list:

```bash
sudo apt-get update
```

3. Install the package:

```bash
sudo apt-get install php-vitexsoftware-ease-html-widgets
```
