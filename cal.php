<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["display"])) {
    $expression = $_POST["display"];
    $result = '';

    
    if (!empty($expression) && preg_match('/^[\d\.\+\-\*\/\% ]+$/', $expression)) {
        @eval('$result = ' . $expression . ';');
    } else {
        $result = 'Invalid input';
    }


    echo "<p>Result: $result</p>";
}
?>