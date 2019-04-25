<?php

namespace GuigurFrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * cvContent
 *
 * @ORM\Table(name="cv_content")
 * @ORM\Entity(repositoryClass="GuigurFrontBundle\Repository\cvContentRepository")
 */
class cvContent
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
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="pot", type="string", length=255)
     */
    private $pot;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=100000)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="skills", type="string", length=100000)
     */
    private $skills;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var bool
     *
     * @ORM\Column(name="isPublic", type="boolean")
     */
    private $isPublic;


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
     * Set title
     *
     * @param string $title
     *
     * @return cvContent
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set pot
     *
     * @param string $pot
     *
     * @return cvContent
     */
    public function setPot($pot)
    {
        $this->pot = $pot;

        return $this;
    }

    /**
     * Get pot
     *
     * @return string
     */
    public function getPot()
    {
        return $this->pot;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return cvContent
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
     * Set skills
     *
     * @param string $skills
     *
     * @return cvContent
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;

        return $this;
    }

    /**
     * Get skills
     *
     * @return string
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return cvContent
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set isPublic
     *
     * @param boolean $isPublic
     *
     * @return cvContent
     */
    public function setIsPublic($isPublic)
    {
        $this->isPublic = $isPublic;

        return $this;
    }

    /**
     * Get isPublic
     *
     * @return bool
     */
    public function getIsPublic()
    {
        return $this->isPublic;
    }
}

