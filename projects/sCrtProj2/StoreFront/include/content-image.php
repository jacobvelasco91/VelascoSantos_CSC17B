<?php
$content_image = array('https://static.pexels.com/photos/9095/pexels-photo.jpg','https://static.pexels.com/photos/192933/pexels-photo-192933.jpeg','https://static.pexels.com/photos/372851/pexels-photo-372851.jpeg','https://images.pexels.com/photos/162678/cake-plum-cake-pie-confectionery-162678.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb');

foreach ($content_image as $key => $value) {
  echo "<div class='content-pic'>
        <img src='{$value}' alt='pic{$key}'>
        </div>";
      }

 ?>
