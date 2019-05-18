<?php

namespace Ansi;

/**
 * Class used to handle string formatting using Ansi.
 */
class StringBuilder
{
    /**
     * The current string.
     *
     * @var string
     */
    private $string;

    /**
     * Set the bold flag.
     *
     * @param string $value
     *
     * @return \Ansi\StringBuilder
     */
    public function bold($value = '')
    {
        $this->ansi(1);
        $this->raw($value);

        return $this;
    }

    /**
     * Set the dim flag.
     *
     * @param string $value
     *
     * @return \Ansi\StringBuilder
     */
    public function dim($value = '')
    {
        $this->ansi(2);
        $this->raw($value);

        return $this;
    }

    /**
     * Set the underline flag.
     *
     * @param string $value
     *
     * @return \Ansi\StringBuilder
     */
    public function underline($value = '')
    {
        $this->ansi(4);
        $this->raw($value);

        return $this;
    }

    /**
     * Set the blink flag.
     *
     * @param string $value
     *
     * @return \Ansi\StringBuilder
     */
    public function blink($value = '')
    {
        $this->ansi(5);
        $this->raw($value);

        return $this;
    }

    /**
     * Invert the current colors.
     *
     * @param string $value
     *
     * @return \Ansi\StringBuilder
     */
    public function invertColor($value = '')
    {
        $this->ansi(7);
        $this->raw($value);

        return $this;
    }

    /**
     * Set the hide flag.
     *
     * @param string $value
     *
     * @return \Ansi\StringBuilder
     */
    public function hide($value = '')
    {
        $this->ansi(8);
        $this->raw($value);

        return $this;
    }

    /**
     * Reset to default.
     *
     * @param string $value
     *
     * @return \Ansi\StringBuilder
     */
    public function reset($value = '')
    {
        $this->ansi(0);
        $this->raw($value);

        return $this;
    }

    /**
     * Reset the bold flag.
     *
     * @param string $value
     *
     * @return \Ansi\StringBuilder
     */
    public function resetBold($value = '')
    {
        $this->ansi(21);
        $this->raw($value);

        return $this;
    }

    /**
     * Reset the dim flag.
     *
     * @param string $value
     *
     * @return \Ansi\StringBuilder
     */
    public function resetDim($value = '')
    {
        $this->ansi(22);
        $this->raw($value);

        return $this;
    }

    /**
     * Reset the underline flag.
     *
     * @param string $value
     *
     * @return \Ansi\StringBuilder
     */
    public function resetUnderline($value = '')
    {
        $this->ansi(24);
        $this->raw($value);

        return $this;
    }

    /**
     * Reset the blank flag.
     *
     * @param string $value
     *
     * @return \Ansi\StringBuilder
     */
    public function resetBlink($value = '')
    {
        $this->ansi(25);
        $this->raw($value);

        return $this;
    }

    /**
     * Reset the invert colors flag.
     *
     * @param string $value
     *
     * @return \Ansi\StringBuilder
     */
    public function resetInvertColors($value = '')
    {
        $this->ansi(27);
        $this->raw($value);

        return $this;
    }

    /**
     * Reset the hidden flag.
     *
     * @param string $value
     *
     * @return \Ansi\StringBuilder
     */
    public function resetHidden($value = '')
    {
        $this->ansi(28);
        $this->raw($value);

        return $this;
    }

    /**
     * Set a 16-bit color.
     *
     * @param string $value
     *
     * @return \Ansi\StringBuilder
     */
    public function color16(int $color, $value = '')
    {
        $this->ansi($color);
        $this->raw($value);

        return $this;
    }

    /**
     * Set a 256-bit foreground color.
     *
     * @param string $value
     *
     * @return \Ansi\StringBuilder
     */
    public function color256(int $color, $value = '')
    {
        if ($color < 0 || $color > 256) {
            throw new \Exception('Valid 256-bit colors must be within the range of 0 and 256.');
        }
        $this->ansi("38;5;${color}");
        $this->raw($value);

        return $this;
    }

    /**
     * Set a 256-bit background color.
     *
     * @param string $value
     *
     * @return \Ansi\StringBuilder
     */
    public function backgroundColor256(int $color, $value = '')
    {
        if ($color < 0 || $color > 256) {
            throw new \Exception('Valid 256-bit colors must be within the range of 0 and 256.');
        }
        $this->ansi("48;5;${color}");
        $this->raw($value);

        return $this;
    }

    /**
     * Add a raw string using the current format.
     *
     * @param string $value
     *
     * @return \Ansi\StringBuilder
     */
    public function raw($value)
    {
        $this->string .= $value;

        return $this;
    }

    /**
     * Add a custom ANSI flag.
     *
     * @param string $value
     *
     * @return \Ansi\StringBuilder
     */
    public function ansi($value)
    {
        $this->string .= "\033[${value}m";

        return $this;
    }

    /**
     * Build the final string.
     *
     * @param string $value
     *
     * @return \Ansi\StringBuilder
     */
    public function __toString()
    {
        $this->reset();

        return $this->string;
    }
}
