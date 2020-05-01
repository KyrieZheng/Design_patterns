<?php

class Node {
    /**
     * @var Node
     */
    public $next = null;
    public $val;

    public function __construct($val)
    {
        $this->val = $val;
    }

    public function next(Node $val)
    {
        $this->next = $val;
    }
}

class Solution {

    public function addTwoNumbers(Node $l1, Node $l2)
    {
        $pre = new Node(0);

        $cur = $pre;

        $carry = 0;

        while ($l1 != null || $l2 != null) {

            $x = $l1 == null ? 0 : $l1->val;
            $y = $l1 == null ? 0 : $l2->val;

            $sum = $x + $y + $carry;

            $carry = intval($sum / 10);

            $sum = $sum % 10;

            $cur->next = new Node($sum);
            $cur = $cur->next;

            if ($l1 != null) {
                $l1 = $l1->next;
            }

            if ($l2 != null) {
                $l2 = $l2->next;
            }
        }

        if ($carry == 1) {
            $cur->next = new Node($carry);
        }

        return $pre->next;
    }
}

$f1 = new Node(2);
$f1->next(new Node(3));
$f1->next->next(new Node(4));

$f2 = new Node(2);
$f2->next(new Node(8));
$f2->next->next(new Node(4));

$m = new Solution();
$s = $m->addTwoNumbers($f1, $f2);
$r = "";

$ss = $s->next;

while (true) {
    $r .= $s->val;
    $s = $s->next;
    if ($s == null) {
        break;
    }
}

var_dump($r);



