<?php

class Node {
    public $data;
    public $next;
}

$linkList = new Node();
$linkList->next = null;

for ($i=1;$i<10;$i++) {
    $node = new Node();
    $node->data = "aaa{$i}";
    $node->next = $linkList->next;
    $linkList->next = $node;
}

var_dump($linkList);

function ReverseList($pHead){
    $old=$pHead->next;//跳过头结点
    $new=null;
    $tmp=null;
    //反转过程
    while($old!=null){
        $tmp=$old->next;
        $old->next=$new;
        $new=$old;
        $old=$tmp;
    }
    //给新链表加个头结点
    $newHead=new Node();
    $newHead->next=$new;
    var_dump($newHead);
}

ReverseList($linkList);