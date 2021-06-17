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
        $paperform = Paperform::where('url', $url)->get()->first();
        
        if ($paperform) {
            
            $data               = $request->data;
            $uzklausa           = new Uzklausa();
            $paperformService   = new PaperformServices();
            $uzklausa           = $paperformService->setUzklausaModelData($uzklausa, $data);
            
            $uzklausa->uzklausa = serialize($request->data);
            $uzklausa->save();
            
            return 'OK';
        } else {
            return 'BAD';
        }
    }
}
