<?php

namespace Hcode;

class Model {

    private $values = [];

    public function __call($name, $args)
    {

        $method = substr($name, 0, 3); // substr ( apartir do name na posicao 0, traga as 3 primeiras)
        $fieldName = substr ($name, 3, strlen($name)); // a partir do name na prosicao 3, strlen conta ate o final 

        switch ($method)
        {
            case "get":
                return $this->values[$fieldName];
            break;

            case "set":
                $this->values[$fieldName] = $args[0];
            break;
        }

    }

    public function setData($data = array())
    {

        foreach ($data as $key => $value) {
            $this->{"set".$key}($value);
        }

    }

    public function getValues()
    {
        return $this->values;

    }

}

?>