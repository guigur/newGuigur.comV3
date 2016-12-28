<?php

namespace BlogGuigurFrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JokeSmileVote
 *
 * @ORM\Table(name="joke_smile_vote")
 * @ORM\Entity(repositoryClass="BlogGuigurFrontEndBundle\Repository\JokeSmileVoteRepository")
 */
class JokeSmileVote
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
     * @var \stdClass
     *
     * @ORM\Column(name="Joke", type="object")
     */
    private $joke;

    /**
     * @var float
     *
     * @ORM\Column(name="Mark", type="float")
     */
    private $mark;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetimetz")
     */
    private $datetime;

    /**
     * @var string
     *
     * @ORM\Column(name="User", type="string", length=255)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="IP", type="string", length=255)
     */
    private $iP;


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
     * @param \stdClass $joke
     *
     * @return JokeSmileVote
     */
    public function setJoke($joke)
    {
        $this->joke = $joke;

        return $this;
    }

    /**
     * Get joke
     *
     * @return \stdClass
     */
    public function getJoke()
    {
        return $this->joke;
    }

    /**
     * Set mark
     *
     * @param float $mark
     *
     * @return JokeSmileVote
     */
    public function setMark($mark)
    {
        $this->mark = $mark;

        return $this;
    }

    /**
     * Get mark
     *
     * @return float
     */
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return JokeSmileVote
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
     * Set user
     *
     * @param string $user
     *
     * @return JokeSmileVote
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set iP
     *
     * @param string $iP
     *
     * @return JokeSmileVote
     */
    public function setIP($iP)
    {
        $this->iP = $iP;

        return $this;
    }

    /**
     * Get iP
     *
     * @return string
     */
    public function getIP()
    {
        return $this->iP;
    }
}

