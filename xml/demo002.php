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

$dbData = [
    [
        'name' => 'blog',
        'id' => 1
    ],
    [
        'name' => 'php',
        'id' => 2
    ]
];


$dom = new DOMDocument();
$dom->formatOutput = true;
$root = $dom->createElement('categories');

foreach ($dbData as $item) {

    $category = $dom->createElement('category');

    $name = $dom->createElement('name');
    $nameText = $dom->createTextNode($item['name']);
    $name->appendChild($nameText);

    $id = $dom->createElement('id');
    $idText = $dom->createTextNode($item['id']);
    $id->appendChild($idText);

    $category->appendChild($name);
    $category->appendChild($id);

    $root->appendChild($category);
}

$dom->appendChild($root);
//$dom->saveXML();
$dom->save('demo002.xml');


?>

</body>
</html>
