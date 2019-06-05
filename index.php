<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $enterValue = $_POST["value"];
    $array = $_POST["array"];
    $array = explode(" ",$array);
    function checkValueInArray($array, $enterValue){
        foreach ($array as $key => $value){
            if ($enterValue === $value){
                return true;
            }
        }
        return false;
    }

    function checkIndexInArray($array, $enterValue){
        foreach ($array as $key => $value){
            if ($enterValue === $value){
                return $key;
            }
        }
    }
    if (checkValueInArray($array, $enterValue) === true){
        $deleteIndex = checkIndexInArray($array, $enterValue);
        for ($index = $deleteIndex; $index < count($array) - 1; $index++){
            $temp = $array[$index];
            $array[$index] = $array[$index + 1];
            $array[$index + 1] = $temp;
        }
    }
    else{
        echo "Your number not in array";
    }
//    array_pop($array[count($array)-1]);
    $array[count($array)-1] = null;
    print_r($array);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài tập xóa một phần tử bất kỳ trong mảng khi nhập từ bàn phím</title>
    <style>
        fieldset{
            color: darkmagenta;
        }
        form{
            margin-left: 35%;
        }
        h2{
            color: blue;
            margin-left: 40px;
        }
        .display{
            height: 160px; width: 330px;
            margin: 0;
            padding: 10px;
            border:1px #dd33dd solid;
        }
        input[type=number]{
            margin-left: 9px;
            width: 62%;
        }
        input[type=submit]{
            color: red;
            margin-left: 20%;
            width: 30%;
        }
    </style>
</head>
<body>
<form method="post">
    <div class="display">
        <h2>Delete part from array</h2>
        <fieldset>
            <br>Get value:
            <input type="number" name="value" size="30">
            <br>Enter array:
            <input type="text" name="array" size="30">
            <br>Display:
            <input type="submit" value="result" size="30">
        </fieldset>
    </div>
</form>
</body>
</html>
