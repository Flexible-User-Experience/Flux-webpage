<?php if (!$sf_user->hasFlash('msg')): ?>
	<h1><?php echo $title ?></h1>
	<?php echo $sf_data->getRaw('text'); ?>
	<form method="POST" action="<?php echo url_for('static/contact') ?>" class="contactForm">
	<?php /*echo $form->renderFormTag('static/contact', array('class' => 'contactForm'))*/ ?>
	<?php echo $form ?>
	<input type="submit" class="customSubmit" value="<?php echo __('Submit') ?>"/>
	</form>
<?php else: ?>
	<h1><?php echo __('Thank you') ?></h1>
	<p>
		<?php echo __('Message send') ?><br/>
	</p>
	<hr/>
	<p>
		<?php echo __('We contact you as soon as possible.') ?><br/>
	</p>
<?php endif; ?>