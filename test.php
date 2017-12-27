<?php

$tempDir = '/download/file/here';
$finalDir = '/keep/file/here';
$imageUrl = 'http://www.keenthemes.com/preview/metronic/theme/assets/global/plugins/jcrop/demos/demo_files/image1.jpg';

exec("cd $tempDir && wget --quiet $imageUrl");

if (!file_exists("$tempDir/image.jpg")) {
    throw new Exception('Failed while trying to download image');
}

if (rename("$tempDir/image.jpg", "$finalDir/new-image-name.jpg") === false) {
    throw new Exception('Failed while trying to move image file from temp dir to final dir');
}
?>