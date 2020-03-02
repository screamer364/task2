<?php

error_reporting(-1);

$bigImage = imagecreatefrompng('test.png');
$tempImageName = rand(1, 10000) . '.png';

// уменьшил изображение до размеров 200х200
// вырезал центральную часть размером 200х100
// сохранил в файл с рандомным именем для вывода нового изображения в виде баннера
$rectCrop = ['x' => 0, 'y' => 50, 'width' => 200, 'height' => 100];
imagepng(imagecrop(imagescale($bigImage, 200), $rectCrop), $tempImageName);

// вставил изображение непосредственно в html для того, чтобы удалить уменьшенную копию по завершению скрипта
$outImage = sprintf('<a href="http://google.com" target="_blank"><img src="data:image/gif;base64,%s"></a>', base64_encode(file_get_contents($tempImageName)));
unlink($tempImageName);

echo $outImage;

