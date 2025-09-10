<?php
namespace shornuk\reactions\models;

use shornuk\reactions\Listit;

use Craft;
use craft\base\Model;

class Reaction extends Model
{
    // Private Properties
    // =========================================================================
    
    private $_element;

    // Public Properties
    // =========================================================================

    public $id;
    public $userId;
    public $siteId;
    public $elementId;
    public $reactionType;
    public $dateCreated;
    public $dateUpdated;
    public $uid;

    // Public Methods
    // =========================================================================

    public function rules()
    {
        return [
            [['$userId', 'siteId', 'elementId'], 'integer'],
            [['reactionType'], 'string'],
            [['$userId', 'elementId', 'siteId', 'reactionType'], 'required'],
        ];
    }

    public function getElement()
    {
        if(is_null($this->_element))
        {
            $this->_element = Craft::$app->getElements()->getElementById($this->elementId);
        }
        return $this->_element;
    }
}