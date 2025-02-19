<?php
function my_sin($x)
{
    return sin($x);
}

function my_cos($x)
{
    return cos($x);
}

function my_tg($x)
{
    return tan($x);
}

function my_custom_tg($x)
{
    return (cos($x) != 0) ? sin($x) / cos($x) : "Неможливо обчислити (cos(x) = 0)";
}

function xy($x, $y)
{
    return pow($x, $y);
}

function factorial($x)
{
    if ($x < 0)
        return "Факторіал від'ємного числа не існує";
    return ($x == 0) ? 1 : $x * factorial($x - 1);
}
?>