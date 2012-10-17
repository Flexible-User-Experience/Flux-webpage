<h1><?php echo __('projects')?></h1>
<?php if (count($projects) == 0): ?>
	<p><?php echo __('There are no projects') ?></p>
<?php else: ?>
	<?php $i = 0; ?>
	<?php foreach ($projects as $project): ?>
		<?php if ($i > 0) echo '<hr/>'?>
		<?php if (strlen($project->getLogo()) > 0) echo link_to(image_tag($project->getLogoBw(), array('id' => 'logo-'.$project->getId(), 'onmouseout' => 'makeHoverOutEffect(this)', 'onmouseover' => 'makeHoverInEffect(this)', 'class' => 'logo', 'alt' => 'Logo '.$project->getName())), '@project_by_name_'.$sf_user->getCulture().'?name='.$project->getName()); ?>
		<p>
			<?php echo $project->getUnit()->getSummary(ESC_RAW).' '.link_to(__('Read more.'), '@project_by_name_'.$sf_user->getCulture().'?name='.$project->getName()); ?>
		</p>
		<p class="subinfo">
			<?php if (strlen($project->getUnit()->getUrl()) > 0) echo link_to($project->getUnit()->getUrl(), 'http://'.$project->getUnit()->getUrl()); ?>
		</p>
		<?php $i++; ?>
	<?php endforeach; ?>
<?php endif; ?>
