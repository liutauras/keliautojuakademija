<?php

namespace App\Http\Controllers\Webhooks;

use App\Http\Controllers\Controller;
use App\Models\Paperform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Uzklausa;
use App\Providers\PaperformDataExtractor;
use Hamcrest\Arrays\IsArray;
use App\Http\Sevices\PaperformServices;

class PaperformWebhookController extends Controller
{
    //
    public function handle(Request $request, $url)
    {
        $data = $request->data;
        //$paperformde = new PaperformDataExtractor();
        // move to service class
        $paperform = Paperform::where('url', $url)->get()->first();
        // $key_name = [
        //     ['title' => 'Vardas',       'model_param' => 'vardas'],
        //     ['title' => 'Telefonas',    'model_param' => 'tel'],
        //     ['title' => 'El. paštas',   'model_param' => 'el_pastas'],
        //     ['title' => 'URL',          'model_param' => 'puslapis'],
        // ];
        
        if ($paperform) {
        
            $uzklausa = new Uzklausa();
            $paperformService = new PaperformServices();
            $uzklausa = $paperformService->setUzklausaModelData($uzklausa, $data);
        
            // foreach($data as $data_item) {
            //     if(is_array($data_item)) {
            //         foreach($key_name as $kn) {
            //             if($data_item['title'] == $kn['title']) {
            //                 $uzklausa->{$kn['model_param']} = $data_item['value'];
            //             }
            //         }
            //     }
            // }
            // $uzklausa->puslapis = $url;
            $uzklausa->uzklausa = serialize($request->data);
            $uzklausa->save();
        } else {
            return 'BAD';
        }
        
        return 'OK';
    }
}
