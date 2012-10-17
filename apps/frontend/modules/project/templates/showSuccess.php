<?php use_helper('Date')?>

<h1><?php echo __('projects')?></h1>

<?php if (strlen($project->getLogo()) > 0): ?>
	<img class="logo" src='<?php echo $project->getLogo() ?>' alt='Logo <?php echo $project->getName() ?>'/>
<?php endif; ?>

<?php if ($project->getUnit()->getName() != 'Skaeda' && $project->getUnit()->getName() != 'Plataforma SomEnergia' && $project->getUnit()->getName() != 'Lo Pati' && $project->getUnit()->getName() != 'ERP Estilconstruction'): ?>
	<p><?php echo $project->getUnit()->getName(); ?></p>
<?php endif; ?>

<p><?php echo $project->getUnit()->getSubtitle(ESC_RAW) ?></p>
<p><?php echo $project->getUnit()->getDescription(ESC_RAW) ?></p>

<?php if (strlen($project->getAltImage()) > 0): ?>
	<img class='projectScreenshot' src='<?php echo $project->getAltImage() ?>' alt='Screenshot <?php echo $project->getName() ?>' />
<?php endif; ?>

<p class="subinfo">
	<?php if (strlen($project->getBeginDate())): ?>
		<strong><?php echo __('Date').': ' ?></strong><?php echo format_date($project->getBeginDate()) ?><br/>
	<?php endif; ?>
	
	<?php if (strlen($project->getUnit()->getUrl())): ?>
		<strong><?php echo __('Homepage').': ' ?></strong><?php echo link_to($project->getUnit()->getUrl(), 'http://'.$project->getUnit()->getUrl()) ?><br/>
	<?php endif; ?>
	
	<?php if (strlen($project->getTechnology())): ?>
		<strong><?php echo __('Used technologies').': ' ?></strong><?php echo $project->getTechnology() ?><br/>
	<?php endif; ?>
</p>