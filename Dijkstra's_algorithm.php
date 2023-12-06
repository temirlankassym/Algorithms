<?php
require "helpers.php";

function shortestPath($input,$k){
    $distTo = [];
    $edges = [];

    for ($i = 0; $i<count($input); $i++){
        $u = $input[$i][0];
        $v = $input[$i][1];
        $weight = $input[$i][2];

        $edges[$u][] = new Edge($u,$v,$weight);

        $distTo[$u] = PHP_INT_MAX;
        $distTo[$v] = PHP_INT_MAX;
    }

    $distTo[$k] = 0;
    $pq = new PriorityQueue();
    $pq->add($k,$distTo[$k]);

    while(!$pq->isEmpty()){
        $v = $pq->poll();
        if(isset($edges[$v])){
            foreach($edges[$v] as $edge){
                $w = $edge->other($v);
                if($distTo[$w] > $distTo[$v] + $edge->weight){
                    $distTo[$w] =  $distTo[$v] + $edge->weight;
                    $pq->remove($w);
                    $pq->add($w,$distTo[$w]);
                }
            }
        }
    }

    ksort($distTo);
    return $distTo;
}

//$input =  [[2,1,1],[2,3,1],[3,4,1]];
$input =  [[0,1,5],[0,7,8],[0,4,9],[1,7,4],[1,3,15],[1,2,12],[7,2,7],[7,5,6],[4,7,5],[4,5,4],[4,6,20],[5,2,1],[5,6,13],[2,6,11],[2,3,3],[3,6,9]];
$k = 0;
$distances = [];
$distances = shortestPath($input,$k);
print_r($distances);