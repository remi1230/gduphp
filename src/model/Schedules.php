<?php
$baseDir = __DIR__ . '/../';
require $baseDir . '/../src/services/Database.php';

class Schedule
{
    private $dayOfWeek;
    private $openTime;
    private $closeTime;

    // Constants for the days of the week
    const DAYS_OF_WEEK = [
        'Lundi',
        'Mardi',
        'Mercredi',
        'Jeudi',
        'Vendredi',
        'Samedi',
        'Dimanche'
    ];

    // Getter and setter for dayOfWeek
    public function getDayOfWeek()
    {
        return $this->dayOfWeek;
    }

    public function setDayOfWeek($dayOfWeek)
    {
        if (!in_array($dayOfWeek, self::DAYS_OF_WEEK)) {
            throw new InvalidArgumentException("Invalid day of week: $dayOfWeek");
        }
        $this->dayOfWeek = $dayOfWeek;
    }

    // Getter and setter for openTime
    public function getOpenTime()
    {
        return $this->openTime;
    }

    public function setOpenTime(DateTime $openTime)
    {
        $this->openTime = $openTime;
    }

    // Getter and setter for closeTime
    public function getCloseTime()
    {
        return $this->closeTime;
    }

    public function setCloseTime(DateTime $closeTime)
    {
        $this->closeTime = $closeTime;
    }
}
