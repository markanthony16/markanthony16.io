<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

?>

<html>
    <head>
        <title>Image Preview</title>
    </head>
    <body>
        <img src="asset/registration_requirement/<?php echo $id; ?>">
    </body>
</html>