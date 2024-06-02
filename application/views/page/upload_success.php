<h3>Your file was successfully uploaded!</h3>

<ul>
    <li>File Name: <?php echo $upload_data['file_name']; ?></li>
    <li>File Type: <?php echo $upload_data['file_type']; ?></li>
    <li>File Size: <?php echo $upload_data['file_size']; ?> bytes</li>
    <li>Width: <?php echo $upload_data['image_width']; ?>px</li>
    <li>Height: <?php echo $upload_data['image_height']; ?>px</li>
</ul>

<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>