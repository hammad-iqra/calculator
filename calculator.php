<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        width: 100%;
        display: flex;
        align-items: center;
        background-color: white;
        justify-content: center;
        height: 100vh;
    }

    .calculator {
        padding: 20px;

        background-color: white;
        border-radius: 10px;
        box-shadow: -6px -3px 5px -2.9px rgb(224, 157, 157), -6px -3px 5px -2.9px rgb(241, 157, 157)
    }

    .calculator form input {
        border: 0;
        outline: 0;
        width: 50px;
        height: 50px;
        margin: 10px;
        border-radius: 10px;
        box-shadow: -8px -5px 5px -2.9px rgb(224, 157, 157), -8px -5px 5px -2.9px rgb(241, 157, 157);

        background-color: transparent;
        color: black;
        cursor: pointer;
        font-size: 25px;
        transition: 0.3s ease-in-out;
    }

    .calculator form input:hover {
        transform: scale(0.9);

    }

    .calculator form .display {
        display: flex;
        justify-content: flex-end;
        margin: 10px;
        width: 100%;
    }

    .calculator form .display input {
        font-size: 30px;
        text-align: left;
        flex: 1;
        border: none;
        box-shadow: none;
    }

    form input.operator {
        color: rgb(57, 202, 202);
    }
</style>

<body>
    <div class="container">
        <div class="calculator animated zoomIn" style="animation-delay: 1s;">
            
            <form action="" method="post">
                <div class="display">
                    <input type="text" name="display">
                </div>
                <div>
                    <input type="button" value="C" class="operator" onclick="display.value +=''">
                    <input type="button" value="Del" class="operator"
                        onclick="display.value = display.value.toString().slice(0,-1)">
                    <input type="button" value="%" class="operator" onclick="display.value +='%'">
                    <input type="button" value="*" class="operator" onclick="display.value +='*'">
                </div>
                <div>
                    <input type="button" value="7" onclick="display.value +='7'">
                    <input type="button" value="8" onclick="display.value +='8'">
                    <input type="button" value="9" onclick="display.value +='9'">
                    <input type="button" value="-" class="operator" onclick="display.value +='-'">
                </div>
                <div>
                    <input type="button" value="4" onclick="display.value +='4'">
                    <input type="button" value="5" onclick="display.value +='5'">
                    <input type="button" value="6" onclick="display.value +='6'">
                    <input type="button" value="+" class="operator" onclick="display.value +='+'">
                </div>
                <div>
                    <input type="button" value="1" onclick="display.value +='1'">
                    <input type="button" value="2" onclick="display.value +='2'">
                    <input type="button" value="3" onclick="display.value +='3'">
                    <input type="button" value="/" class="operator" onclick="display.value +='/'">
                </div>
                <div>
                    <input type="button" value="0" onclick="display.value +='0'">
                    <input type="button" value="00" onclick="display.value +='00'">
                    <input type="button" value="." onclick="display.value +='.'">
                    <input type="button" value="=" id="equal" class="operator"
                        onclick="display.value = eval(display.value)">
                </div>
            </form>
        </div>
    </div>
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
</body>

</html>