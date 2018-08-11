<?php

namespace GuigurFrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectsCategories
 *
 * @ORM\Table(name="projects_categories")
 * @ORM\Entity(repositoryClass="GuigurFrontBundle\Repository\ProjectsCategoriesRepository")
 */
class ProjectsCategories
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
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="GuigurFrontBundle\Entity\Project", cascade={"detach"}, fetch="LAZY")
     */
    private $project;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="GuigurFrontBundle\Entity\Categories", cascade={"detach"}, fetch="LAZY")
     */
    private $category;


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
     * Set project
     *
     * @param integer $project
     *
     * @return ProjectsCategories
     */
    public function setProject($project)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return int
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set category
     *
     * @param integer $category
     *
     * @return ProjectsCategories
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return int
     */
    public function getCategory()
    {
        return $this->category;
    }
}

