<?php

namespace GuigurFrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="GuigurFrontBundle\Repository\ProjectRepository")
 */
class Project
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="img_miniature", type="string", length=255)
     */
    private $imgMiniature;

    /**
     * @var string
     *
     * @ORM\Column(name="img_project", type="string", length=255)
     */
    private $imgProject;

    /**
     * @var string
     *
     * @ORM\Column(name="description_short", type="string", length=255)
     */
    private $descriptionShort;

    /**
     * @var bool
     *
     * @ORM\Column(name="description_status", type="boolean")
     */
    private $descriptionStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=6)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=100000)
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetimetz")
     */
    private $datetime;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="directLink", type="string", length=255)
     */
    private $directLink;

    /**
     * @var bool
     *
     * @ORM\Column(name="share_social_links_status", type="boolean")
     */
    private $shareSocialLinksStatus;

    /**
     * @var bool
     *
     * @ORM\Column(name="coms_status", type="boolean")
     */
    private $comsStatus;

    /**
     * @var bool
     *
     * @ORM\Column(name="featured", type="boolean")
     */
    private $featured;

    /**
     * @var bool
     *
     * @ORM\Column(name="displayName", type="boolean")
     */
    private $displayName;

    /**
     * @var bool
     *
     * @ORM\Column(name="isEnabled", type="boolean")
     */
    private $isEnabled;

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
     * @return Project
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
     * Set imgMiniature
     *
     * @param string $imgMiniature
     *
     * @return Project
     */
    public function setImgMiniature($imgMiniature)
    {
        $this->imgMiniature = $imgMiniature;

        return $this;
    }

    /**
     * Get imgMiniature
     *
     * @return string
     */
    public function getImgMiniature()
    {
        return $this->imgMiniature;
    }

    /**
     * Set imgProject
     *
     * @param string $imgProject
     *
     * @return Project
     */
    public function setImgProject($imgProject)
    {
        $this->imgProject = $imgProject;

        return $this;
    }

    /**
     * Get imgProject
     *
     * @return string
     */
    public function getImgProject()
    {
        return $this->imgProject;
    }

    /**
     * Set descriptionShort
     *
     * @param string $descriptionShort
     *
     * @return Project
     */
    public function setDescriptionShort($descriptionShort)
    {
        $this->descriptionShort = $descriptionShort;

        return $this;
    }

    /**
     * Get descriptionShort
     *
     * @return string
     */
    public function getDescriptionShort()
    {
        return $this->descriptionShort;
    }

    /**
     * Set descriptionStatus
     *
     * @param boolean $descriptionStatus
     *
     * @return Project
     */
    public function setDescriptionStatus($descriptionStatus)
    {
        $this->descriptionStatus = $descriptionStatus;

        return $this;
    }

    /**
     * Get descriptionStatus
     *
     * @return bool
     */
    public function getDescriptionStatus()
    {
        return $this->descriptionStatus;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Project
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Project
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return Project
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Project
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set directLink
     *
     * @param string $directLink
     *
     * @return Project
     */
    public function setDirectLink($directLink)
    {
        $this->directLink = $directLink;

        return $this;
    }

    /**
     * Get directLink
     *
     * @return string
     */
    public function getDirectLink()
    {
        return $this->directLink;
    }

    /**
     * Set shareSocialLinksStatus
     *
     * @param boolean $shareSocialLinksStatus
     *
     * @return Project
     */
    public function setShareSocialLinksStatus($shareSocialLinksStatus)
    {
        $this->shareSocialLinksStatus = $shareSocialLinksStatus;

        return $this;
    }

    /**
     * Get shareSocialLinksStatus
     *
     * @return bool
     */
    public function getShareSocialLinksStatus()
    {
        return $this->shareSocialLinksStatus;
    }

    /**
     * Set comsStatus
     *
     * @param boolean $comsStatus
     *
     * @return Project
     */
    public function setComsStatus($comsStatus)
    {
        $this->comsStatus = $comsStatus;

        return $this;
    }

    /**
     * Get comsStatus
     *
     * @return bool
     */
    public function getComsStatus()
    {
        return $this->comsStatus;
    }

    /**
     * Set featured
     *
     * @param boolean $featured
     *
     * @return Project
     */
    public function setFeatured($featured)
    {
        $this->featured = $featured;

        return $this;
    }

    /**
     * Get featured
     *
     * @return bool
     */
    public function getFeatured()
    {
        return $this->featured;
    }

    /**
     * Set displayName
     *
     * @param boolean $displayName
     *
     * @return Project
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * Get displayName
     *
     * @return bool
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Set isEnabled
     *
     * @param boolean $isEnabled
     *
     * @return Project
     */
    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;

        return $this;
    }

    /**
     * Get isEnabled
     *
     * @return bool
     */
    public function getIsEnabled()
    {
        return $this->isEnabled;
    }
}

