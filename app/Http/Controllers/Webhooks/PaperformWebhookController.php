<?php

namespace App\Http\Controllers\Webhooks;

use App\Http\Controllers\Controller;
use App\Models\Paperform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Uzklausa;
use App\Providers\PaperformDataExtractor;
use Hamcrest\Arrays\IsArray;
use App\Http\Services\PaperformServices;

class PaperformWebhookController extends Controller
{
    //
    public function handle(Request $request, $url)
    {
        $paperformService   = new PaperformServices();
        $url                = $paperformService->getUrlParameterByTitleFromData($request->data);

        $paperform          = Paperform::where('url', $url)->get()->first();
        //$paperform = Paperform::where('url', $url)->get()->first();
        //URL keykode: dbr95
        //$paperform = Paperform::where('url', $request->data->url)->get()->first();
        //$paperform = Paperform::where('url', 'like', '%'.$url)->get()->first();
        //where($column, 'like', '%'.$value.'%');
        
        if ($paperform) {
            
            $data               = $request->data;
            $uzklausa           = new Uzklausa();
            $uzklausa           = $paperformService->setUzklausaModelData($uzklausa, $data);
            
            $uzklausa->uzklausa = serialize($request->data);
            $uzklausa->save();
            
            return 'OK';
        } else {
            //dd($url);
            return 'BAD';
        }
    }
}
