<?php namespace App\Modules\Website\Controllers;

helper('common');
class Api extends BaseController
{
	//chart api function satart
	public function config()
	{
		$resolution = supported_resolutions();
		$test = array(
			"supports_search" => true,
			"supports_group_request" => false,
			"supports_marks" => true,
			"supports_timescale_marks" => true,
			"supports_time" => true,
			"exchanges" => [array(
				"value" => "",
				"name" => "",
				"desc" => ""
			) ],
            "supported_resolutions" => $resolution,//[1,5,15,60,240,"1D","W"],
		);

		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($test, JSON_UNESCAPED_UNICODE);
		exit;

	}

	public function symbols()
	{

		$settings =  $this->db->table('setting')->select('time_zone')->get()->getRow();
		$symbol   = $this->request->getGet('symbol', FILTER_SANITIZE_STRING);
		$resolution = supported_resolutions();
		$data = array(
			"name"            => $symbol?$symbol:"LEZ_USDT", //this symbol are show in chart and pass as a paramiter
			"exchange-listed" => "",
			"exchange-traded" => "",
			// "currency-code" => "",
			// "unit-id"      => "",
			"ticker"          => $symbol?$symbol:"LEZ_USDT",
			// "original-currency-code" => "",
			// "original-unit-id" => "",
			// "unit-conversion-types" => "",
			"description"     => "",
            "has_intraday"    => true,
			"has_no_volume"   => false,
			// "visible-plots-set" => "",
			"minmov"          => 1,
			"minmov2"         => 0,
			// "fractional" => "",
			"pricescale"      => 1000000,
			"type"            => "stock",
			// "session-regular" => "",
			// "session-holidays" => "",
			// "corrections" => "",
			"timezone"        => $settings->time_zone,
			"supported_resolutions" => $resolution,
			// "has-daily" => "",
			// "intraday-multipliers" => "",
			// "has-weekly-and-monthly" => "",
			// "has-empty-bars" => "",
			// "volume-precision" => "",

			"pointvalue"      => 1,
			"session"         => "0100-2359:1234567",
		);
	
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
		exit;
	}

	private function getPair()
	{
		return $this->market_symbol;
	}

	public function search()
	{

		$limit =  $this->request->getGet('limit');

		$data = array();
		$symbol       = [];
		$full_name    = [];
		$description  = [];
		$exchange     = [];
		$type         = [];

		$coin_pairs   = $this->common_model->get_all('dbt_coinpair', array('status' => 1),  'order','asc', 0, $limit);


		foreach ($coin_pairs as $key => $value) {

			$symbol      = $value->symbol;
			$full_name   = $value->symbol;
			$description = "Pair";
			$exchange    = "Exchange";
			$type        = $value->currency_symbol;

			$data2 = ['symbol' => $symbol, 'full_name' => $full_name, 'description' => $description, 'exchange' => $exchange, 'type' => $type];

			array_push($data, $data2);
		}

		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
		exit;

	}

	public function time()
	{
		$data = array();
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
		exit;
	}

	public function symbol_info()
	{

		$settings =  $this->db->table('setting')->select('time_zone')->get()->getRow();

		$data = array (
			'exchange-listed'=>"",
			'exchange-traded'=>"",
			// "currency-code" => "",
			// "unit-id" => "",
			'ticker'=>["BTC~USDT","BTC~LTC","BTC~ETH"],
			// "original-currency-code" => "",
			// "original-unit-id" => "",
			// "unit-conversion-types" => "",
			'description'=>["btc","USDT","ETH"],
			'has-intraday'=>true,
			'has-no-volume'=>[false,false,true],
			// "visible-plots-set" => "",
			'minmov'=>1,
			'minmov2'=>0,
			// "fractional" => "",
			'pricescale'=>[1,1,100000],
			'type'=>["stock","stock","stock"],
			'session-regular'=>"0100-2359:1234567",
			// "session-holidays" => "",
			// "corrections" => "",
			'timezone'=>$settings->time_zone,
			// "supported_resolutions" => [1, 5, 15, 60, '4h', '1d'],
			// "has-daily" => "",
			// "intraday-multipliers" => "",
			// "has-weekly-and-monthly" => "",
			// "has-empty-bars" => "",
			// "volume-precision" => "",

			// 'symbol' => ["BTC","USDT","ETH"],	?
			// 'pointvalue'=>1,	?
			// 'has-dwm'=>true,	?
			// 'session-premarket'=>"0100-2359:1234567",	?
			// 'session-postmarket'=>"0100-2359:1234567"	?
        );
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }

