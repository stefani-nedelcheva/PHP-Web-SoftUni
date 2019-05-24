<?php
if (isset($_GET['input'])) {
    $wordCount = [];

    $input = $_GET['input'];

    // регулярният израз в случая означава да сплитне по всичко различно от дума
    $input = array_filter(preg_split("/[^A-za-z]+/", $input, -1));

    foreach ($input as $item) {
        $item = strtolower($item);
        if (!array_key_exists($item, $wordCount)) {
            $wordCount[$item] = 1;
        } else {
            $wordCount[$item] ++;
        }
    }
    echo "<table border='2'>";
    foreach ($wordCount as $key => $value) {
        echo "<tr><td>$key</td><td>$value</td></tr>";
    }
    echo "</table>";
}
?>


<form>
    <textarea cols="50" name="input"></textarea><br/>
    <input type="submit" value="Count words"/>
</form>