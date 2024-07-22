<h1 style="text-align:center;">Convert JPG/PNG Image to WEBP Using PHP</h1>

<?php
$jpg_location = './jpg';
$files = scandir($jpg_location);
$files = array_diff($files, array('.', '..'));

foreach ($files as $file) {
    
    $image = imagecreatefromstring(file_get_contents($jpg_location.'/'.$file));
    ob_start();
    imagejpeg($image,NULL,100);
    $cont = ob_get_contents();
    ob_end_clean();
    imagedestroy($image);
    $content = imagecreatefromstring($cont);
    $name = str_replace('.jpg',' ',$file);
    $output = 'webp/'.$name.'.webp';
    imagewebp($content,$output);
    imagedestroy($content);
    echo '<h4>Output Image Saved as '.$output.'</h4>';
}

?>