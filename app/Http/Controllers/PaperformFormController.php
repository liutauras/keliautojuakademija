<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paperform;

class PaperformFormController extends Controller
{
    public function indexPaperform(Request $request) {
        $paperforms = Paperform::all();

        if (count($paperforms)) {

            return view('paperform._index_paperform', [
                    'paperforms'  =>  $paperforms,
                ]
            );
        } else {
            $data['title'] = '404';
            $data['name'] = 'Paperform nėra nei vieno įrašo';
            return response()
                ->view('errors.404', $data, 404);
        }
        
        
    }
    
    // Create Contact Form
    public function createPaperform(Request $request) {
        return view('paperform/_create_paperform');
    }

      // Store Contact Form data
    public function storePaperform(Request $request) {

        // Form validation
        $this->validate($request, [
            'pavadinimas'     => 'required',
            'url'             => 'required',
            'paperform_code'  => 'required',
            'puslapis'        => 'required',
            'vardas'          => 'required',
            'tel'             => 'required',
            'el_pastas'       => 'required',
            'uzklausa'        => 'required',
        ]);

          //  Store data in database
        Paperform::create($request->all());

          // 
        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showForm(Request $request, $url)
    {
        $paperform = Paperform::where('url', $url)->get()->first();

        if ($paperform) {
        
            return view('paperform._show_paperform', [
                    'paperform'  =>  $paperform,
                ]
            );
        } else {
            $data['title'] = '404';
            $data['name'] = 'Paperform neegzistuoja';
            return response()
                ->view('errors.404', $data, 404);
        }
    }
    
    public function edit($id)
    {
        $paperform = Paperform::findOrFail($id);

        $data = [
            'paperform'          => $paperform,
        ];

        return view('paperform._edit_paperform', ['paperform'  =>  $paperform]);
    }
    
    public function update(Request $request, $id)
    {
        $paperform    = Paperform::findOrFail($id);
        
        if($paperform) {

            $request->validate(
            //$validator = Validator::make($request->all(),
                [
                    'pavadinimas'     => 'required',
                    'url'             => 'required|unique:paperforms,url,'.$paperform->id,
                    'paperform_code'  => 'required',
                    'puslapis'        => 'required',
                    'vardas'          => 'required',
                    'tel'             => 'required',
                    'el_pastas'       => 'required',
                    'uzklausa'        => 'required',
                ]
            );
            
            $paperform->update($request->toArray());

            return back()->with('success', trans('page.updateSuccess'));
        } else {
            $data['title'] = '404';
            $data['name'] = 'Paperform neegzistuoja';
            
            return response()
                ->view('errors.404', $data, 404);
        }
    }
    
    public function success(Request $request) {
        
        $data = $request->all();
        
        return view('paperform._success_paperform', ['data'  =>  $data]);
    }
    
    public function delete($id)
    {
        $paperform    = Paperform::findOrFail($id);

        return view('paperform._delete_paperform', compact('paperform'));
    }
    
    public function destroy($id)
    {
        $paperform    = Paperform::findOrFail($id);
        
        $paperform->delete();

        return redirect()->route('paperform.index');
    }

}
