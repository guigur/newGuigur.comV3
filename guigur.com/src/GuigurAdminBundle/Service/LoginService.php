<?php
/**
 * Created by PhpStorm.
 * User: guigur
 * Date: 02/10/2018
 * Time: 06:13
 */

namespace GuigurAdminBundle\Service;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpFoundation\RequestStack;

class LoginService
{
    private $doctrine;

    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * Return an array with dates and number of visits
     * The default number of days is 7
     * param int $days
     * return array
     */
    public function loginDays($days = 7)
    {
        $date = (new \DateTime('now -'. $days .' days'))->modify('midnight')->format('Y-m-d H:i:s');
        $LoginDays = $this->doctrine
            ->getManager()
            ->createQuery('SELECT e FROM GuigurFrontBundle:Login e WHERE e.datetime >= \''.$date.'\' AND e.datetime < CURRENT_DATE()')
            ->getResult();
        $countLoginDays = array();
        for ($i = $days; $i >= 1 ; $i--) {
            $countLoginDay = array();

            $day = (new \DateTime('now -'. $i .' days'))->format('Y-m-d');

            $count = 0;
            foreach ($LoginDays as $LoginDay)
            {
                if ($LoginDay->getDatetime()->format('Y-m-d') == $day)
                    $count++;
            }
            $countLoginDay['date'] = $day;
            $countLoginDay['login'] = $count;

            array_push($countLoginDays, $countLoginDay);

        }
        return $countLoginDays;
    }

    private function colorIcon($newStuff, $oldStuff)
    {
        if ($newStuff > $oldStuff)
            $icon = "fas fa-arrow-alt-circle-up text-success";
        else if ($newStuff < $oldStuff)
            $icon = "fas fa-arrow-alt-circle-down text-danger";
        else
            $icon = "fas fa-equals text-warning";

        return $icon;
    }

    /**
     * Generate stats based on visitors
     * return array
     */
    public function loginStats()
    {
        $loginTotal = $this->doctrine
            ->getManager()
            ->createQuery('SELECT COUNT(e) FROM GuigurFrontBundle:Login e')
            ->getResult();

        $datetime24h = (new \DateTime('now -'. 24 .' hours'))->format('Y-m-d H:i:s');
        $login24h = $this->doctrine
            ->getManager()
            ->createQuery('SELECT COUNT(e) FROM GuigurFrontBundle:Login e WHERE e.datetime >= \''.$datetime24h.'\' AND e.datetime < CURRENT_DATE()')
            ->getResult();
        $login24h = intval($login24h[0][1]);

        $datetime24hPast = (new \DateTime($datetime24h.' -'. 24 .' hours'))->format('Y-m-d H:i:s');
        $login24hPast = $this->doctrine
            ->getManager()
            ->createQuery('SELECT COUNT(e) FROM GuigurFrontBundle:Login e WHERE e.datetime >= \''.$datetime24hPast.'\' AND e.datetime < \''.$datetime24h.'\'')
            ->getResult();
        $login24hPast = intval($login24hPast[0][1]);


        $date7days = (new \DateTime('now -'. 7 .' days'))->modify('midnight')->format('Y-m-d H:i:s');
        $login7days = $this->doctrine
            ->getManager()
            ->createQuery('SELECT COUNT(e) FROM GuigurFrontBundle:Login e  WHERE e.datetime >= \''.$date7days.'\' AND e.datetime < CURRENT_DATE()')
            ->getResult();
        $login7days = intval($login7days[0][1]);

        $date7daysPast = (new \DateTime($date7days.' -'. 7 .' days'))->modify('midnight')->format('Y-m-d H:i:s');
        $login7daysPast = $this->doctrine
            ->getManager()
            ->createQuery('SELECT COUNT(e) FROM GuigurFrontBundle:Login e  WHERE e.datetime >= \''.$date7daysPast.'\' AND e.datetime < \''.$date7days.'\'')
            ->getResult();
        $login7daysPast = intval($login7daysPast[0][1]);

        $loginMoy7days = round(($login7days/7), 2);
        $loginMoy7daysPast = round(($login7daysPast/7), 2);
        return array("loginTotal" => intval($loginTotal[0][1]),
            "login24h" => $login24h, "login24hPast" => $login24hPast, "login24hIcon" => $this->colorIcon($login24h, $login24hPast),
            "login7days" => $login7days,"login7daysPast" => $login7daysPast, "login7daysIcon" => $this->colorIcon($login7days, $login7daysPast),
            "loginMoy7days" => $loginMoy7days, "loginMoy7daysPast" => $loginMoy7daysPast, "loginMoy7daysIcon" => $this->colorIcon($loginMoy7days, $loginMoy7daysPast));
    }
}