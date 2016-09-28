<?php
    if(isset($_POST["sub"])){
        if(isset($_POST["check"])){
            foreach ($_POST["check"] as $key => $value) {
                echo $value;
            }
        }
        if(isset($_POST["op"])){
            foreach ($_POST["op"] as $key => $value) {
                echo $value;
            }
        }
    }

?>

<html>
<head>
<title>Traer al Frente</title>
</head>
<body>
        <form action="" method="post">
            <label>uno</label>
            <input type="checkbox" name="check[]" value="1">
            <label>dos</label>
            <input type="checkbox" name="check[]" value="2">
            <label>tres</label>
            <input type="checkbox" name="check[]" value="3">
            <label>cuatro</label>
            <input type="checkbox" name="check[]" value="4">

            <select name="op[]" multiple>
                <option value="1">uno</option>
                <option value="1">uno</option>
                <option value="1">uno</option>
            </select>
            <input type="submit" name="sub">
        </form>
</body>
</html>