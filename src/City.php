<?php
/**
 * @copyright Copyright (C) 2018 Sergio coderius <coderius>
 * @license This program is free software: GNU General Public License
 */
namespace coderius\geoIp;

use yii\base\BaseObject;
use yii\helpers\ArrayHelper;

class City extends BaseObject{
    
    private $_geoname_id;
    private $_names = [];
    
    public function __construct($city)
    {
        $this->_geoname_id = ArrayHelper::getValue($city, 'geoname_id');
        $this->_names = ArrayHelper::getValue($city, 'names');
    }
    
    public function getGeonameId() {
        return $this->_geoname_id;
    }
    
    public function getNames() {
        return (object) $this->_names;
    }
    
    public function __toString()
    {
        $lang = "en";
        return $this->names->$lang;
    }
}

