<?php
$fooCount = 0;
$barCount = 0;
$fooBarCount = 0;

for ($i = 1; $i <= 50; $i++) {
    if ($i % 3 === 0 && $i % 5 === 0) {
        echo "FooBar ";
        $fooBarCount++;
    } elseif ($i % 3 === 0) {
        echo "Foo ";
        $fooCount++;
    } elseif ($i % 5 === 0) {
        echo "Bar ";
        $barCount++;
    } else {
        echo $i . " ";
    }
}

echo "</br>";
echo "\n";
echo "Jumlah Foo: " . $fooCount . "\n";
echo "Jumlah Bar: " . $barCount . "\n";
echo "Jumlah FooBar: " . $fooBarCount . "\n";
?>
