<a href="/lab2">Повернутися назад</a>
<br>
<?php
// Task 1.1
function replaceText($text, $search, $replace)
{
    return str_replace($search, $replace, $text);
}

echo replaceText("Hello World", "World", "PHP") . "<br>";

// Task 1.2
function sortCities($cities)
{
    $cityArray = explode(" ", trim($cities));
    sort($cityArray);
    return implode(" ", $cityArray);
}
echo sortCities("Kyiv Lviv Zhytomyr Dnipro") . "<br>";

// Task 1.3
function getFileName($path)
{
    return pathinfo($path, PATHINFO_FILENAME);
}
echo getFileName("D:\\WebServers\\home\\testsite\\www\\myfile.txt") . "<br>";

// Task 1.4
function dateDifference($date1, $date2)
{
    $d1 = DateTime::createFromFormat('d-m-Y', $date1);
    $d2 = DateTime::createFromFormat('d-m-Y', $date2);

    return abs($d1->diff($d2)->days);
}
echo dateDifference("19-02-2025", "11-05-2025") . "<br>";

// Task 1.5
function generatePassword($length = 10)
{
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[random_int(0, strlen($characters) - 1)];
    }
    return $password;

}
echo generatePassword(8) . "<br>";

function checkPasswordStrength($password)
{
    return preg_match('/[A-Z]/', $password) &&
        preg_match('/[a-z]/', $password) &&
        preg_match('/[0-9]/', $password) &&
        preg_match('/[!@#$%^&*()_+]/', $password) &&
        strlen($password) >= 8;
}

echo checkPasswordStrength("pasSword") ? "Пароль міцний" : "Пароль слабкий";
?>

<?php
// Task 2.1
function findDuplicates($array)
{
    $counts = array_count_values($array);
    return array_keys(array_filter($counts, fn($count) => $count > 1));
}
echo "<br> Дублікати: ";
print_r(findDuplicates([1, 2, 3, 2, 4, 5, 1, 6]));

// Task 2.2
function generatePetName($syllables)
{
    shuffle($syllables);
    return ucfirst(implode('', array_slice($syllables, 0, rand(2, 3))));
}
echo "<br> Генероване ім'я: " . generatePetName(["mi", "ka", "to", "lu", "ro"]);

// Task 2.3
function createArray()
{
    return array_map(fn() => rand(10, 20), range(1, rand(3, 7)));
}
$array1 = createArray();
$array2 = createArray();
$mergedSortedArray = mergeAndSortArrays($array1, $array2);

function mergeAndSortArrays($arr1, $arr2)
{
    return array_values(array_unique(array_merge($arr1, $arr2)));
}
echo "<br> Масиви: ";
print_r($array1);
print_r($array2);
echo "<br> Об'єднаний та відсортований масив: ";
print_r($mergedSortedArray);

// Task 2.4
function sortUsers($users, $byAge = true)
{
    if ($byAge) {
        asort($users);
    } else {
        ksort($users);
    }
    return $users;
}

echo "<br> Відсортовані користувачі: ";
$users = ["John" => 25, "Alice" => 30, "Bob" => 22];
print_r(sortUsers($users, true));
print_r(sortUsers($users, false));
?>