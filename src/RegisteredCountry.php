<?php
/**
 * @copyright Copyright (C) 2018 Sergio coderius <coderius>
 * @license This program is free software: GNU General Public License
 */
namespace coderius\geoIp;

use yii\base\BaseObject;
use yii\helpers\ArrayHelper;

class RegisteredCountry extends BaseObject{
    
    private $_iso_code;
    private $_geoname_id;
    private $_names = [];
    
    public function __construct($registered_country)
    {
        $this->_iso_code = ArrayHelper::getValue($registered_country, 'iso_code');
        $this->_geoname_id = ArrayHelper::getValue($registered_country, 'geoname_id');
        $this->_names = ArrayHelper::getValue($registered_country, 'names');
    }
    
    public function getIsoCode() {
        return $this->_iso_code;
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



