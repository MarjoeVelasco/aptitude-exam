<?php
function fibonacciSequence($n){
    $num1 = 0;
    $num2 = 1;
    $counter = 0;
    $sequence = array();
    while ($counter < $n){
        $sequence[] = $num1;
        $num3 = $num2 + $num1;
        $num1 = $num2;
        $num2 = $num3;
        $counter = $counter + 1;
    }
    return $sequence;
}

$n = 5;
$results = fibonacciSequence($n);

echo "Input: ".$n."<br>";
echo 'Output: '.implode(' ', $results);
?>
