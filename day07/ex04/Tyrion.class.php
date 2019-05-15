<?php
class Tyrion extends Lannister {
    public function letsDoThis($who) {
        if (get_class($who) === "Sansa")
            return "Let's do this." . PHP_EOL;
        else
            return "Not even if I'm drunk !". PHP_EOL;
    }
}
?>