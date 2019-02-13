<?php

namespace app\models;


/**
 * TreeGenerator is the model create tree structure.
 *
 *
 */
class TreeGenerator
{
    protected $tree = [];

    public function generate($countNodes){
        $counter = new CounterNodes($countNodes);

        while (!$counter->isEnd()) {
            $firstSub = new SubElements(rand(1,5),null,$counter);

            $branch = 3;
            $this->recursive($firstSub,$counter,$branch);
        }

        return $this->tree;
    }

    protected function recursive(SubElements $sub,$counter,$branch){
        $subNew =  new SubElements(rand(1,5),$sub,$counter);
        $branch = $branch - 1;

        if($branch > 0)
            $this->recursive($subNew,$counter,$branch);
        else{
            $this->addSubElements($subNew);
        }
    }

    protected function addSubElements(SubElements $element){
        $this->tree[] = $element;
    }
}
