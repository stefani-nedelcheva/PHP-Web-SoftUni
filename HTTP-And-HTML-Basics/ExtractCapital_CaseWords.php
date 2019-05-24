<?php
if (isset($_GET['text'])) {
    $text = $_GET['text'];

    preg_match_all("/\b[A-Z]+\b/", $_GET['text'], $matches);
    
    //preg_match_all("/[A-Za-z]+/", $_GET['text'], $matches);
   // $matches = array_filter($matches[0], function ($el) {
    //    return strtoupper($el) == $el;
   // });

    echo implode(", ", $matches[0]);
}
?>


<form>
    <textarea rows="10" name="text"></textarea><br/>
    <input type="submit" value="Extract"/>
</form>