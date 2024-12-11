<?php

namespace Zhujinkui\DdxJd;

use Zhujinkui\DdxJd\Api\Goods;
use Zhujinkui\DdxJd\Api\Order;
use Exception;

/**
 * @package Zhujinkui\DdxJd
 * @property Goods $goods
 * @property Order $order
 */
class JdFactory
{
    private mixed $config;
    private mixed $error;

    /**
     * @throws Exception
     */
    public function __construct($config = null)
    {
        if (empty($config)) {
            throw new Exception('no config');
        }

        $this->config = $config;

        return $this;
    }

    /**
     *
     * @param $api
     *
     * @return mixed
     * @throws \Exception
     */
    public function __get($api)
    {
        try {
            $classname = __NAMESPACE__ . "\\Api\\" . ucfirst($api);

            if (!class_exists($classname)) {
                throw new Exception('Pdd Sdk Api Undefined');

                return false;
            }

            return new $classname($this->config, $this);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * 设置错误
     *
     * @param $message
     */
    public function setError($message): void
    {
        $this->error = $message;
    }

    /**
     * 获取错误
     *
     * @return mixed
     */
    public function getError(): mixed
    {
        return $this->error;
    }
}