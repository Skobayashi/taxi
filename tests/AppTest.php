<?php


use TripleI\taxi\App;

class AppTest extends \PHPUnit_Framework_TestCase
{

    private $app;


    public function setUp ()
    {
        $this->app = new App();
    }


    /**
     * @test
     * @group app-test1
     **/
    public function 単体のテスト ()
    {
        $data = $this->_getTestData(1);

        $result = $this->app->execute($data[0][1]);
        $this->assertEquals($result, $data[0][2]);
    }


    /**
     * @test
     * @group app-test2
     **/
    public function 全体のテスト ()
    {
        $data = $this->_getTestData();
        foreach ($data as $d) {
            $result = $this->app->execute($d[1]);
            $this->assertEquals($result, $d[2]);
        }
    }


    private function _getTestData ($row = null)
    {
        $test_data = [];
        $test_data_path = __DIR__.'/../data/data.csv';

        $i = 1;
        $fp = @fopen($test_data_path, 'r');
        while ($data = fgetcsv($fp, 1000, ',')) {
            if ($i == $row || $row === null) {
                $test_data[] = $data;
            }
            $i++;
        }
        fclose($fp);

        return $test_data;
    }
}

