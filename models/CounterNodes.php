<?php

namespace app\models;


/**
 * TreeGenerator is the model create tree structure.
 *
 *
 */
class CounterNodes
{
   protected $count;

   public function __construct($countNodes)
   {
       $this->count = $countNodes;
   }

    public function minusNode(){
      $this->count = $this->count - 1;

      return $this->count > 0;
    }

    public function isEnd(){
        return $this->count <= 0;
    }

    public function getCurrentNumber(){
        return $this->count;
    }


}
