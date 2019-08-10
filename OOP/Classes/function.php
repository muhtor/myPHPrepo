<?php

class City extends Person {
    private $people = [];
    public function getNames(Person $person){
        $this->people = $person;
    }
    public function getPeople(){
        $res = '';
        foreach ($this->people as $person){
            $res .= $this->people = $person;
        }
        var_dump($res);
        return $res;
    }
}
class Person{
    private $name;

    /**
     * @return mixed
     */
    public function getName(){
        return $this->name;
    }

    /**
     * @param mixed $ism
     */
    public function setName($ism){
        $this->name = $ism;
    }
    public function br(){
        echo '<br>';
    }
}

$muhtor = new Person();
$zafar = new Person();
$obid = new Person();

$muhtor->setName('Muhtor');
$zafar->setName('Zafar');
$obid->setName('Obid');

$shahar = new City();

$shahar->setName('Namangan');
$shahar->getNames($muhtor);
$shahar->getNames($zafar);

echo $shahar->getPeople();
