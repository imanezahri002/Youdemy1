<?php
abstract class Cours{
    protected $id;
    protected $titre;
    protected $description;
    protected $type;
    protected $image;
    protected $prix;
    protected $contenu;

    public function __construct($id,$titre,$description,$type,$image,$contenu,$prix){
        $this->id=$id;
        $this->titre=$titre;
        $this->description=$description;
        $this->type=$type;
        $this->image=$image;
        $this->contenu=$contenu;
        $thos->prix=$prix;
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
    public function getImage(){
        return $this->image;
    }
    public function getPrix(){
        return $this->prix;
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
    public function setImage($image){
        $this->image=$image;
    }
    public function setPrix($prix){
        $this->prix=$prix;
    }
    abstract public function display();


    public function add(){
        $sql="INSERT INTO cours (titre,contenu,user_id,description,type,image) VALUES ()";
    }
}
?>