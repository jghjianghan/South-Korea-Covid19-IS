<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "controller/controller.php";
require_once "model/tabel.php";
require_once "model/dataAggregate.php";

class DataController extends Controller
{

    /**
     * Method untuk mengambil data nama province
     * @return array data nama provincce
     */
    public function getProvince()
    {
        $query = "SELECT DISTINCT province_name 
                            FROM `timeprovince`";

        $hasil = $this->db->executeSelectQuery($query);

        $result = [];

        foreach ($hasil as $key => $value) {
            $result[] = $value['province_name'];
        }

        return $result;
    }

    public function viewHome()
    {
        $aggregateData = $this->getAggregateOverall("", "");
        $latest = $this->getLatestDate();
        return View::createView("home.php",[
            'aggregate' => $aggregateData,
            'title' => "Corea",
            'page' => "home",
            'role' => "visitor",
            'date' => $latest
        ]);
    }

    public function viewDataOverall()
    {
        return View::createView("dataOverall.php", [
            'title' => "Corea - Overall Data",
            'page' => "data",
            'scriptSrcList' => ['DailyData.js', 'caseChart.js', 'caseTable.js', 'caseAggregate.js', 'dataOverallManager.js'],
            'role' => "visitor"
        ]);
    }



    public function viewDataRegional()
    {
        $provinces = $this->getProvince();
        return View::createView("dataRegional.php", [
            'title' => "Corea - Regional Data",
            'page' => "data",
            'scriptSrcList' => ['DailyData.js', 'caseChart.js', 'caseTable.js', 'caseAggregate.js', 'dataRegionalManager.js'],
            'role' => "visitor",
            'provinces' => $provinces
        ]);
    }

    public function viewAbout()
    {
        return View::createView("about.php", [
            'title' => "Corea - About",
            'page' => "about",
            'role' => "visitor"
        ]);
    }

    public function getAggregateOverall($from, $to)
    {
        $query_base = "SELECT MAX(confirmed) as 'tC', MAX(test) as 'tT', MAX(negative) as 'tN', MAX(released) as 'tR',MAX(deceased) as 'tD'
                FROM time";
        if ($from != "" && $to != "") {
            $query = $query_base;
            $query .= " WHERE date <= '$to'";
            $query_result = $this->db->executeSelectQuery($query);
            $dataTotal = new DataAggregate($query_result[0]['tC'], $query_result[0]['tT'], $query_result[0]['tN'], $query_result[0]['tR'], $query_result[0]['tD']);
            $queryPrev = $query_base . " WHERE date < '$from'";
            $resultPrev = $this->db->executeSelectQuery($queryPrev);
            $dataPrev = new DataAggregate($resultPrev[0]['tC'], $resultPrev[0]['tT'], $resultPrev[0]['tN'], $resultPrev[0]['tR'], $resultPrev[0]['tD']);
            $dataTotal->subtract($dataPrev);
            return $dataTotal;
        } else if ($from == "" && $to != "") {
            $query = $query_base . " WHERE date <= '$to'";
            $query_result = $this->db->executeSelectQuery($query);
            return new DataAggregate($query_result[0]['tC'], $query_result[0]['tT'], $query_result[0]['tN'], $query_result[0]['tR'], $query_result[0]['tD']);
        } else if ($from != "" && $to == "") {
            $query_result = $this->db->executeSelectQuery($query_base);
            $dataTotal = new DataAggregate($query_result[0]['tC'], $query_result[0]['tT'], $query_result[0]['tN'], $query_result[0]['tR'], $query_result[0]['tD']);
            $queryPrev = $query_base . " WHERE date < '$from'";
            $resultPrev = $this->db->executeSelectQuery($queryPrev);
            $dataPrev = new DataAggregate($resultPrev[0]['tC'], $resultPrev[0]['tT'], $resultPrev[0]['tN'], $resultPrev[0]['tR'], $resultPrev[0]['tD']);
            $dataTotal->subtract($dataPrev);
            return $dataTotal;
        } else { //2-2nya kosong
            $query_result = $this->db->executeSelectQuery($query_base);
            return new DataAggregate($query_result[0]['tC'], $query_result[0]['tT'], $query_result[0]['tN'], $query_result[0]['tR'], $query_result[0]['tD']);
        }
    }

