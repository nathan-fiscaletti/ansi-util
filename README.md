# PHP ANSI Utility
> Allows you to create ANSI strings with ease in PHP.

[![StyleCI](https://styleci.io/repos/187390379/shield?style=flat)](https://styleci.io/repos/187390379)
[![Total Downloads](https://poser.pugx.org/nafisc/ansi-util/downloads?format=flat)](https://packagist.org/packages/nafisc/ansi-util)
[![Latest Stable Version](https://poser.pugx.org/nafisc/ansi-util/v/stable?format=flat)](https://packagist.org/packages/nafisc/ansi-util)
[![Latest Unstable Version](https://poser.pugx.org/nafisc/ansi-util/v/unstable?format=flat)](https://packagist.org/packages/nafisc/ansi-util)
[![License](https://poser.pugx.org/nafisc/spackle/license?format=flat)](https://packagist.org/packages/nafisc/ansi-util)

Java Version: [See here](https://gist.github.com/nathan-fiscaletti/9dc252d30b51df7d710a)

## Usage

> Note: It is not guaranteed that all of these ANSI codes will work on all terminals. See [here](https://misc.flogisoft.com/bash/tip_colors_and_formatting#terminals_compatibility) for a list of compatible terminals.

```php
$stringBuilder = new \Ansi\StringBuilder;

echo $stringBuilder
         ->raw('Hello, ')
         ->underline('John Doe')
         ->resetUnderline()
         ->raw('. ')
         ->raw('This is ')
         ->color16(\Ansi\Color16::FG_RED, 'red')
         ->raw('.')
         .PHP_EOL;
```

![Result](https://i.imgur.com/s4ekU18.png)

### `\Ansi\StringBuilder`

> Note: Each of these functions takes an optional `string` parameter which will be added immediately after the ANSI code is applied. They also all follow the [Fluent Design Pattern](https://en.wikipedia.org/wiki/Fluent_interface). The string builder itself implements the `__toString` magic method, and as such can be treated as a string.

|Method|Result|
|---|---|
|`bold()`|Sets the bold flag.|
|`dim()`|Sets the dim flag.|
|`underline()`|Sets the underline flag.|
|`blink()`|Sets the blink flag.|
|`invertColor()`|Set the invert colors flag.|
|`hide()`|Sets the hidden flag.|
|`reset()`|Resets all colors and flags to default.|
|`resetBold()`|Resets the bold flag.|
|`resetDim()`|Resets the dim flag.|
|`resetUnderline()`|Sets the underline flag.|
|`resetBlink()`|Resets the blink flag.|
|`resetInvertColors()`|Resets the invert colors flag.|
|`resetHidden()`|Resets the hidden flag.|
|`color16(int)`|Sets the current 16-bit foreground or background color. (See `\Ansi\Color16`)|
|`color256(int)`|Sets the current 256-bit color. (See [here](https://misc.flogisoft.com/bash/tip_colors_and_formatting#colors1) for a list of color codes.)|
|`backgroundColor256(int)`|Sets the current 256-bit background color. (See [here](https://misc.flogisoft.com/bash/tip_colors_and_formatting#colors1) for a list of color codes.)|


#### Utility Methods

|Method|Result|
|---|---|
|`raw(string)`|Adds a raw string.|
|`ansi(value)`|Escapes and appends a custom ANSI value.|

### `\Ansi\Color16`

The `Color16` class is a utility class for 16-bit color codes.

> Note: Each of these constants needs to be prefixed with either `FG_` when using it as a foreground color or `BG_` when using it as a background color.

```
RESET
BLACK
RED
GREEN
YELLOW
BLUE
MAGENTA
CYAN
LIGHT_GRAY
DARK_GRAY
LIGHT_RED
LIGHT_GREEN
LIGHT_YELLOW
LIGHT_BLUE
LIGHT_MAGENTA
LIGHT_CYAN
WHITE
```



