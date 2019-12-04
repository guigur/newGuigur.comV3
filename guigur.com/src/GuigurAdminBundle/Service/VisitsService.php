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

class VisitsService
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
    public function visitsDays($days = 7)
    {
        $date = (new \DateTime('now -'. $days .' days'))->modify('midnight')->format('Y-m-d H:i:s');
        $visitsDays = $this->doctrine
            ->getManager()
            ->createQuery('SELECT e FROM GuigurFrontBundle:Visits e WHERE e.datetime >= \''.$date.'\' AND e.datetime < CURRENT_DATE()')
            ->getResult();
        $countVisitsDays = array();
        for ($i = $days; $i >= 1 ; $i--) {
            $countVisitsDay = array();

            $day = (new \DateTime('now -'. $i .' days'))->format('Y-m-d');

            $count = 0;
            foreach ($visitsDays as $visitsDay)
            {
                if ($visitsDay->getDatetime()->format('Y-m-d') == $day)
                    $count++;
            }
            $countVisitsDay['date'] = $day;
            $countVisitsDay['visits'] = $count;

            array_push($countVisitsDays, $countVisitsDay);

        }
        return $countVisitsDays;
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
    public function visitsStats()
    {
        $visitsTotal = $this->doctrine
            ->getManager()
            ->createQuery('SELECT COUNT(e) FROM GuigurFrontBundle:Visits e')
            ->getResult();


        $datetime24h = (new \DateTime('now -'. 24 .' hours'))->format('Y-m-d H:i:s');
        $visits24h = $this->doctrine
            ->getManager()
            ->createQuery('SELECT COUNT(e) FROM GuigurFrontBundle:Visits e WHERE e.datetime >= \''.$datetime24h.'\' AND e.datetime < CURRENT_DATE()')
            ->getResult();
        $visits24h = intval($visits24h[0][1]);

        $datetime24hPast = (new \DateTime($datetime24h.' -'. 24 .' hours'))->format('Y-m-d H:i:s');
        $visits24hPast = $this->doctrine
            ->getManager()
            ->createQuery('SELECT COUNT(e) FROM GuigurFrontBundle:Visits e WHERE e.datetime >= \''.$datetime24hPast.'\' AND e.datetime < \''.$datetime24h.'\'')
            ->getResult();
        $visits24hPast = intval($visits24hPast[0][1]);


        $date7days = (new \DateTime('now -'. 7 .' days'))->modify('midnight')->format('Y-m-d H:i:s');
        $visits7days = $this->doctrine
            ->getManager()
            ->createQuery('SELECT COUNT(e) FROM GuigurFrontBundle:Visits e  WHERE e.datetime >= \''.$date7days.'\' AND e.datetime < CURRENT_DATE()')
            ->getResult();
        $visits7days = intval($visits7days[0][1]);

        $date7daysPast = (new \DateTime($date7days.' -'. 7 .' days'))->modify('midnight')->format('Y-m-d H:i:s');
        $visits7daysPast = $this->doctrine
            ->getManager()
            ->createQuery('SELECT COUNT(e) FROM GuigurFrontBundle:Visits e  WHERE e.datetime >= \''.$date7daysPast.'\' AND e.datetime < \''.$date7days.'\'')
            ->getResult();
        $visits7daysPast = intval($visits7daysPast[0][1]);

        $visitsMoy7days = round(($visits7days/7), 2);
        $visitsMoy7daysPast = round(($visits7daysPast/7), 2);
        return array("visitsTotal" => intval($visitsTotal[0][1]),
            "visits24h" => $visits24h, "visits24hPast" => $visits24hPast, "visits24hIcon" => $this->colorIcon($visits24h, $visits24hPast),
            "visits7days" => $visits7days,"visits7daysPast" => $visits7daysPast, "visits7daysIcon" => $this->colorIcon($visits7days, $visits7daysPast),
            "visitsMoy7days" => $visitsMoy7days, "visitsMoy7daysPast" => $visitsMoy7daysPast, "visitsMoy7daysIcon" => $this->colorIcon($visitsMoy7days, $visitsMoy7daysPast));
    }
}