<?php

if (!function_exists('split_to_yuan')) {
    /**
     * 分转元
     *
     * @param     $value
     * @param int $float
     *
     * @return string
     */
    function split_to_yuan($value, int $float = 2): string
    {
        return $value ? sprintf("%." . $float . "f", $value / 100) : sprintf("%." . $float . "f", 0);
    }
}

if (!function_exists('trim_zero')) {
    /**
     * 去除无效的精度
     *
     * @param $money
     *
     * @return string
     */
    function trim_zero($money): string
    {
        return rtrim(rtrim(sprintf("%.10f", $money), '0'), '.');
    }
}

if (!function_exists('validate_time_format')) {
    /**
     * 验证时间格式
     *
     * @param $time
     * @param $format
     *
     * @return bool
     */
    function validate_time_format($time, $format): bool
    {
        $d = \DateTime::createFromFormat($format, $time);
        return $d && $d->format($format) === $time;
    }
}


