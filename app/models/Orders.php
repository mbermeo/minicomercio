<?php

namespace App\Models;

class Orders extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $idempotency_token;

    /**
     *
     * @var string
     */
    public $order_id;

    /**
     *
     * @var string
     */
    public $terminal_id;

    /**
     *
     * @var string
     */
    public $purchase_description;

    /**
     *
     * @var string
     */
    public $token;

    /**
     *
     * @var string
     */
    public $status;

    /**
     *
     * @var string
     */
    public $expires_at;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("minicomercio");
        $this->setSource("orders");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'orders';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Orders[]|Orders|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Orders|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
