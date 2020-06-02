<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatFactsRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use GuzzleHttp\Client;

class IndexController extends Controller
{
    public function catFacts(CatFactsRequest $request)
    {
        $quantity_facts = $request->quantity_of_fact;
        $client = new Client();
        try {
            $response = $client->request('GET',env('CAT_FACT_URL'),[
                'query'=>[
                    'limit'=>$quantity_facts
                ]
            ]);
            $statusCode = $response->getStatusCode();
//            if($statusCode!=200 )
//                throw (new \Exception("Can't connect to cat fatcs"));
            $contents = $response->getBody()->getContents();
            $facts = json_decode($contents)->data;
            $pdf = PDF::loadView('cat-facts', ['facts'=>$facts]);
            $time =Carbon::now()->format('Y_m_d_H_i_s');
            $filename = 'cat_facts-'.$quantity_facts.'-'.$time.'.pdf';
            return $pdf->save(public_path('facts/'.$filename))->download($filename);
        }
        catch (\Exception $exception)
        {
            abort(500,$exception->getMessage());
        }
    }

    public function listsFact()
    {
        $files = \File::files(public_path('facts'));
        $results = [];
        foreach ($files as $item) {
            $results[] = [
                'quantity'=>explode('-',$item->getFileName())[1],
                'filename'=>$item->getFileName(),
                'url'=>url('facts/'.$item->getFileName())
            ];
        }
        usort($results, function($a, $b) {
            return $b['quantity'] <=> $a['quantity'];
        });
        return view('lists-pdf-fact',with(['files'=>$results]));
    }
}
