<?php

class SeminarskiServis{

    private $broker;

    public function __construct($b){
        $this->broker=$b;
    }

    public function getAll(){
        $q = "select s.*, i.skraceno from seminarski s inner join ispit i on (i.id = s.ispit)";
        
        return $this->broker->ucitajKolekciju($q);
    }

    public function create($seminarskiDto){
        $this->validate($seminarskiDto);
        $q = "insert into seminarski(naziv,broj_poena,obavezan, opis, ispit) values ('".$seminarskiDto['naziv'].
            "',".$seminarskiDto['broj_poena'].",".($seminarskiDto['obavezan']?1:0).",'".$seminarskiDto['opis']."',".$seminarskiDto['ispit'].")";
        $this->broker->izmeni($q);
    }

    public function update($id,$seminarskiDto){
        $this->validate($seminarskiDto);
        if(!$id || !intval($id)){
            throw new Exception('Id nije prosledjen');
        }
        $q = "update seminarski set naziv='".$seminarskiDto['naziv'].
            "', broj_poena=".$seminarskiDto['broj_poena'].", obavezan=".($seminarskiDto['obavezan']?1:0).", opis='".$seminarskiDto['opis']."', ispit=".$seminarskiDto['ispit']." where id=".$id;
    $this->broker->izmeni($q);
    }

    public function delete($id){
        if(!$id || !intval($id)){
            throw new Exception('Id nije prosledjen');
        }
        $this->broker->izmeni("delete from seminarski where id=".$id);
    }

    private function validate($seminarski){
        if($seminarskiDto['broj_poena']<=0){
            throw new Exception("Broj poena mora biti veci od nule");
        }
    }
}


?>