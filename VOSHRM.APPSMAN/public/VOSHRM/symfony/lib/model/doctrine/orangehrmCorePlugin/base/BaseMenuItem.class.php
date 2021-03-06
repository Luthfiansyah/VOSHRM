<?php

/**
 * BaseMenuItem
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $menuTitle
 * @property integer $screenId
 * @property integer $parentId
 * @property integer $level
 * @property integer $orderHint
 * @property string $urlExtras
 * @property integer $status
 * @property Screen $Screen
 * 
 * @method integer  getId()        Returns the current record's "id" value
 * @method string   getMenuTitle() Returns the current record's "menuTitle" value
 * @method integer  getScreenId()  Returns the current record's "screenId" value
 * @method integer  getParentId()  Returns the current record's "parentId" value
 * @method integer  getLevel()     Returns the current record's "level" value
 * @method integer  getOrderHint() Returns the current record's "orderHint" value
 * @method string   getUrlExtras() Returns the current record's "urlExtras" value
 * @method integer  getStatus()    Returns the current record's "status" value
 * @method Screen   getScreen()    Returns the current record's "Screen" value
 * @method MenuItem setId()        Sets the current record's "id" value
 * @method MenuItem setMenuTitle() Sets the current record's "menuTitle" value
 * @method MenuItem setScreenId()  Sets the current record's "screenId" value
 * @method MenuItem setParentId()  Sets the current record's "parentId" value
 * @method MenuItem setLevel()     Sets the current record's "level" value
 * @method MenuItem setOrderHint() Sets the current record's "orderHint" value
 * @method MenuItem setUrlExtras() Sets the current record's "urlExtras" value
 * @method MenuItem setStatus()    Sets the current record's "status" value
 * @method MenuItem setScreen()    Sets the current record's "Screen" value
 * 
 * @package    orangehrm
 * @subpackage model\core\base
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMenuItem extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ohrm_menu_item');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('menu_title as menuTitle', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('screen_id as screenId', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('parent_id as parentId', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('level', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('order_hint as orderHint', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('url_extras as urlExtras', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('status', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Screen', array(
             'local' => 'screenId',
             'foreign' => 'id'));
    }
}