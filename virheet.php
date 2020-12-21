<?php if(count($virheet) > 0) : ?>

	<div class="error">
		<?php foreach($virheet as $error) :?>
		
				<p><?php echo $error ?></p>
		
		<?php endforeach?>
		
	</div>
	<?php endif ?>