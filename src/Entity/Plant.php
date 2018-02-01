<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Plant
{
    const ENTITY_NAME = "plant";

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="string")
     */
    public $name;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    public $latinName;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    public $image;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    public $additional;

    /**
     * @ORM\Column(type="datetime")
     */
    public $seedingPeriodStart;

    /**
     * @ORM\Column(type="datetime")
     */
    public $seedingPeriodEnd;

    /**
     * @ORM\Column(type="datetime")
     */
    public $harvestingPeriodStart;

    /**
     * @ORM\Column(type="datetime")
     */
    public $harvestingPeriodEnd;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    public $distance;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    public $depth;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Plant
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Plant
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLatinName()
    {
        return $this->latinName;
    }

    /**
     * @param mixed $latinName
     * @return Plant
     */
    public function setLatinName($latinName)
    {
        $this->latinName = $latinName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     * @return Plant
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdditional()
    {
        return $this->additional;
    }

    /**
     * @param mixed $additional
     * @return Plant
     */
    public function setAdditional($additional)
    {
        $this->additional = $additional;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getSeedingPeriodStart()
    {
        $this->seedingPeriodStart = date_create_from_format('Y-m-d H:i:s', $this->seedingPeriodStart);
        return $this;
    }

    /**
     * @param null $seedingPeriodStart
     * @return $this
     */
    public function setSeedingPeriodStart($seedingPeriodStart = null)
    {
        $this->seedingPeriodStart = date_create_from_format('d.m', $seedingPeriodStart);
        return $this;
    }


    /**
     * @return mixed
     */
    public function getSeedingPeriodEnd()
    {
        $this->seedingPeriodEnd = date_create_from_format('Y-m-d H:i:s', $this->seedingPeriodEnd);
        return $this;
    }

    /**
     * @param null $seedingPeriodEnd
     * @return $this
     */
    public function setSeedingPeriodEnd($seedingPeriodEnd = null)
    {
        $this->seedingPeriodEnd = date_create_from_format('d.m', $seedingPeriodEnd);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHarvestingPeriodStart()
    {
        $this->harvestingPeriodStart = date_create_from_format('Y-m-d H:i:s', $this->harvestingPeriodStart);
        return $this;
    }

    /**
     * @param null $harvestingPeriodStart
     * @return $this
     */
    public function setHarvestingPeriodStart($harvestingPeriodStart = null)
    {
        $this->harvestingPeriodStart = date_create_from_format('d.m', $harvestingPeriodStart);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHarvestingPeriodEnd()
    {
        $this->harvestingPeriodEnd = date_create_from_format('Y-m-d H:i:s', $this->harvestingPeriodEnd);
        return $this;
    }

    /**
     * @param null $harvestingPeriodEnd
     * @return $this
     */
    public function setHarvestingPeriodEnd($harvestingPeriodEnd = null)
    {
        $this->harvestingPeriodEnd = date_create_from_format('d.m', $harvestingPeriodEnd);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @param mixed $distance
     * @return Plant
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * @param mixed $depth
     * @return Plant
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;
        return $this;
    }

}