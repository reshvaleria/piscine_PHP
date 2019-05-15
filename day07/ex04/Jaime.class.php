<?php
class Jaime extends Lannister {
    public function letsDoThis($who) {
        if (get_class($who) === "Sansa")
            return "Let's do this." . PHP_EOL;
        elseif (get_class($who) === "Cersei")
            return "With pleasure, but only in a tower in Winterfell, then." . PHP_EOL;
        else
            return "Not even if I'm drunk !". PHP_EOL;
    }
}
?>