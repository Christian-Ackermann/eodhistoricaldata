<?php

namespace RadicalLoop\Eod\Api;

use RadicalLoop\Eod\Traits\Actionable;

class Exchange extends EodClient
{
    use Actionable;

    /**
     * url segment for exchange api
     *
     * @var string
     */
    protected $urlSegment = '/exchanges';

    /**
     * Return a list of supported symbols.
     *
     * @param  string $symbol The symbol of the exchange, for example "cc" -> for cryptocurrencies, "us" -> for all us tickers.
     * @param  array  $params A list of optional parameters attached to the query, for example "fmt" => "json".
     *
     * @return $this
     */
    public function symbol(string $symbol, array $params = []): Exchange
    {
        $this->urlSegment = '/exchange-symbol-list';
        $this->setParams($symbol, $params);
        return $this;
    }

    /**
     * Set Multiple Tickers api
     * url: https://eodhistoricaldata.com/knowledgebase/multiple-tickers-download/
     *
     * @param  string $symbol
     * @param  array  $params
     *
     * @return Exchange
     */
    public function multipleTicker($symbol, $params = [])
    {
        $this->urlSegment = '/eod-bulk-last-day';
        $this->setParams($symbol, $params);
        return $this;
    }

    /**
     * Get exchange details api
     * url: https://eodhistoricaldata.com/financial-apis/exchanges-api-trading-hours-and-holidays/
     *
     * @param  string $symbol
     * @param  array  $params
     *
     * @return Exchange
     */
    public function details($symbol, $params = [])
    {
        $this->urlSegment = '/exchange-details';
        $this->setParams($symbol, $params);
        return $this;
    }
}
