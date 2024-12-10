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
    public function queryGoodsList(array $client_params = []): mixed
    {
        $params = [
            'apikey' => $this->apikey,
        ];

        if (!empty($client_params)) {
            $params = array_merge($params, $client_params);
        }

        return $this->send('/jd/query_jingfen_goods', $params, "POST");
    }
}