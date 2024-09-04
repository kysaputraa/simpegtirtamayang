<?php
function resize_and_compress_image($source_image, $target_image, $max_width = 1280, $max_height = 720, $max_size = 500)
{
    // Load the image
    $image = \Config\Services::image()->load($source_image);

    // Get the image dimensions
    $original_width = $image->getWidth();
    $original_height = $image->getHeight();

    // Calculate the scale factor
    $scale_factor = min($max_width / $original_width, $max_height / $original_height);

    // Calculate the new dimensions
    $new_width = round($original_width * $scale_factor);
    $new_height = round($original_height * $scale_factor);

    // Resize the image
    $image->resize($new_width, $new_height, true, 'center');

    // Compress the image
    $image->save($target_image, ['quality' => 75]);

    // Check if the compressed image is within the size limit
    $image_size = filesize($target_image);
    if ($image_size > $max_size * 1024) {
        // If not, reduce quality further until within the limit
        while ($image_size > $max_size * 1024) {
            $image->save($target_image, ['quality' => $image->getQuality() - 10]);
            $image_size = filesize($target_image);
        }
    }

    return true;
}
