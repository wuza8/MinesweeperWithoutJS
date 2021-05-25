<?php namespace Minesweeper\Game;

class BoardSet{
    public $width = 20;
    public $height = 20;

    public $tile_cover;
    public $tiles; 

    public function __construct( ){
        $this->tile_cover = array(array());
        $this->tiles = array(array());
        for($x=0;$x<$this->width;$x++) {
            for($y=0;$y<$this->height;$y++) {
                $this->tile_cover[$x][$y] = 1;
                $this->tiles[$x][$y] = 0;
            }
        }
    }

    public function loadJSON($json){
        $object = json_decode($json);

        $this->width = $object->width;
        $this->height = $object->height;
        $this->tile_cover = $object->tile_cover;
        $this->tiles = $object->tiles;
    }

    public function isMine($x, $y) : bool{
        return $this->tiles[$x][$y] == 9;
    }

    public function toJSON(){
        $object = array();
        
        $object["width"] = $this->width;
        $object["height"] = $this->height;
        $object["tile_cover"] = $this->tile_cover;
        $object["tiles"] = $this->tiles;

        return json_encode($object);
    }

    public function reveal($x, $y){
        $this->tile_cover[$x][$y] = 0;
    }
}