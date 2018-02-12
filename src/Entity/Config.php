<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Config extends Base
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="string")
     */
    public $configKey;

    /**
     * @ORM\Column(type="string")
     */
    public $configValue;

    /**
     * @ORM\Column(type="string")
     */
    public $configType;

    /**
     * @ORM\Column(type="text")
     */
    public $description;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Config
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConfigKey()
    {
        return $this->configKey;
    }

    /**
     * @param mixed $configKey
     * @return Config
     */
    public function setConfigKey($configKey)
    {
        $this->configKey = $configKey;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConfigValue()
    {
        return $this->configValue;
    }

    /**
     * @param mixed $configValue
     * @return Config
     */
    public function setConfigValue($configValue)
    {
        $this->configValue = $configValue;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConfigType()
    {
        return $this->configType;
    }

    /**
     * @param mixed $configType
     * @return Config
     */
    public function setConfigType($configType)
    {
        $this->configType = $configType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return Config
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
}