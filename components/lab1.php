<!-- Task 2 -->
<div>
    <pre>
Полину в мріях в купель океану,
Відчую <b>шовковистість</b> глибини,
 Чарівні мушлі з дна собі дістану,
    Щоб <b>взимку</b>
        <u>тішили</u>
            мене
                вони…
    </pre>
</div>

<!-- Task 3 -->
<?php
$usdt = 41.8;
$uah = 1500;
$result = $uah / $usdt;
$roundedResult = round($result, 2);

echo "<div>$uah грн. можна обміняти на $roundedResult долар</div>";
?>

<!-- Task 4 -->
<?php
$mouth = 2;
$text = "Пора року: ";

if ($mouth == 12 || $mouth == 1 || $mouth == 2) {
    echo $text . "Зима";
} elseif ($mouth == 3 || $mouth == 4 || $mouth == 5) {
    echo $text . "Весна";
} elseif ($mouth == 6 || $mouth == 7 || $mouth == 8) {
    echo $text . "Літо";
} elseif ($mouth == 9 || $mouth == 10 || $mouth == 11) {
    echo $text . "Осінь";
} else {
    echo "<div>Немає такого місяця</div>";
}
?>

<!-- Task 5 -->
<?php
$letter = "ї";
$vowels = ['а', 'е', 'є', 'и', 'і', 'ї', 'о', 'у', 'ю', 'я'];

switch (true) {
    case in_array($letter, $vowels):
        echo "<div>Голосна літера</div>";
        break;

    case ctype_alpha($letter):
        echo "<div>Приголосна літера</div>";
        break;

    default:
        echo "<div>Немає такої літери</div>";
        break;
}

?>

<!-- Task 6 -->
<?php
$number = mt_rand(100, 999);

function getSumNumbers($number)
{
    $sum = 0;
    $arr = str_split($number);

    foreach ($arr as $value) {
        $sum += $value;
    }

    return $sum;
}

function getReverseNumber($number)
{
    return strrev($number);
}

function getBigNumber($number)
{
    $arr = str_split($number);
    rsort($arr);

    return implode($arr);
}

echo "<div>Сума цифр числа $number: " . getSumNumbers($number) . "</div>";
echo "<div>Число $number наоборот: " . getReverseNumber($number) . "</div>";
echo "<div>Найбільше число з цифр числа $number: " . getBigNumber($number) . "</div>";
?>

<!-- Task 7 -->
<?php

function createTable($rows, $cols)
{
    echo "<table border='1' style='border-collapse: collapse;'>";

    for ($i = 1; $i <= $rows; $i++) {
        echo "<tr>";

        for ($j = 1; $j <= $cols; $j++) {
            $color = "rgb(" . mt_rand(0, 255) . "," . mt_rand(0, 255) . "," . mt_rand(0, 255) . ")";
            echo "<td style='background-color: $color; width: 50px; height: 50px;'></td>";
        }

        echo "</tr>";
    }

    echo "</table>";
}

createTable(5, 5);
?>

<!-- Task 7.2 -->
<?php
function createRandomSquares($n)
{
    for ($i = 0; $i < $n; $i++) {
        $size = rand(20, 100);
        $posX = rand(0, 100);
        $posY = rand(0, 100);

        echo "<div class='square' style='width: {$size}px; height: {$size}px; left: {$posX}%; top: {$posY}%;'></div>";
    }
}

createRandomSquares(10);
?>