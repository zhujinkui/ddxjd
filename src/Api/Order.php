<?php

namespace Zhujinkui\DdxJd\Api;

use Zhujinkui\DdxJd\JdGateWay;

/**
 * | Notes：订单
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
class Order extends JdGateWay
{
    /**
     * 订单详情
     *
     * @param $client_params
     *
     * @return bool|mixed|string
     */
    public function orderDetailGet($client_params): mixed
    {
        $params = [
            'apikey' => $this->apikey,
        ];

        if (!empty($client_params)) {
            $params = array_merge($params, $client_params);
        }

        return $this->send('/pdd/order_detail', $params, "POST");
    }

    /**
     * 订单列表
     *
     * @param $client_params
     *
     * @return mixed
     */
    public function orderListIncrementGet($client_params): mixed
    {
        $params = [
            'apikey' => $this->apikey,
        ];

        if (!empty($client_params)) {
            $params = array_merge($params, $client_params);
        }

        return $this->send('/pdd/orderlist', $params, "POST");
    }
}