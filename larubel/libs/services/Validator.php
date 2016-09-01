<?php

namespace Larubel\Libs\Services;

use Larubel\Libs\Services\Session;

class Validator{

    private $patternsType = [
        'required'          => '/^.+$/i',
        'alpha'             => '/^[a-zA-Z]+$/i',
        'alphaWithSpace'    => '/^[a-zA-Z ]+$/i',
        'num'               => '/^(\d+)$/',
        'alnum'             => '/^(\w+)$/',
        'min'               => '[A-Za-z0-9#,.\-_]{n,}',
        'max'               => '[A-Za-z0-9#,.\-_]{,n}',
    ];

    private $messages = [
        'required' => ' is required.',
        'alpha' => ' contains only letters.',
        'num'   => ' contains only numbers.',
        'alnum' => ' should be alpha numeric.',
        'min'   => ' must be minimum',
        'max'   => ' must be maximum',
        'email' => ' is not valid!'
    ];

    private $pattern;

    public function validate(String $rule, $data){
        
        $rules = explode('|', $rule);
        
        $fieldName = key($data);
        $data = $data[$fieldName];

        $this->pattern = '';

        foreach ($rules as $value) {
            global $errors;
            $values = explode('=', $value);

            if(count($values) >= 2 ){

                $values[0]  == 'min' ? $this->pattern = '/^[A-Za-z0-9#, .\-_]{' . $values[1] . ',}$/' : '';
                $values[0]  == 'max' ? $this->pattern = '/^[A-Za-z0-9#, .\-_]{0,' . $values[1] . '}$/' : '';

                if(!preg_match($this->pattern, $data, $matches)){   
                    Session::set('errors', $fieldName . $this->messages[$values[0]] . ' ' . $values[1] . ' characters');             
                    Response::validationRedirect();
                }

                continue;
            }

            if($value == 'email'){
                if(!$this->validateEmail($data)){
                    Session::set('errors', $fieldName . $this->messages[$value]);
                    Response::validationRedirect();
                }

                continue;
            }

            $this->pattern = $this->patternsType[$value];

            if(!preg_match($this->pattern, $data, $matches)){
                Session::set('errors', $fieldName . $this->messages[$value]); 
                Response::validationRedirect();
            }
        }
        
        Session::set('errors', '');

        return true;
    }


    private function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

}