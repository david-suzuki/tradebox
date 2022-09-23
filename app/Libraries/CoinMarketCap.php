<?php
namespace App\Libraries;

const COINMARKETCAP_URL = "https://sandbox-api.coinmarketcap.com";
const COINMARKETCAP_URL_MAP = "/v1/cryptocurrency/map";// - CoinMarketCap ID map
const COINMARKETCAP_URL_INFO = "/v1/cryptocurrency/info";// - Metadata
const COINMARKETCAP_URL_LISTING_LATEST = "/v1/cryptocurrency/listings/latest";// - Latest listings
const COINMARKETCAP_URL_LISTING_HISTORICAL = "/v1/cryptocurrency/listings/historical";// - Historical listings
const COINMARKETCAP_URL_QUITE_LATEST = "/v1/cryptocurrency/quotes/latest";// - Latest quotes
const COINMARKETCAP_URL_QUITE_HISTORICAL = "/v1/cryptocurrency/quotes/historical";// - Historical quotes
const COINMARKETCAP_URL_PAIRS_LATEST = "/v1/cryptocurrency/market-pairs/latest";// - Latest market pairs
const COINMARKETCAP_URL_OHLCV_LATEST = "/v1/cryptocurrency/ohlcv/latest";// - Latest OHLCV
const COINMARKETCAP_URL_OHLCV_HISTORICAL = "/v1/cryptocurrency/ohlcv/historical";// - Historical OHLCV
const COINMARKETCAP_URL_PRICE_LATEST = "/v1/cryptocurrency/price-performance-stats/latest";// - Price performance Stats
const COINMARKETCAP_URL_CATEGORIES = "/v1/cryptocurrency/categories";// - Categories
const COINMARKETCAP_URL_CATEGORY = "/v1/cryptocurrency/category";// - Category
const COINMARKETCAP_URL_AIRDROPS = "/v1/cryptocurrency/airdrops";// - Airdrops
const COINMARKETCAP_URL_AIRDROP = "/v1/cryptocurrency/airdrop";// - Airdrop
const COINMARKETCAP_URL_TREND_LATEST = "/v1/cryptocurrency/trending/latest";// - Trending Latest
const COINMARKETCAP_URL_TREND_MOST = "/v1/cryptocurrency/trending/most-visited";// - Trending Most Visited
const COINMARKETCAP_URL_TREND_LOSE = "/v1/cryptocurrency/trending/gainers-losers";// - Trending Gainers & Losers

class CoinMarketCap {
        
