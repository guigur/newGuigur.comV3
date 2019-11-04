<?php

namespace GuigurFrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HostingServiceWebsites
 *
 * @ORM\Table(name="hosting_service_websites")
 * @ORM\Entity(repositoryClass="GuigurFrontBundle\Repository\HostingServiceWebsitesRepository")
 */
class HostingServiceWebsites
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="backup_status", type="string", length=255)
     */
    private $backupStatus;

    /**
     * @var bool
     *
     * @ORM\Column(name="backup_mail_success", type="boolean")
     */
    private $backupMailSuccess;

    /**
     * @var bool
     *
     * @ORM\Column(name="backup_mail_error", type="boolean")
     */
    private $backupMailError;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_datetime", type="datetime")
     */
    private $createdDatetime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_modified_datetime", type="datetime")
     */
    private $lastModifiedDatetime;

    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return HostingServiceWebsites
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set backupStatus
     *
     * @param string $backupStatus
     *
     * @return HostingServiceWebsites
     */
    public function setBackupStatus($backupStatus)
    {
        $this->backupStatus = $backupStatus;

        return $this;
    }

    /**
     * Get backupStatus
     *
     * @return string
     */
    public function getBackupStatus()
    {
        return $this->backupStatus;
    }

    /**
     * Set backupMailSuccess
     *
     * @param boolean $backupMailSuccess
     *
     * @return HostingServiceWebsites
     */
    public function setBackupMailSuccess($backupMailSuccess)
    {
        $this->backupMailSuccess = $backupMailSuccess;

        return $this;
    }

    /**
     * Get backupMailSuccess
     *
     * @return bool
     */
    public function getBackupMailSuccess()
    {
        return $this->backupMailSuccess;
    }

    /**
     * Set backupMailError
     *
     * @param boolean $backupMailError
     *
     * @return HostingServiceWebsites
     */
    public function setBackupMailError($backupMailError)
    {
        $this->backupMailError = $backupMailError;

        return $this;
    }

    /**
     * Get backupMailError
     *
     * @return bool
     */
    public function getBackupMailError()
    {
        return $this->backupMailError;
    }

    /**
     * Set createdDatetime
     *
     * @param \DateTime $createdDatetime
     *
     * @return HostingServiceWebsites
     */
    public function setCreatedDatetime($createdDatetime)
    {
        $this->createdDatetime = $createdDatetime;

        return $this;
    }

    /**
     * Get createdDatetime
     *
     * @return \DateTime
     */
    public function getCreatedDatetime()
    {
        return $this->createdDatetime;
    }

    /**
     * Set lastModifiedDatetime
     *
     * @param \DateTime $lastModifiedDatetime
     *
     * @return HostingServiceWebsites
     */
    public function setLastModifiedDatetime($lastModifiedDatetime)
    {
        $this->lastModifiedDatetime = $lastModifiedDatetime;

        return $this;
    }

    /**
     * Get lastModifiedDatetime
     *
     * @return \DateTime
     */
    public function getLastModifiedDatetime()
    {
        return $this->lastModifiedDatetime;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return HostingServiceWebsites
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return HostingServiceWebsites
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}

