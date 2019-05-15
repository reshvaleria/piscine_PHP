<?php
class NightsWatch {
    public $recruits;
    public function recruit($who) {
        $this->recruits[] = $who;
    }
    public function fight() {
        foreach ($this->recruits as $recr)
            if (method_exists($recr,'fight'))
                $recr->fight();
    }
}
?>