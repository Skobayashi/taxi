<?php


namespace TripleI\taxi;

use TripleI\taxi\Map;

class Meter
{

    private $amount = 0;

    private $dist_meter = 0;

    private $count = 200;

    private $fee = [
        Map::ENRAI => 60,
        Map::TANSU => 50
    ];

    private $is_base_fee = true;

    private $base_fee = [
        Map::ENRAI => [995, 400],
        Map::TANSU => [845, 350]
    ];

    private $route;

    private $map;


    public function __construct()
    {
        $this->map = new Map();
    }


    public function add($route)
    {
        $this->route = $route;

        if ($this->is_base_fee === true) {
            $this->_setBaseFare();
        }

        $this->_formatRoute();
        $this->_calculate();
    }


    public function payoff()
    {
        return $this->amount;
    }


    private function _formatRoute()
    {
        $route = str_split($this->route);
        sort($route);
        $this->route = implode($route);
    }


    private function _setBaseFare()
    {
        $this->is_base_fee = false;

        $city = $this->map->getCityName($this->route);
        $base_fee = $this->base_fee[$city];

        $this->amount = $base_fee[1];
        $this->dist_meter -= ($base_fee[0] - $this->count);
    }


    private function _calculate()
    {
        $fee  = $this->_getFee($this->route);
        $dist = $this->map->getDistance($this->route)[0];

        $this->dist_meter += $dist;

        while ($this->count < $this->dist_meter) {
            $this->dist_meter -= $this->count;
            $this->amount += $fee;
        }
    }


    private function _getFee()
    {
        $dist = $this->map->getDistance($this->route);
        return $this->fee[$dist[1]];
    }
}

