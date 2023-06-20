<?php
/**
 * @copyright Copyright (C) 2018 Sergio coderius <coderius>
 * @license This program is free software: GNU General Public License
 */
namespace coderius\geoIp;

use yii\base\BaseObject;

class Result extends BaseObject
{
    private $_readerResult;
    private $_city;
    private $_continent;
    private $_country;
    private $_location;
    private $_postal;
    private $_registeredCountry;
    private $_subdivisions;

    public function __construct($readerResult, $config = [])
    {
        $this->setReaderResult($readerResult);

        if ($this->hasKey('city', $readerResult)) {
            $this->setCity($readerResult['city']);
        }
        if ($this->hasKey('continent', $readerResult)) {
            $this->setContinent($readerResult['continent']);
        }
        if ($this->hasKey('country', $readerResult)) {
            $this->setCountry($readerResult['country']);
        }
        if ($this->hasKey('location', $readerResult)) {
            $this->setLocation($readerResult['location']);
        }
        if ($this->hasKey('postal', $readerResult)) {
            $this->setPostal($readerResult['postal']);
        }
        if ($this->hasKey('registered_country', $readerResult)) {
            $this->setRegisteredCountry($readerResult['registered_country']);
        }
        if ($this->hasKey('subdivisions', $readerResult)) {
            $this->setSubdivisions($readerResult['subdivisions']);
        }

        parent::__construct($config);
    }

    public function hasReaderResult()
    {
        if (is_array($this->_readerResult)) {
            return count($this->_readerResult) > 0 ? true : false;
        }
        return false;
    }


    public function getCity($lang = "en")
    {
        return $this->_city->names->$lang;
    }

    public function getCountry($lang = "en")
    {
        return $this->_country->names->$lang;
    }


    public function getLocation()
    {
        return $this->_location;
    }

    public function getIsoCode()
    {
        return $this->_country->isoCode;
    }

    /**
     * Setters
     */
    protected function setReaderResult($data)
    {
        return $this->_readerResult = $data;
    }

    /*
     * @param array $data
     * @return object or null
     */
    protected function setCity($data)
    {
        $this->_city = new City($data);
    }

    /*
     * @param array $data
     * @return object|null
     */
    protected function setContinent($data)
    {
        $this->_continent = new Continent($data);
    }

    /*
     * @param array $data
     * @return object|null
     */
    protected function setCountry($data)
    {
        $this->_country = new Country($data);
    }

    /*
     * @param array $data
     * @return object|null
     */
    protected function setLocation($data)
    {
        $this->_location = new Location($data);
    }

    /*
     * @param array $data
     * @return object|null
     */
    protected function setPostal($data)
    {
        $this->_postal = new Postal($data);
    }

    /*
     * @param array $data
     * @return object|null
     */
    protected function setRegisteredCountry($data)
    {
        $this->_registeredCountry = new RegisteredCountry($data);
    }


    protected function setSubdivisions($data)
    {
        $subdivisions = [];
        foreach ($data as $subdivision) {
            $subdivisions[] = new Subdivision($subdivision);
        }
        $this->_subdivisions = $subdivisions;
    }

    private function hasKey($key, $array)
    {
        if (array_key_exists($key, $array)) {
            return true;
        }
        return false;
    }

}