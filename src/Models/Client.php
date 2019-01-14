<?php

/**
 * Class that holds the client data.
 */
class Client
{
    protected $_data;

    public function __connstruct($data)
    {
        $this->_data = $data;
    }

    /**
     * Retrieves the model data.
     */
    public function getData()
    {
        return $this->_data;
    }
}