<?php
$image_path = __DIR__ . '/img/sample.png';


// Check if the file exists
if (file_exists($image_path)) {
    // Read the contents of the image file
    $imageContent = file_get_contents($image_path);

    // Check if the image content is non-empty
    if ($imageContent !== false) {
        var_dump($imageContent) ;
    } else {
        echo "Failed to read image content!";
    }
} else {
    echo "Image file does not exist!";
}
