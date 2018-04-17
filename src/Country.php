<?php
/**
 * @copyright Copyright (C) 2018 Sergio coderius <coderius>
 * @license This program is free software: GNU General Public License
 */
namespace coderius\geoIp;

use yii\base\BaseObject;
use yii\helpers\ArrayHelper;

class Country extends BaseObject{
    
    private $_iso_code;
    private $_geoname_id;
    private $_names = [];
    
    public function __construct($country)
    {
        $this->_iso_code = ArrayHelper::getValue($country, 'iso_code');
        $this->_geoname_id = ArrayHelper::getValue($country, 'geoname_id');
        $this->_names = ArrayHelper::getValue($country, 'names');
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
    
}