    public function history()
    {

      	$market_symbol = $this->request->getGet('symbol', FILTER_SANITIZE_STRING);
		$resolution = $this->request->getGet('resolution', FILTER_SANITIZE_STRING);
		$minutes = intval($resolution);
		if ($minutes == 0) $minutes = 1;
		switch (strtoupper(substr($resolution, -1))) {
			case 'Y': $minutes *= 52;
			case 'M': $minutes *= 4;
			case 'W': $minutes *= 7;
			case 'D': $minutes *= 24;
			case 'H': $minutes *= 60;
		}
		$minutes *= 60;
		$from          = $this->request->getGet('from', FILTER_SANITIZE_STRING);
		$to            = $this->request->getGet('to', FILTER_SANITIZE_STRING);

		$sql_1 = "SELECT UNIX_TIMESTAMP(`date`) as unix_time, `date`,
				(SELECT `last_price` FROM dbt_coinhistory WHERE `date` = MIN(p.`date`) LIMIT 1) as `open`,
				MAX(last_price) as high, MIN(last_price) as low,
				(SELECT `last_price` FROM dbt_coinhistory WHERE `date` = MAX(p.`date`) LIMIT 1) as `close`,
				SUM(total_coin_supply) as volume
			FROM dbt_coinhistory p
			WHERE market_symbol='$market_symbol' AND UNIX_TIMESTAMP(`date`) BETWEEN '$from' AND '$to'
			GROUP BY (FLOOR(UNIX_TIMESTAMP(`date`)/$minutes))
			ORDER BY `date`";
		$sql_2 = "SELECT `date`,
				SUBSTRING_INDEX(GROUP_CONCAT(last_price ORDER BY date),',',1) as `open`,
				MAX(last_price) as high, MIN(last_price) as low,
				SUBSTRING_INDEX(GROUP_CONCAT(last_price ORDER BY date DESC),',',1) as `close`,
				SUM(total_coin_supply) as volume
			FROM dbt_coinhistory p
			WHERE market_symbol='$market_symbol' AND `date` BETWEEN '$from' AND '$to'
			GROUP BY (FLOOR(UNIX_TIMESTAMP(`date`)/$minutes))
			ORDER BY `date`";
		$sql = $sql_1;
		$coinhistory   = $this->db->query($sql)->getResult();     

		$id       = [];
		$time     = [];
		$open     = [];
		$high     = [];
		$low      = [];
		$close    = [];
		$volume   = [];
		$datetime = [];

		foreach ($coinhistory as $key => $value) {

			array_push($datetime, $value->date);
			
			array_push($time, $value->unix_time);
			array_push($open, $value->open);
			array_push($high, $value->high);
			array_push($low, $value->low);
			array_push($close, $value->close);
			array_push($volume,  $value->volume);
		}
		// if ($time) {
			$generatedArray = ['t' => $time,
				'o' => $open, 'h' => $high, 'l' => $low, 'c' => $close, 'v' => $volume,
				's' => "ok",
				];
		// } else {
		// 	$now = strtotime(date('Y-m-d H:i:s'));
		// 	$nextTime = $now;
		// 	$generatedArray = ['s' => 'no_data',];
		// 	// $generatedArray = ['s' => 'no_data', 'nextTime' => $nextTime];
		// }
		if (env('DEVELOPMENT_MODE')) {
			$generatedArray['u'] = [date('Y-m-d H:i:s', $from), date('Y-m-d H:i:s', $to)];
			$generatedArray['w'] = [$from, $to];
			$generatedArray['x'] = $datetime;
			$generatedArray['y'] = [$minutes, $market_symbol];
			$generatedArray['z'] = [$sql];
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($generatedArray, JSON_UNESCAPED_UNICODE);
		exit;
    }

	

	public function quotes()
	{
		$data = array();

		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
		exit;
	}

	public function marks()
	{

		$data = [];

		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
		exit;

	}

	public function timescale_marks()
	{

		$data = [];

		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
		exit;
	}
	//chart api function end
}

