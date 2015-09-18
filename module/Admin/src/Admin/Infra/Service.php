<?php

namespace Admin\Infra;

/**
 * Class Service
 * @package Admin\Infra
 */
abstract class Service
{

    public function prepareAttributes(array $data)
    {
        $preparedAttributes = array();
        
        foreach($data as $key => $value){
            if(!isset($data[$key]) || empty($data[$key])){
                unset($data[$key]);
            } elseif($key === "dataAlteracao"){
                if(is_string($value)){
                    $data[$key] = \DateTime::createFromFormat("d/m/Y H:i:s",$value);
                }
            }
        }
        
        foreach ($data as $name => $value) {
            $key = str_replace(' ', '', ucwords(str_replace('_', ' ', $name)));
            $preparedAttributes[lcfirst($key)] = $value;
            unset($data[$name]);
        }

        return $preparedAttributes;
    }
}