    public function get_common($url, $parameters) {
/**
 * Requires curl enabled in php.ini
 **/

        $url = COINMARKETCAP_URL.$url;
        $headers = [
            'Accepts: application/json',
            'X-CMC_PRO_API_KEY: '.env('X_CMC_PRO_API_KEY')
        ];
        $qs = http_build_query($parameters); // query string encode the parameters
        $request = "{$url}?{$qs}"; // create the request URL


        $curl = curl_init(); // Get cURL resource
        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,            // set the request URL
            CURLOPT_HTTPHEADER => $headers,     // set the headers 
            CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));

        $response = curl_exec($curl); // Send the request, save the response
        $return = json_decode($response); // print json decoded response
        curl_close($curl); // Close request
        return $return;
    }
    
    public function cryptocurrency_map() {
        $parameters = [
            'listing_status' => 'active',//"inactive", "untracked"
            'start' => '1',
            'limit' => '5000',
            'sort' => 'id',
            'symbol' => 'USD',
            'aux' => 'platform,first_historical_data,last_historical_data,is_active',//,status
        ];
        return $this->get_common(COINMARKETCAP_URL_MAP, $parameters);
    }

    public function cryptocurrency_info() {
        $parameters = [
            'id' => '1,2',
            'slug' => 'bitcoin,ethereum',
            'symbol' => 'BTC,ETH',
            'address' => '0xc40af1e4fecfa05ce6bab79dcd8b373d2e436c4e',//>= 1
            'aux' => 'urls,logo,description,tags,platform,date_added,notice',//,status
        ];
        return $this->get_common(COINMARKETCAP_URL_INFO, $parameters);
    }

    public function cryptocurrency_listings_latest() {
        $parameters = [
            'start' => '1',
            'limit' => '5000',
            'price_min' => '0',//[ 0 .. 100000000000000000 ]
            'price_max' => '100',//[ 0 .. 100000000000000000 ]
            'market_cap_min' => '100',//[ 0 .. 100000000000000000 ]
            'market_cap_max' => '100',//[ 0 .. 100000000000000000 ]
            'volume_24h_min' => '100',//[ 0 .. 100000000000000000 ]
            'volume_24h_max' => '100',//[ 0 .. 100000000000000000 ]
            'circulating_supply_min' => '100',//[ 0 .. 100000000000000000 ]
            'circulating_supply_max' => '100',//[ 0 .. 100000000000000000 ]
            'percent_change_24h_min' => '100',//[>= -100]
            'percent_change_24h_max' => '100',//[>= -100]
            'convert' => 'USD',
            'convert_id' => 'USD',
            'sort' => 'market_cap',//"name""symbol""date_added""market_cap""market_cap_strict""price""circulating_supply""total_supply""max_supply""num_market_pairs""volume_24h""percent_change_1h""percent_change_24h""percent_change_7d""market_cap_by_total_supply_strict""volume_7d""volume_30d"
            'sort_dir' => 'asc',//desc
            'cryptocurrency_type' => 'all',//"coins""tokens"
            'tag' => 'all',//"all""defi""filesharing"
            'aux' => 'num_market_pairs,cmc_rank,date_added,tags,platform,max_supply,circulating_supply,total_supply',//,market_cap_by_total_supply,volume_24h_reported,volume_7d,volume_7d_reported,volume_30d,volume_30d_reported,is_market_cap_included_in_calc
        ];
        return $this->get_common(COINMARKETCAP_URL_LISTING_LATEST, $parameters);
    }

    public function cryptocurrency_listings_historical() {
        $parameters = [
            'date' => date('Y-m-d'),
            'start' => '1',
            'limit' => '5000',
            'convert' => 'USD',
            'convert_id' => 'USD',
            'sort' => 'cmc_rank',//"cmc_rank""name""symbol""market_cap""price""circulating_supply""total_supply""max_supply""num_market_pairs""volume_24h""percent_change_1h""percent_change_24h""percent_change_7d"
            'sort_dir' => 'asc',//desc
            'cryptocurrency_type' => 'all',//"coins""tokens"
            'aux' => 'platform,tags,date_added,circulating_supply,total_supply,max_supply,cmc_rank,num_market_pairs',//,status
        ];
        return $this->get_common(COINMARKETCAP_URL_LISTING_HISTORICAL, $parameters);
    }

    public function cryptocurrency_quotes_latest() {
        $parameters = [
            'id' => '1,2',
            'slug' => 'bitcoin,ethereum',
            'symbol' => 'BTC,ETH',
            'convert' => 'USD',
            'convert_id' => 'USD',
            'aux' => 'num_market_pairs,cmc_rank,date_added,tags,platform,max_supply,circulating_supply,total_supply,is_active,is_fiat',//,num_market_pairs,cmc_rank,date_added,tags,platform,max_supply,circulating_supply,total_supply,market_cap_by_total_supply,volume_24h_reported,volume_7d,volume_7d_reported,volume_30d,volume_30d_reported,is_active,is_fiat
            'skip_invalid' => true,//>= 1
        ];
        return $this->get_common(COINMARKETCAP_URL_QUITE_LATEST, $parameters);
    }

    public function cryptocurrency_quotes_historical() {
        $parameters = [
            'start' => '1',
            'limit' => '5000',
            'convert' => 'USD'
        ];
        return $this->get_common(COINMARKETCAP_URL_QUITE_HISTORICAL, $parameters);
    }

    public function cryptocurrency_market_pairs_latest() {
        $parameters = [
            'start' => '1',
            'limit' => '5000',
            'convert' => 'USD'
        ];
        return $this->get_common(COINMARKETCAP_URL_PAIRS_LATEST, $parameters);
    }

    public function cryptocurrency_ohlcv_latest() {
        $parameters = [
            'id' => '1,2',
            'symbol' => 'BTC,ETH',
            'convert' => 'USD',
            'convert_id' => 'USD',
            'skip_invalid' => true,//>= 1
        ];
        return $this->get_common(COINMARKETCAP_URL_OHLCV_LATEST, $parameters);
    }

    public function cryptocurrency_ohlcv_historical() {
        $parameters = [
            'start' => '1',
            'limit' => '5000',
            'convert' => 'USD'
        ];
        return $this->get_common(COINMARKETCAP_URL_OHLCV_HISTORICAL, $parameters);
    }

    public function cryptocurrency_price_performance_stats_latest() {
        $parameters = [
            'start' => '1',
            'limit' => '5000',
            'convert' => 'USD'
        ];
        return $this->get_common(COINMARKETCAP_URL_PRICE_LATEST, $parameters);
    }

    public function cryptocurrency_categories() {
        $parameters = [
            'start' => '1',//>= 1
            'limit' => '100',//[ 1 .. 5000 ]
            'id' => '1',
            'slug' => 'bitcoin',
            'symbol' => 'BTC',
        ];
        return $this->get_common(COINMARKETCAP_URL_CATEGORIES, $parameters);
    }

    public function cryptocurrency_category() {
        $parameters = [
            'id' => '1',
            'start' => '1',//>= 1
            'limit' => '100',//[ 1 .. 5000 ]
            'convert' => 'quote',
            'convert_id' => '1',
        ];
        return $this->get_common(COINMARKETCAP_URL_CATEGORY, $parameters);
    }

    public function cryptocurrency_airdrops() {
        $parameters = [
            'start' => '1',//>= 1
            'limit' => '100',//[ 1 .. 5000 ]
            'id' => '1',
            'status' => 'ONGOING',//"ENDED""ONGOING""UPCOMING"
            'slug' => 'bitcoin',
            'symbol' => 'BTC',
        ];
        return $this->get_common(COINMARKETCAP_URL_AIRDROPS, $parameters);
    }

    public function cryptocurrency_airdrop() {
        $parameters = [
            'id' => '1',
        ];
        return $this->get_common(COINMARKETCAP_URL_AIRDROP, $parameters);
    }

    public function cryptocurrency_trending_gainers_losers() {
        $parameters = [
            'start' => '1',
            'limit' => '5000',
            'convert' => 'USD'
        ];
        return $this->get_common(COINMARKETCAP_URL_TREND_LOSE, $parameters);
    }

    public function cryptocurrency_trending_latest() {
        $parameters = [
            'start' => '1',
            'limit' => '5000',
            'convert' => 'USD'
        ];
        return $this->get_common(COINMARKETCAP_URL_TREND_LATEST, $parameters);
    }

    public function cryptocurrency_trending_most_visited() {
        $parameters = [
            'start' => '1',
            'limit' => '5000',
            'convert' => 'USD'
        ];
        return $this->get_common(COINMARKETCAP_URL_TREND_MOST, $parameters);
    }

}