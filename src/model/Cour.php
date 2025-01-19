<?php
class Cours{
    protected $id;
    protected $titre;
    protected $description;
    protected $type;
    
    public function __construct($id,$titre,$description,$type){
        $this->id=$id;
        $this->titre=$titre;
        $this->description=$description;
        $this->type=$type;
    }
    public function getTitre(){
        return $this->titre;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getType(){
        return $this->type;
    }
    public function setTitre($titre){
        $this->titre=$titre;
    }
    public function setDescription($description){
        $this->description=$description;
    }
    public function setType($type){
        $this->type=$type;
    }
    abstract public function display();
    
}
?>