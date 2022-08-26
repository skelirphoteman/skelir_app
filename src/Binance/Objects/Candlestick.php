<?php


namespace App\Binance\Objects;


class Candlestick
{
    /** @var \DateTime */
    private $openTime;

    /** @var flaot */
    private $openPrice;

    /** @var flaot */
    private $highPrice;

    /** @var flaot */
    private $lowPrice;

    /** @var flaot */
    private $closePrice;

    /** @var flaot */
    private $volume;

    /** @var \DateTime */
    private $closeTime;

    /** @var flaot */
    private $quoteAssetTime;

    /** @var int */
    private $numberOfTrades;

    /** @var flaot */
    private $takerBuyBaseAssetVolume;

    /** @var flaot */
    private $takerBuyQuoteAssetVolume;

    /** @var int */
    private $unusedFiled;


    public function __construct
    (
        array  $datas = null
    )
    {
        if($datas){
            $this->generateFromBinanceArray($datas);
        }
    }

    private function generateFromBinanceArray(array $datas)
    {
        $this->openTime                     = (new \DateTime())->setTimestamp($datas[0]);
        $this->openPrice                    = $datas[1];
        $this->highPrice                    = $datas[2];
        $this->lowPrice                     = $datas[3];
        $this->closePrice                   = $datas[4];
        $this->volume                       = $datas[5];
        $this->closeTime                    = (new \DateTime())->setTimestamp($datas[6]);
        $this->quoteAssetTime               = $datas[7];
        $this->numberOfTrades               = $datas[8];
        $this->takerBuyBaseAssetVolume      = $datas[9];
        $this->takerBuyQuoteAssetVolume     = $datas[10];
        $this->unusedFiled                  = $datas[11];

    }

    /**
     * @return \DateTime
     */
    public function getOpenTime()
    {
        return $this->openTime;
    }

    /**
     * @param \DateTime $openTime
     */
    public function setOpenTime($openTime)
    {
        $this->openTime = $openTime;
    }

    /**
     * @return flaot
     */
    public function getOpenPrice()
    {
        return $this->openPrice;
    }

    /**
     * @param flaot $openPrice
     */
    public function setOpenPrice($openPrice)
    {
        $this->openPrice = $openPrice;
    }

    /**
     * @return flaot
     */
    public function getHighPrice()
    {
        return $this->highPrice;
    }

    /**
     * @param flaot $highPrice
     */
    public function setHighPrice($highPrice)
    {
        $this->highPrice = $highPrice;
    }

    /**
     * @return flaot
     */
    public function getLowPrice()
    {
        return $this->lowPrice;
    }

    /**
     * @param flaot $lowPrice
     */
    public function setLowPrice($lowPrice)
    {
        $this->lowPrice = $lowPrice;
    }

    /**
     * @return flaot
     */
    public function getClosePrice()
    {
        return $this->closePrice;
    }

    /**
     * @param flaot $ClosePrice
     */
    public function setClosePrice($ClosePrice)
    {
        $this->closePrice = $ClosePrice;
    }

    /**
     * @return flaot
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param flaot $volume
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
    }

    /**
     * @return \DateTime
     */
    public function getCloseTime()
    {
        return $this->closeTime;
    }

    /**
     * @param \DateTime $closeTime
     */
    public function setCloseTime($closeTime)
    {
        $this->closeTime = $closeTime;
    }

    /**
     * @return flaot
     */
    public function getQuoteAssetTime()
    {
        return $this->quoteAssetTime;
    }

    /**
     * @param flaot $quoteAssetTime
     */
    public function setQuoteAssetTime($quoteAssetTime)
    {
        $this->quoteAssetTime = $quoteAssetTime;
    }

    /**
     * @return int
     */
    public function getNumberOfTrades()
    {
        return $this->numberOfTrades;
    }

    /**
     * @param int $numberOfTrades
     */
    public function setNumberOfTrades($numberOfTrades)
    {
        $this->numberOfTrades = $numberOfTrades;
    }

    /**
     * @return flaot
     */
    public function getTakerBuyBaseAssetVolume()
    {
        return $this->takerBuyBaseAssetVolume;
    }

    /**
     * @param flaot $takerBuyBaseAssetVolume
     */
    public function setTakerBuyBaseAssetVolume($takerBuyBaseAssetVolume)
    {
        $this->takerBuyBaseAssetVolume = $takerBuyBaseAssetVolume;
    }

    /**
     * @return flaot
     */
    public function getTakerBuyQuoteAssetVolume()
    {
        return $this->takerBuyQuoteAssetVolume;
    }

    /**
     * @param flaot $takerBuyQuoteAssetVolume
     */
    public function setTakerBuyQuoteAssetVolume($takerBuyQuoteAssetVolume)
    {
        $this->takerBuyQuoteAssetVolume = $takerBuyQuoteAssetVolume;
    }

    /**
     * @return int
     */
    public function getUnusedFiled()
    {
        return $this->unusedFiled;
    }

    /**
     * @param int $unusedFiled
     */
    public function setUnusedFiled($unusedFiled)
    {
        $this->unusedFiled = $unusedFiled;
    }

    public function getValue() : float
    {
        return $this->closePrice - $this->openPrice;
    }
}