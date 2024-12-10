<?php

namespace Zhujinkui\DdxJd\Api;

use Zhujinkui\DdxJd\JdGateWay;

/**
 * | Notes：授权
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
class Oauth extends JdGateWay
{
    /**
     * 备案授权
     *
     * @param $client_params
     *
     * @return bool|mixed|string
     */
    public function oauthGoodsPromUrlGenerate($client_params): mixed
    {
        $params = [
            'apikey'    => $this->apikey,
            'p_id_list' => $this->pid,
        ];

        if (!empty($client_params)) {
            $params = array_merge($params, $client_params);
        }

        return $this->send('/pdd/prom_url_generate', $params, "POST");
    }

    /**
     * 是否已备案
     *
     * @return bool|mixed|string
     */
    public function oauthMemberAuthorityQuery($client_params): mixed
    {
        $params = [
            'apikey' => $this->apikey,
            'pid'    => $this->pid,
        ];

        if (!empty($client_params)) {
            $params = array_merge($params, $client_params);
        }

        return $this->send('/pdd/authority_query', $params, "POST");
    }

    /**
     * 频道商品查询
     *
     * @param array $client_params
     *
     * @return mixed
     */
    public function oauthGoodsRecommendGet(array $client_params = []): mixed
    {
        $params = [
            'apikey' => $this->apikey,
            'pid'    => $this->pid,
        ];

        if (!empty($client_params)) {
            $params = array_merge($params, $client_params);
        }

        return $this->send('/pdd/recommend', $params, "POST");
    }
}