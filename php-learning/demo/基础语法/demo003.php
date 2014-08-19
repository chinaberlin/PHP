<?php
/**
  * Kittencup (http://www.kittencup.com/)
  *
  * @date 2014-3-1 ����11:32:16
  * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
  * @license   http://kittencup.com
  */
for ($i = 0; $i < 100; $i ++) {
    echo $i . '<br/>';
}

for ($i = 0; $i < 100; $i ++) :
    echo $i . '<br/>';
endfor
;

if ($i === 0) : 

elseif ($i < 100) :

endif;

?>

<ul>
	<?php for ($i = 0 ; $i < 100 ; $i++):?>
	<li>
		<?=$i?>
	</li>
	<?php endfor;?>
</ul>