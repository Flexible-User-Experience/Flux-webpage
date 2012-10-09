<?php

/**
 * project actions.
 *
 * @package    fluxweb
 * @subpackage project
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class staticActions extends sfActions
{
	
  public function executeHome(sfWebRequest $request)
  {
  	$unit = UnitTable::getHomepage();
  	$this->title = $unit->getTitle();
  	$this->text  = $unit->getDescription();
  	if (!$request->getParameter('sf_culture')) {
			// La ruta NO contiene informacion sobre la cultura
			sfContext::getInstance()->getLogger()->debug('[static/home] La ruta NO contiene información sobre la cultura');
			if ($this->getUser()->isFirstRequest()) {
				$culture = $request->getPreferredCulture(array('ca', 'es', 'en'));
				$this->getUser()->setCulture($culture);
				$this->getUser()->isFirstRequest(false);
			}	else {
				$culture = $this->getUser()->getCulture();
			}
			$this->redirect('@homepage_'.$culture);
		} else {
			// La ruta contiene informacion sobre la cultura
			sfContext::getInstance()->getLogger()->debug('[static/home] La ruta contiene información sobre la cultura');
		}
  }
  
  public function executeServices(sfWebRequest $request)
  {
  	$unit = UnitTable::getServices();
  	$this->title = $unit->getTitle();
  	$this->text  = $unit->getDescription();
  }
  
  public function executeTeam(sfWebRequest $request)
  {
  	$this->coreMembers = Doctrine_Core::getTable('Member')
      ->createQuery('a')
      ->leftJoin('a.Enumeration e')
      ->where('a.is_partner = 0')
      ->andWhere('e.is_active = 1')
      ->orderBy('e.position ASC')
      ->execute();
  	$this->partnerMembers = Doctrine_Core::getTable('Member')
  		->createQuery('a')
  		->leftJoin('a.Enumeration e')
  		->where('a.is_partner = 1')
  		->andWhere('e.is_active = 1')
  		->orderBy('e.position ASC')
  		->execute();
  }
  
  public function executeContact(sfWebRequest $request)
  {
  	$unit = UnitTable::getContact();
  	$this->title = $unit->getTitle();
  	$this->text  = $unit->getDescription();
  	$this->form  = new CustomContactForm();
  	if ($request->isMethod(sfRequest::POST)) {
  		$this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
  		if ($this->form->isValid()) {
  			// Send message and redirect
  			$message = Swift_Message::newInstance()
  				->setSubject('Missatge de contacte web Flux')
  				->setFrom(array($this->form->getValue('email') => $this->form->getValue('name')))
  				->setTo(array('david@flux.cat' => 'David Romani'))
  				->setBody('Missatge de contacte formulari web')
  				->addPart(
  					'<p>Missatge de contacte formulari web<br/><br/></p>'.
  					'<p>Enviat per: '. $this->form->getValue('name'). '<br/><br/>'.
  					'Email: '. $this->form->getValue('email'). '<br/><br/>'.
  					'Telèfon: '. $this->form->getValue('phone'). '<br/><br/>'.
  					'Missatge: '. $this->form->getValue('message'). '</p>', 'text/html');
  			$this->getMailer()->send($message);
  			$this->getUser()->setFlash('msg', 'Email send');
  			$this->form  = new CustomContactForm();
  		}
  	}
  }
  
  public function executePrivacy(sfWebRequest $request)
  {
  	$unit = UnitTable::getPrivacy();
  	$this->title = $unit->getTitle();
  	$this->text  = $unit->getDescription();
  }
  
}
