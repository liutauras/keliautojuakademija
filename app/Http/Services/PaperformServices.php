<?php

namespace App\Http\Services;

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
    
    public function getKeyCodesConfig() {
        
        return [
            ['title' => 'Pageidaujamos šalys'],
            ['title' => 'Keliautojų skaičius'],
            ['title' => 'Kiti pageidavimai'],
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
    
    public function getPageidaujamosSalysKey($data) {
        
        $key_codes = $this->getKeyCodesConfig();
        
        foreach($data as $data_item) {
            if(is_array($data_item)) {
                if($data_item['title'] == 'Pageidaujamos šalys') {
                    return $data_item['key'];
                }
            }
        }
    }
    
    public function getPageidaujamosSalysValue($data) {
        
        $key_codes = $this->getKeyCodesConfig();
        
        foreach($data as $data_item) {
            if(is_array($data_item)) {
                if($data_item['title'] == 'Pageidaujamos šalys') {
                    return $data_item['value'];
                }
            }
        }
    }
    
    public function getKitiPageidavikaiKey($data) {
        
        $key_codes = $this->getKeyCodesConfig();
        
        foreach($data as $data_item) {
            if(is_array($data_item)) {
                if($data_item['title'] == 'Kiti pageidavimai') {
                    return $data_item['key'];
                }
            }
        }
    }
    
    public function getKitiPageidavikaiValue($data) {
        
        $key_codes = $this->getKeyCodesConfig();
        
        foreach($data as $data_item) {
            if(is_array($data_item)) {
                if($data_item['title'] == 'Kiti pageidavimai') {
                    return $data_item['value'];
                }
            }
        }
    }
    
    public function getKeliautojuSkaiciusKey(Array $data) {
        
        $key_codes = $this->getKeyCodesConfig();
        
        foreach($data as $data_item) {
            if(is_array($data_item)) {
                if($data_item['title'] == 'Keliautojų skaičius') {
                    return $data_item['key'];
                }
            }
        }
    }
    
    public function getKeliautojuSkaiciusValue(Array $data) {
        
        $key_codes = $this->getKeyCodesConfig();
        
        foreach($data as $data_item) {
            if(is_array($data_item)) {
                if($data_item['title'] == 'Keliautojų skaičius') {
                    return $data_item['value'];
                }
            }
        }
    }
}