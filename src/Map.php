<?php


namespace TripleI\taxi;

class Map
{

    const ENRAI = 'enrai';
    const TANSU = 'tansu';

    private $dist = [
        'AB' => [1090, self::ENRAI],
        'AC' => [180, self::ENRAI],
        'AD' => [540, self::TANSU],
        'BC' => [960, self::ENRAI],
        'BG' => [1270, self::ENRAI],
        'CD' => [400, self::TANSU],
        'CF' => [200, self::ENRAI],
        'DE' => [720, self::TANSU],
        'DF' => [510, self::TANSU],
        'EG' => [1050, self::TANSU],
        'FG' => [230, self::TANSU]
    ];

    private $city = [
        'A' => self::ENRAI,
        'B' => self::ENRAI,
        'C' => self::ENRAI,
        'D' => self::TANSU,
        'E' => self::TANSU,
        'F' => self::TANSU,
        'G' => self::TANSU,
    ];


    public function getCityName($route)
    {
        return $this->city[substr($route, 0, 1)];
    }


    public function getDistance($route)
    {
        return $this->dist[$route];
    }


}

