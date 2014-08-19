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

$data = file_get_contents('http://localhost/xml/demo001.xml');

$dom = new DOMDocument('1.0', 'utf-8');

$dom->loadXML($data);

$domNodeList = $dom->getElementsByTagName('user');

foreach ($domNodeList as $node) {
    /* @var DOMElement $node */
    echo $node->getElementsByTagName('username')->item(0)->nodeValue, '<br>';
}

?>

</body>
</html>
