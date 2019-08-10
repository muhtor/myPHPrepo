<?php


class Start{

    public function main(){

        $switcher = new Switcher();

        $tefal = new Tefal();
        $radio = new Radio();
        $telev = new Television();

        $switcher->switchON();

        $switcher->addElectorPerson($tefal);
        $switcher->addElectorPerson($radio);
        $switcher->addElectorPerson($telev);


    }

}