<?php


namespace TripleI\taxi;

use TripleI\taxi\Meter;

class App
{

    public function execute ($stdin)
    {
        $meter = new Meter();

        $i = 0;
        for ($i = 0; $i < (strlen($stdin) - 1); $i++) {
            $route = substr($stdin, $i, 2);
            $meter->add($route);
        }

        return $meter->payoff();
    }
}

