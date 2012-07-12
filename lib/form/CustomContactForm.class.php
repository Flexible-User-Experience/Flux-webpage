<?php
class CustomContactForm extends sfForm
{
	public function setup()
	{	
		$this->setWidgets(array(
		      'name'        => new sfWidgetFormInputText(),
					'email'       => new sfWidgetFormInputText(),
					'phone'       => new sfWidgetFormInputText(),
					'message'     => new sfWidgetFormInputText(), //sfWidgetFormTextarea()
		));
		$this->setValidators(array(
					'name'       => new sfValidatorString(array('min_length' => 3, 'max_length' => 255), array('min_length' => 'Invalid: 3 characters min.', 'max_length' => 'Invalid: 255 characters max.')),
					'email'      => new sfValidatorEmail(),
					'phone'      => new sfValidatorString(array('required' => false, 'min_length' => 9), array('min_length' => 'Invalid: 9 characters min.')),
					'message'    => new sfValidatorString(array('max_length' => 4000), array('max_length' => 'Invalid: 4000 characters max.'))
		));
		$this->widgetSchema->setNameFormat('contacte[%s]');
	}
}