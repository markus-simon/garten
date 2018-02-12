<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 */
class Event extends Base
{
    const ENTITY_NAME = "event";

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    public $title;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank()
     */
    public $date;

    /**
     * @ORM\Column(type="datetime", options={"default"="CURRENT_TIMESTAMP"})
     */
    public $createdAt;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Event
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Event
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        $this->date = date_create_from_format('Y-m-d H:i:s', "2018-01-01 12:12:12"/*$this->date*/);
        return $this;
    }

    /**
     * @param null $date
     * @return $this
     */
    public function setDate($date = null)
    {
        $this->date = date_create_from_format('Y-m-d H:i:s', $date);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        $this->createdAt = date_create_from_format('Y-m-d H:i:s', $this->createdAt);
        return $this;
    }

    /**
     * @return Event
     */
    public function setCreatedAt()
    {
        $this->createdAt = date("Y-m-d H:i:s");
        return $this;
    }
}