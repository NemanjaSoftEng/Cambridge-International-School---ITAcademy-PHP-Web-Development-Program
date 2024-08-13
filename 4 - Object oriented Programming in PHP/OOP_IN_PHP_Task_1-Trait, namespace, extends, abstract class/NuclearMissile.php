<?php

require_once("DataStatus.php");



class NuclearMissile extends DataStatus{
    private $id;
    private $name;
    private $type;
    private $mass;
    private $length;
    private $diameter;
    private $blast_yield;
    private $operational_range;
    private $in_service;
    private $used_by;
    private $designer;
    private $country;
    private $commander_in_chief;
    private $comment;

    public function __construct($id,$name,$type,$mass,$length,$diameter,$blast_yield,$operational_range,$in_service,
    $used_by,$designer,$country,$commander_in_chief,$comment){
        $this->id=$id;
        $this->name=$name;
        $this->type=$type;
        $this->mass=$mass;
        $this->length=$length;
        $this->diameter=$diameter;
        $this->blast_yield=$blast_yield;
        $this->operational_range=$operational_range;
        $this->in_service=$in_service;
        $this->used_by=$used_by;
        $this->designer=$designer;
        $this->country=$country;
        $this->commander_in_chief=$commander_in_chief;
        $this->comment=$comment;
        //---
        $this->time_create=null;
        $this->time_change=null;
        $this->deleted=0;
        //---DataStatus
        $this->time_create=null;
        $this->time_change=null;
        $this->time_deleted=null;
        //---
        $this->database="nuclear_weapons";
        $this->host="localhost";
        $this->user="root";
        $this->password="";
        $this->port="3308";
        //echo "<br>Radi<br>";

    }

    public function toString(){
        echo "<br>--------------- NUCLEAR MISSILE NO $this->id -----------------".
             "<br>------------------ TECHNICAL DATAS ---------------------<br>".
             "<b>Your given ID(it doesn't have to be the same like in database): </b>".$this->id."<br>".
             "<b>Name: </b>".$this->name."<br>".
             "<b>Type: </b>".$this->type."<br>".
             "<b>Mass: </b>".$this->mass."t<br>".
             "<b>Length: </b>".$this->length."m<br>".
             "<b>Diameter: </b>".$this->diameter."m<br>".
             "<b>Blast yield: </b>".$this->blast_yield."<br>".
             "<b>Operational range: </b>".$this->operational_range."<br>".
             "<b>In service: </b>".$this->in_service."<br>".
             "<b>Used by: </b>".$this->used_by."<br>".
             "<b>Designer: </b>".$this->designer."<br>".
             "<b>Country: </b>".$this->country."<br>".
             "<b>Commander in chief: </b>".$this->commander_in_chief."<br>".
             "<b>Comment: </b>"."<p style='border: solid black 3px; text-align:justify; background-color: yellow;'>$this->comment</p>"."<hr>";

    }


    

}

?>