    public function getAggregateRegional($region, $from, $to)
    {
        $query_base = "SELECT MAX(confirmed) as 'tC', MAX(released) as 'tR',MAX(deceased) as 'tD'
                FROM timeprovince
                WHERE province_name = '$region'";

        if ($from != "" && $to != "") {
            $query = $query_base;
            $query .= " AND date <= '$to'";
            $query_result = $this->db->executeSelectQuery($query);
            $dataTotal = new DataAggregate($query_result[0]['tC'], null, null, $query_result[0]['tR'], $query_result[0]['tD']);
            $queryPrev = $query_base . " AND date < '$from'";
            $resultPrev = $this->db->executeSelectQuery($queryPrev);
            $dataPrev = new DataAggregate($resultPrev[0]['tC'], null, null, $resultPrev[0]['tR'], $resultPrev[0]['tD']);
            $dataTotal->subtract($dataPrev);
            return $dataTotal;
        } else if ($from == "" && $to != "") {
            $query = $query_base . " AND date <= '$to'";
            $query_result = $this->db->executeSelectQuery($query);
            return new DataAggregate($query_result[0]['tC'], null, null, $query_result[0]['tR'], $query_result[0]['tD']);
        } else if ($from != "" && $to == "") {
            $query_result = $this->db->executeSelectQuery($query_base);
            $dataTotal = new DataAggregate($query_result[0]['tC'], null, null, $query_result[0]['tR'], $query_result[0]['tD']);
            $queryPrev = $query_base . " AND date < '$from'";
            $resultPrev = $this->db->executeSelectQuery($queryPrev);
            $dataPrev = new DataAggregate($resultPrev[0]['tC'], null, null, $resultPrev[0]['tR'], $resultPrev[0]['tD']);
            $dataTotal->subtract($dataPrev);
            return $dataTotal;
        } else { //2-2nya kosong
            $query_result = $this->db->executeSelectQuery($query_base);
            return new DataAggregate($query_result[0]['tC'], null, null, $query_result[0]['tR'], $query_result[0]['tD']);
        }
    }



