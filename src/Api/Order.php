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
     * 搜索/详情
     *
     * @param array $client_params
     *
     * @return bool|mixed|string
     */
    public function queryOrderList(array $client_params = [])
    {
        $params = [
            'apikey' => $this->apikey,
        ];

        if (!empty($client_params)) {
            $params = array_merge($params, $client_params);
        }

        return $this->send('/jd/order_details2', $params, "POST");
    }
}