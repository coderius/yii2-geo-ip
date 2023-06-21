<?php
/**
 * @copyright Copyright (C) 2018 Sergio coderius <coderius>
 * @license This program is free software: GNU General Public License
 */
namespace coderius\geoIp;

use yii\base\BaseObject;
use yii\helpers\ArrayHelper;

class Continent extends BaseObject{
    
    private $_code;
    private $_geoname_id;
    private $_names = [];
    
    public function __construct($continent)
    {
        $this->_code = ArrayHelper::getValue($continent, 'code');
        $this->_geoname_id = ArrayHelper::getValue($continent, 'geoname_id');
        $this->_names = ArrayHelper::getValue($continent, 'names');
    }
    
    public function getCode() {
        return $this->_code;
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