    /**
     * Method untuk mengambil data overall dari database
     * @return array data overall
     */
    public function getDataOverall()
    {
        $currentCase = 0;
        $query = "
                SELECT date,confirmed,released,deceased 
                FROM time
            ";
        $query_result = $this->db->executeSelectQuery($query);

        $result = [];

        foreach ($query_result as $key => $value) {
            $result[] = new Tabel($value['date'], $value['confirmed'] - $currentCase, $value['confirmed'], $value['released'], $value['deceased']);
            $currentCase = $value['confirmed'];
        }
        return $result;
    }
    /**
     * Method untuk mengambil data region dari database
     * @param string $region
     * @return array data region
     */
    public function getDataRegion($region)
    {
        $currentCase = 0;
        $query = "
                SELECT date, confirmed, released, deceased 
                FROM timeprovince 
                WHERE province_name='$region'
            ";
        $query_result = $this->db->executeSelectQuery($query);

        $result = [];

        foreach ($query_result as $key => $value) {
            $result[] = new Tabel($value['date'], $value['confirmed'] - $currentCase, $value['confirmed'], $value['released'], $value['deceased']);
            $currentCase = $value['confirmed'];
        }
        return $result;
    }
    /**
     * Method untuk mengambil data nama province
     * @return array data nama provincce
     */
    public function getAllProvince()
    {
        $query = "
                SELECT DISTINCT province_name 
                FROM timeprovince
            ";
        $query_result = $this->db->executeSelectQuery($query);

        $result = [];

        foreach ($query_result as $key => $value) {
            $result[] = $value['province_name'];
        }
        return $result;
    }
    /**
     * Method untuk mengambil data overall dengan rentang x - y
     * @param string $from
     * @param string $to
     * @return array data overall dengan rentang waktu
     */
    public function getDataOverallRange($from, $to)
    {
        $newFrom = ($from !== "") ? date("Y-m-d", strtotime($from)) : "";
        $newTo = ($to !== "") ? date("Y-m-d", strtotime($to)) : "";
        $currentCase = ($newFrom !== "") ? $this->getPrefCurrentCaseOverall($newFrom) : 0;

        $query = "";
        if ($newFrom === "" && $newTo === "") {
            return $this->getDataOverall();
        } else if ($newFrom === "") {
            $query = "
                    SELECT date,confirmed,released,deceased 
                    FROM time 
                    WHERE date <= '$newTo' 
                ";
        } else if ($newTo === "") {
            $query = "
                    SELECT date,confirmed,released,deceased 
                    FROM time 
                    WHERE date >= '$newFrom' 
                ";
        } else { //lengkap
            $query = "
                    SELECT date,confirmed,released,deceased 
                    FROM time 
                    WHERE date >= '$newFrom' AND date <= '$newTo' 
                ";
        }
        $query_result = $this->db->executeSelectQuery($query);

        $result = [];

        foreach ($query_result as $key => $value) {
            $result[] = new Tabel($value['date'], $value['confirmed'] - $currentCase, $value['confirmed'], $value['released'], $value['deceased']);
            $currentCase = $value['confirmed'];
        }
        return $result;
    }
    /**
     * Method untuk mengambil data region dengan rentang x - y
     * @param string $region
     * @param string $from
     * @param string $to
     * @return array data region dengan rentang waktu
     */
    public function getDataRegionRange($region, $from, $to)
    {
        $newFrom = ($from !== "") ? date("Y-m-d", strtotime($from)) : "";
        $newTo = ($to !== "") ? date("Y-m-d", strtotime($to)) : "";
        $currentCase = ($newFrom !== "") ? $this->getPrefCurrentCaseRegion($region, $newFrom) : 0;

        $query = "";
        if ($newFrom === "" && $newTo === "") {
            return $this->getDataRegion($region);
        } else if ($newFrom === "") {
            $query = "
                    SELECT date, confirmed, released, deceased 
                    FROM timeprovince 
                    WHERE province_name='$region' AND date <= '$newTo' 
                ";
        } else if ($newTo === "") {
            $query = "
                    SELECT date, confirmed, released, deceased 
                    FROM timeprovince 
                    WHERE province_name='$region' AND date >= '$newFrom' 
                ";
        } else { //lengkap
            $query = "
                    SELECT date, confirmed, released, deceased 
                    FROM timeprovince 
                    WHERE province_name='$region' AND date >= '$newFrom' AND date <= '$newTo' 
                ";
        }
        $query_result = $this->db->executeSelectQuery($query);

        $result = [];

        foreach ($query_result as $key => $value) {
            $result[] = new Tabel($value['date'], $value['confirmed'] - $currentCase, $value['confirmed'], $value['released'], $value['deceased']);
            $currentCase = $value['confirmed'];
        }
        return $result;
    }
    public function getPrefCurrentCaseOverall($from)
    {
        $yesterday = date('Y-m-d', strtotime($from . "-1 days"));
        $query = "
                SELECT confirmed 
                FROM time
                WHERE date = '$yesterday'
            ";
        $query_result = $this->db->executeSelectQuery($query);
        $result = [];

        foreach ($query_result as $key => $value) {
            $result[] = $value['confirmed'];
        }
        if (empty($result)) {
            return 0;
        }
        return $result[0];
    }
    public function getPrefCurrentCaseRegion($region, $from)
    {
        $yesterday = date('Y-m-d', strtotime($from . "-1 days"));
        $query = "
                SELECT confirmed 
                FROM timeprovince
                WHERE province_name='$region' AND date = '$yesterday'
            ";
        $query_result = $this->db->executeSelectQuery($query);
        $result = [];

        foreach ($query_result as $key => $value) {
            $result[] = $value['confirmed'];
        }
        if (empty($result)) {
            return 0;
        }
        return $result[0];
    }


    /**
     * Method untuk mengambil tanggal dari data terakhir yang di-add di database
     */
    public function getLatestDate(){
        $query = "
            SELECT MAX(date) as 'Date' FROM time
        ";
        $query_result = $this->db->executeSelectQuery($query);

        return $query_result[0]['Date'];
    }
}
