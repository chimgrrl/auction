<?php

namespace api\services;

class AuctionHelpers
{
    /**
     * Convert Date format
     *
     * @param $date
     * @param string $format
     * @param string $replaceable
     * @param string $replacer
     * @return bool|string
     */
    public function convertDateFormat($date, $format = 'Y/m/d', $replaceable = '/', $replacer = '-')
    {
        $date = str_replace($replaceable, $replacer, $date);

        return date($format, strtotime($date));
    }
}