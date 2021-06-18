<?php

namespace App\Http\Services;

use App\Models\Uzklausa;
use App\Models\Paperform;

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
    
    public function getUzklausosSuDuomenimis(Paperform $paperform, $uzklausos) {
        
        $vardas_key     = $paperform->vardas;
        $tel_key        = $paperform->tel;
        $puslapis_key   = $paperform->puslapis;
        $el_pastas_key  = $paperform->el_pastas;
        $uzklasos_keys  = $paperform->uzklausa;
        
        $uzklausos_upd = [];
        foreach($uzklausos as $uzklausa) {
            
            $uzklausa->vardas       = $this->getUzklausosDuomenisPagalKey($uzklausa, $vardas_key);
            $uzklausa->tel          = $this->getUzklausosDuomenisPagalKey($uzklausa, $tel_key);
            $uzklausa->el_pastas    = $this->getUzklausosDuomenisPagalKey($uzklausa, $el_pastas_key);
            $uzklausa->puslapis     = $this->getUzklausosDuomenisPagalKey($uzklausa, $puslapis_key);
            $uzklausos_checkboxinis_arr     = unserialize($uzklausa->uzklausa);
            //dd($uzklausos_keys_arr);
            foreach($uzklausos_checkboxinis_arr as $item) {
                
                $u = $this->getUzklausosDuomenisPagalKey($uzklausa, $item['key'], false);
                //dd($u);
                if($u['title'] == 'Pageidaujamos šalys') {
                    $uzklausa->pageidaujamos_salys = implode(", ", $u['value']);
                } else if ($u['title'] == 'Keliautojų skaičius') {
                    //dd($u);
                    $uzklausa->keliatoju_skaicius = $u['value'];
                } else if ($u['title'] == 'Kiti pageidavimai') {
                    $uzklausa->kiti_pageidavimai = implode(", ", $u['value']);
                }
            }
            $uzklausos_upd[] = $uzklausa;
            //implode(", ", $uzklausa->kiti_pageidavimai)
        }
        
        return $uzklausos_upd;
    }
    
    public function getUzklausosDuomenisPagalKey($uzklausa, $key_code, $tik_value = true) {
        //dd(unserialize($uzklausa->uzklausa));
        $uzklausa_objektas = unserialize($uzklausa->uzklausa);
        //dd($uzklausa_objektas);
        foreach($uzklausa_objektas as $item) {
            if($item['key'] == $key_code) {
                if($tik_value == true) {
                    return $item['value'];
                } else {
                    return ['value' => $item['value'], 'title' => $item['title']];
                }
            }
        }
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