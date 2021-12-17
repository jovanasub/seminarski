<?php

class IspitServis{

    private $broker;

    public function __construct($b){
        $this->broker=$b;
    }

    public function getAll($naziv){
        $q = "select * from ispit";
        if(isset($naziv) && $naziv!=''){
            $q=$q." where naziv like '%".$naziv."%'";
        }
        return $this->broker->ucitajKolekciju($q);
    }

    public function create($ispitDto){
        $this->validate($ispitDto);
        $q = "insert into ispit(naziv,skraceno,espb,semestar) values ('".$ispitDto['naziv'].
            "','".$ispitDto['skraceno']."',".$ispitDto['espb'].",".$ispitDto['semestar'].")";
        $this->broker->izmeni($q);
    }

    public function update($id,$ispitDto){
        $this->validate($ispitDto);
        if(!$id || !intval($id)){
            throw new Exception('Id nije prosledjen');
        }
        $q = "update ispit set naziv='".$ispitDto['naziv'].
            "', skraceno='".$ispitDto['skraceno']."', espb=".$ispitDto['espb'].", semestar=".$ispitDto['semestar']." where id=".$id;
    $this->broker->izmeni($q);
    }

    public function delete($id){
        if(!$id || !intval($id)){
            throw new Exception('Id nije prosledjen');
        }
        $this->broker->izmeni("delete from ispit where id=".$id);
    }

    private function validate($ispit){
        if($ispit['espb']<=0){
            throw new Exception("ESPB mora biti veci od nule");
        }
        if($ispit['semestar']<1 || $ispit['semestar']>8){
            throw new Exception("Semestar nije odgovarajuci");
        }
    }
}


?>