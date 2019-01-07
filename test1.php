<?php

class Fuckyou {

    function test() {
        
        
        $tags=array(
            new Tag(3),
            new Tag(7),
            new Tag(5),
            new Tag(9)
        );
        
        $flipped=array_flip($orderedids);
        /*
        class Sorter {
            public $flipped;
            function __construct($flipped) {
                $this->flipped=$flipped;
            }
            function fsort($tag1, $tag2) {
                if ($this->flipped[$tag1->id]<$this->flipped[$tag2->id]) return -1;
                else if ($this->flipped[$tag1->id]==$this->flipped[$tag2->id]) return 0;
                else return 1;
            }
        }
        
        $sorter=new Sorter($flipped);
        
        usort($tags, array($sorter, "fsort"));
        */
        function t($flipped){
			return self::t($flipped);
		};
        
        return t($flipped);
    }
	function fsort($tag1, $tag2) {
		if ($this->flipped[$tag1->id]<$this->flipped[$tag2->id]) return -1;
		else if ($this->flipped[$tag1->id]==$this->flipped[$tag2->id]) return 0;
		else return 1;
	}
}

class Tag {
    public $id;
     
    function __construct($id) {
        $this->id=$id;
    }
}

$f=new Fuckyou();

$rtags=$f->test();

foreach ($rtags as $tag) echo $tag->id." ";
