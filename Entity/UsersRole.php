<?php

namespace Acme\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsersRole
 */
class UsersRole
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \Acme\UserBundle\Entity\Role
     */
    private $role;

    /**
     * @var \Acme\UserBundle\Entity\AutenUsers
     */
    private $user;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return UsersRole
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set role
     *
     * @param \Acme\UserBundle\Entity\Role $role
     * @return UsersRole
     */
    public function setRole(\Acme\UserBundle\Entity\Role $role = null)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \Acme\UserBundle\Entity\Role 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set user
     *
     * @param \Acme\UserBundle\Entity\AutenUsers $user
     * @return UsersRole
     */
    public function setUser(\Acme\UserBundle\Entity\AutenUsers $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Acme\UserBundle\Entity\AutenUsers 
     */
    public function getUser()
    {
        return $this->user;
    }
}
