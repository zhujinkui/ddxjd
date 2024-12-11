<?php

namespace Zhujinkui\DdxJd;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use think\facade\Log;
use Exception;
use yumufeng\curl\Curl;

/**
 * | Notes：京东网关
 * +----------------------------------------------------------------------
 * | PHP Version 8.0+
 * +----------------------------------------------------------------------
 * | Copyright (c) 2011-2024 https://www.zhujinkui.com, All rights reserved.
 * +----------------------------------------------------------------------
 * | Author: 阶级娃儿 <zhujinkui.com@gmail.com>
 * +----------------------------------------------------------------------
 * | Date: 2024/11/18 10:05
 * +----------------------------------------------------------------------
 */
class JdGateWay
{
    /**
     * 默认网关
     */
    const URL = 'https://api.tbk.dingdanxia.com';

    /**
     * 拼多多 client_id
     *
     * @var
     */
    protected mixed $apikey;
    protected mixed $union_id;

    protected JdFactory $jd_factory;


    public function __construct(array $config, JdFactory $JdFactory)
    {
        $this->apikey     = $config['apikey'];
        $this->union_id   = $config['union_id'];
        $this->jd_factory = $JdFactory;
    }

    /**
     * 发送
     *
     * @param string $url
     * @param array  $params
     * @param string $method
     * @param string $data_type
     *
     * @return bool|mixed|string
     */
    public function send(string $url, array $params = [], string $method = "GET", string $data_type = 'JSON'): mixed
    {
        try {
            $params = http_build_query($params);

            $client_url = self::URL . $url;

            Log::write('地址:' . $client_url, 'error');
            Log::write('数据:' . $params, 'error');

            if ($method == "GET") {
                $response = Curl::curl_get($client_url, $params);
            } else {
                $response = Curl::curl_post($client_url, $params);
            }

            Log::write('结果1:', 'error');
            Log::write('结果2:' . $response, 'error');

            return strtolower($data_type) == 'json' ? json_decode($response, true) : $response;
        } catch (Exception $e) {
            $this->jd_factory->setError($e->getMessage());
            return false;
        } catch (GuzzleException $e) {
            $this->jd_factory->setError($e->getMessage());
            return false;
        }
    }
}