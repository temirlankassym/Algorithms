<?php

class PriorityQueue{
    public $pq = [];

    public function poll(){
        $res = "";
        foreach ($this->pq as $key=>$value){
            $res = $key;
            $this->remove($res);
            break;
        }
        return $res;
    }

    public function add($u, $distance){
        $this->pq[$u] = $distance;
        asort($this->pq);
    }

    public function remove($u){
        unset($this->pq[$u]);
    }

    public function isEmpty(){
        return empty($this->pq);
    }
}

class Edge{
    public $v;
    public $w;
    public $weight;

    public function __construct($v,$w,$weight){
        $this->v = $v;
        $this->w = $w;
        $this->weight = $weight;
    }

    public function other($vertex){
        return $this->v==$vertex?$this->w:$this->v;
    }
}