<?php
/**
 * Kittencup Module
 *
 * @date 14-7-9 下午1:12
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php

    $filePath = './demo001.xml';

    $reader = new XMLReader();

    $reader->open($filePath);


    while($reader->read()){
       echo $reader->readString();
    }

?>

</body>
</html>
