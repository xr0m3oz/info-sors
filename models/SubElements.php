<?php

namespace app\models;


/**
 * SubElement is the model sub element of tree.
 *
 *
 */
class SubElements
{
    protected $name;
    protected $subTree = [];
    protected $counter;

    public function __construct($nodes=5,SubElements $sub=null,CounterNodes $counter)
    {
        $this->counter = $counter;
        $this->createSubTree($nodes);
        if($sub) $this->add($sub);
    }

    public function getHtml(){
        $result = '<li>'.$this->name.'<ul>';

        foreach ($this->subTree as $one){
            if(is_object($one)){
                $result.= $one->getHtml();
            }else{
                $result.= '<li>'.$one.'</li>';
            }
        }

        $result .= '</ul></li>';

        return $result;
    }

    protected function getTree(){
        return $this->subTree;
    }

    protected function add(SubElements $sub){
        $this->subTree[] = $sub;
    }

    protected function createSubTree($nodes){
        if(!is_int($nodes))
            throw new \DomainException('$nodes должно быть целым числом');

        if($nodes <= 0)
            throw new \DomainException('$nodes должно быть 0');

        $i = 1;
        while ($i <= $nodes) {
            if($this->counter->minusNode()){
                $this->subTree[] =
                    '<a data-attr="'.$this->counter->getCurrentNumber().'" data-fancybox data-type="ajax" data-src="/site/load" href="javascript:;">Листок дерева #'.$this->counter->getCurrentNumber().'</a>';
            }
            $i++;
        }

    }
}
