<?php
class Color {
    public $red;
    public $green;
    public $blue;
    static $verbose = False;

    function __construct($arr) {
        if (isset($arr['red']) && isset($arr['green']) && isset($arr['blue'])) {
            $this->red = intval($arr['red']);
            $this->green = intval($arr['green']);
            $this->blue = intval($arr['blue']);
        } elseif (isset($arr['rgb'])) {
            $rgb = intval($arr['rgb']);
            $this->red = $rgb & 255;
            $this->green = ($rgb >> 8) & 255;
            $this->blue = ($rgb >> 16) & 255;
        }
    }

    function __toString() {
        return "Color( red: {$this->red}, green: {$this->green}, blue: {$this->blue} ) "
            .((self::$verbose) ? "constructed." : "destructed.");
    }

    static function doc() {
        $file = fopen("Color.doc.txt", 'r');
        while (true) {
            if (feof($file)) {
                fclose($file);
                print PHP_EOL;
                break ;
            }
            print (fgets($file));
        }
    }

    function add($addClass) {
        return new Color (array('red' => ($this->red + $addClass->red), 'green' => ($this->green + $addClass->green), 'blue' => ($this->blue + $addClass->blue)));
    }
    function sub($addClass) {
        return new Color (array('red' => ($this->red - $addClass->red), 'green' => ($this->green - $addClass->green), 'blue' => ($this->blue - $addClass->blue)));
    }
    function mult($addClass) {
        return new Color (array('red' => ($this->red * $addClass->red), 'green' => ($this->green * $addClass->green), 'blue' => ($this->blue * $addClass->blue)));
    }
}
?>