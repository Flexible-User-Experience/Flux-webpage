<?php

/**
 * BaseUnit
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $title
 * @property string $subtitle
 * @property string $summary
 * @property string $description
 * @property string $url
 * @property string $image
 * @property Doctrine_Collection $Projects
 * 
 * @method string              getName()        Returns the current record's "name" value
 * @method string              getTitle()       Returns the current record's "title" value
 * @method string              getSubtitle()    Returns the current record's "subtitle" value
 * @method string              getSummary()     Returns the current record's "summary" value
 * @method string              getDescription() Returns the current record's "description" value
 * @method string              getUrl()         Returns the current record's "url" value
 * @method string              getImage()       Returns the current record's "image" value
 * @method Doctrine_Collection getProjects()    Returns the current record's "Projects" collection
 * @method Unit                setName()        Sets the current record's "name" value
 * @method Unit                setTitle()       Sets the current record's "title" value
 * @method Unit                setSubtitle()    Sets the current record's "subtitle" value
 * @method Unit                setSummary()     Sets the current record's "summary" value
 * @method Unit                setDescription() Sets the current record's "description" value
 * @method Unit                setUrl()         Sets the current record's "url" value
 * @method Unit                setImage()       Sets the current record's "image" value
 * @method Unit                setProjects()    Sets the current record's "Projects" collection
 * 
 * @package    fluxweb
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUnit extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('unit');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('subtitle', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('summary', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('description', 'string', 2000, array(
             'type' => 'string',
             'length' => 2000,
             ));
        $this->hasColumn('url', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('image', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Project as Projects', array(
             'local' => 'id',
             'foreign' => 'unit_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'title',
              1 => 'subtitle',
              2 => 'summary',
              3 => 'description',
             ),
             ));
        $this->actAs($timestampable0);
        $this->actAs($i18n0);
    }
}