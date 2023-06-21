<?php
/**
 * @copyright Copyright (C) 2018 Sergio coderius <coderius>
 * @license This program is free software: GNU General Public License
 */
namespace coderius\geoIp;

use yii\base\BaseObject;
use yii\helpers\ArrayHelper;

class Postal extends BaseObject{
    
    private $_code;
    private $_geoname_id;
    private $_names = [];
    
    public function __construct($postal)
    {
        $this->_code = ArrayHelper::getValue($postal, 'code');
    }
    
    public function getCode() {
        return $this->_code;
    }
    
    public function __toString()
    {
        return $this->code;
    }
}



