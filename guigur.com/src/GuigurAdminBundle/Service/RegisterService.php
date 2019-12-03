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

class RegisterService
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
    public function registerDays($days = 7)
    {
        $date = (new \DateTime('now -'. $days .' days'))->modify('midnight')->format('Y-m-d H:i:s');
        $RegisterDays = $this->doctrine
            ->getManager()
            ->createQuery('SELECT e FROM GuigurFrontBundle:User e WHERE e.registerDate >= \''.$date.'\' AND e.registerDate < CURRENT_DATE()')
            ->getResult();
        $countRegisterDays = array();
        for ($i = $days; $i >= 1 ; $i--) {
            $countRegisterDay = array();

            $day = (new \DateTime('now -'. $i .' days'))->format('Y-m-d');

            $count = 0;
            foreach ($RegisterDays as $RegisterDay)
            {
                if ($RegisterDay->getRegisterDate()->format('Y-m-d') == $day)
                    $count++;
            }
            $countRegisterDay['date'] = $day;
            $countRegisterDay['register'] = $count;

            array_push($countRegisterDays, $countRegisterDay);

        }
        return $countRegisterDays;
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
    public function registerStats()
    {
        $registerTotal = $this->doctrine
            ->getManager()
            ->createQuery('SELECT COUNT(e) FROM GuigurFrontBundle:User e')
            ->getResult();

        $datetime24h = (new \DateTime('now -'. 24 .' hours'))->format('Y-m-d H:i:s');
        $register24h = $this->doctrine
            ->getManager()
            ->createQuery('SELECT COUNT(e) FROM GuigurFrontBundle:User e WHERE e.registerDate >= \''.$datetime24h.'\' AND e.registerDate < CURRENT_DATE()')
            ->getResult();
        $register24h = intval($register24h[0][1]);

        $datetime24hPast = (new \DateTime($datetime24h.' -'. 24 .' hours'))->format('Y-m-d H:i:s');
        $register24hPast = $this->doctrine
            ->getManager()
            ->createQuery('SELECT COUNT(e) FROM GuigurFrontBundle:User e WHERE e.registerDate >= \''.$datetime24hPast.'\' AND e.registerDate < \''.$datetime24h.'\'')
            ->getResult();
        $register24hPast = intval($register24hPast[0][1]);


        $date7days = (new \DateTime('now -'. 7 .' days'))->modify('midnight')->format('Y-m-d H:i:s');
        $register7days = $this->doctrine
            ->getManager()
            ->createQuery('SELECT COUNT(e) FROM GuigurFrontBundle:User e  WHERE e.registerDate >= \''.$date7days.'\' AND e.registerDate < CURRENT_DATE()')
            ->getResult();
        $register7days = intval($register7days[0][1]);

        $date7daysPast = (new \DateTime($date7days.' -'. 7 .' days'))->modify('midnight')->format('Y-m-d H:i:s');
        $register7daysPast = $this->doctrine
            ->getManager()
            ->createQuery('SELECT COUNT(e) FROM GuigurFrontBundle:User e  WHERE e.registerDate >= \''.$date7daysPast.'\' AND e.registerDate < \''.$date7days.'\'')
            ->getResult();
        $register7daysPast = intval($register7daysPast[0][1]);

        $registerMoy7days = round(($register7days/7), 2);
        $registerMoy7daysPast = round(($register7daysPast/7), 2);
        return array("registerTotal" => intval($registerTotal[0][1]),
            "register24h" => $register24h, "register24hPast" => $register24hPast, "register24hIcon" => $this->colorIcon($register24h, $register24hPast),
            "register7days" => $register7days,"register7daysPast" => $register7daysPast, "register7daysIcon" => $this->colorIcon($register7days, $register7daysPast),
            "registerMoy7days" => $registerMoy7days, "registerMoy7daysPast" => $registerMoy7daysPast, "registerMoy7daysIcon" => $this->colorIcon($registerMoy7days, $registerMoy7daysPast));
    }
}