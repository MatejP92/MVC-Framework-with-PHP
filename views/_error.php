<?php

/**
 *  User: Matej Pal 
 * Started: 3.12.2022 
 * Ended: 
 * Done with the help of YouTube, freeCodeCamp.org tutorial
 * Link: https://www.youtube.com/watch?v=6ERdu4k62wI&t=627s&ab_channel=freeCodeCamp.org 
 */ 


/** @var $exception \Exception */

 ?>

<!-- here we can edit our error 404, page not found site -->

<h3><?php echo $exception->getCode() ?> - <?php echo $exception->getMessage() ?></h3>