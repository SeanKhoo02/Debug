<?php

function create_time_range($start, $end, $interval = '30 mins', $format = '24')
				 {
				  $startTime = strtotime($start); 
				  $endTime   = strtotime($end);
				  $returnTimeFormat = ($format == '12')?'g:i:s A':'G:i:s';

				  $current   = time(); 
				  $addTime   = strtotime('+'.$interval, $current); 
				  $diff      = $addTime - $current;

				  $times = array(); 
				  while ($startTime < $endTime) { 
				   $times[] = date($returnTimeFormat, $startTime); 
				   $startTime += $diff; 
				  } 
				  $times[] = date($returnTimeFormat, $startTime); 
				  return $times; 
				 }

//https://stackoverflow.com/questions/8104998/how-to-call-function-of-one-php-file-from-another-php-file-and-pass-parameters-t
//https://stackoverflow.com/questions/1953857/fatal-error-cannot-redeclare-function
?>
