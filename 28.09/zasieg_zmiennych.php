<?php

$variable = 'aaaa';

echo $variable . "<br />";

$variable = 'bbbb';

echo $variable . "<br />";

function a() {
    $variable = 'cccc';
}

a();

echo $variable . "<br />";

function b() {
    global $variable;

    $variable = 'dddd';
}

b();

echo $variable . '<br />';

function c() {
    global $new;

    $new = 'new';

}

c();

global $new;

echo $new . '<br />';

include './other.php';

global $otherVariable;

d();

$a = 5;

echo $a . "<br />";

function e($a);

echo $a . "<br />";

function f(&$a) {
    $a = 10;
}

f(&:$a);
