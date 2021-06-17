<?php

namespace App\Http\Sevices;

use App\Models\Uzklausa;

class PaperformServices {


    public function __construct() 
    {
    }
    
    public function getKeyNameConfig() {
        
        return [
            ['title' => 'Vardas',       'model_param' => 'vardas'],
            ['title' => 'Telefonas',    'model_param' => 'tel'],
            ['title' => 'El. paštas',   'model_param' => 'el_pastas'],
            ['title' => 'URL',          'model_param' => 'puslapis'],
        ];
    }
    
    public function setUzklausaModelData(Uzklausa $uzklausa, Array $data) {
        
        $key_name = $this->getKeyNameConfig();
        
        foreach($data as $data_item) {
            if(is_array($data_item)) {
                foreach($key_name as $kn) {
                    if($data_item['title'] == $kn['title']) {
                        $uzklausa->{$kn['model_param']} = $data_item['value'];
                    }
                }
            }
        }
        
        return $uzklausa;
    }
    
}