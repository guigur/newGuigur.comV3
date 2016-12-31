<?php

namespace BlogGuigurFrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joke
 *
 * @ORM\Table(name="joke")
 * @ORM\Entity(repositoryClass="BlogGuigurFrontEndBundle\Repository\JokeRepository")
 */
class Joke
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
     * @ORM\Column(name="joke", type="string", length=255, unique=true)
     */
    private $joke;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetimetz")
     */
    private $datetime;

    /**
     * @var string
     *
     * @ORM\Column(name="answer", type="string", length=255)
     */
    private $answer;


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
     * Set joke
     *
     * @param string $joke
     *
     * @return Joke
     */
    public function setJoke($joke)
    {
        $this->joke = $joke;

        return $this;
    }

    /**
     * Get joke
     *
     * @return string
     */
    public function getJoke()
    {
        return $this->joke;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Joke
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
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return Joke
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
     * Set answer
     *
     * @param string $answer
     *
     * @return Joke
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return string
     */
    public function getAnswer()
    {
        return $this->answer;
    }
}

