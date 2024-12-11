<?php

namespace Zhujinkui\DdxJd\Api;

use Zhujinkui\DdxJd\JdGateWay;

/**
 * | Notes：商品
 * +----------------------------------------------------------------------
 * | PHP Version 8.0+
 * +----------------------------------------------------------------------
 * | Copyright (c) 2011-2024 https://www.zhujinkui.com, All rights reserved.
 * +----------------------------------------------------------------------
 * | Author: 阶级娃儿 <zhujinkui.com@gmail.com>
 * +----------------------------------------------------------------------
 * | Date: 2024/11/18 16:05
 * +----------------------------------------------------------------------
 */
class Goods extends JdGateWay
{
    /**
     * 商品列表
     *
     * @param array $client_params
     *
     * @return bool|mixed|string
     */
    public function queryGoodsList(array $client_params = [])
    {
        $params = [
            'apikey' => $this->apikey,
        ];

        if (!empty($client_params)) {
            $params = array_merge($params, $client_params);
        }

        return $this->send('/jd/query_jingfen_goods', $params, "POST");
    }

    /**
     * 搜索/详情
     *
     * @param array $client_params
     *
     * @return bool|mixed|string
     */
    public function queryGoodsDetail(array $client_params = [])
    {
        $params = [
            'apikey' => $this->apikey,
        ];

        if (!empty($client_params)) {
            $params = array_merge($params, $client_params);
        }

        return $this->send('/jd/query_goods', $params, "POST");
    }

    /**
     * 转链
     *
     * @param array $client_params
     *
     * @return bool|mixed|string
     */
    public function urlPrivilege(array $client_params = [])
    {
        $params = [
            'apikey'  => $this->apikey,
            'unionId' => $this->union_id,
        ];

        if (!empty($client_params)) {
            $params = array_merge($params, $client_params);
        }

        return $this->send('/jd/url_privilege', $params, "POST");
    }
}