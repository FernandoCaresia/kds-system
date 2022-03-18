<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Solicitation;

class RequestController extends Controller
{
    public function requestList(){

        $data = Solicitation::all()->where('finished', 0);

        return view('requests.requestsDashboard', ['data' => $data]);
    }

    public function requestCreate(Request $request){
        
        $rules = [
            'menu' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'tableid' => 'required|integer'
        ]; 

        $validate = Validator::make($request->all(), $rules);

        if($validate->fails()){
            return redirect()->route('home')->with('errorMessage', 'Algo de errado aconteceu, chame a gerência!');
        }else{
            $insertRequest = new Solicitation();
            $insertRequest->tableid = $request->input('tableid');
            $insertRequest->menu = $request->input('menu');
            $insertRequest->price = $request->input('price');
            $insertRequest->save();

            return redirect()->route('home')->with('successRequest', 'Pedido feito com sucesso!');
        }
    }

    public function requestDelete($id){

        $delR = Solicitation::find($id);

        if($delR){
            //$delR->delete();
            Solicitation::find($id)->update([
                'finished' => 1
            ]);
            return redirect()->route('requests');
        }else{
            return 'erro';
        }

    }
    
    public function requestEdit($id){

        $data = Solicitation::find($id);

        if($data){
            return view('requests.editRequest', ['data' => $data]);
        }else{
            return redirect()->route('requests');
        }
    }

    public function requestEditA(Request $request, $id){

        $rules = [
            'menu' => 'required|string',
            'price' => 'required|integer'
        ]; 

        $validate = Validator::make($request->all(), $rules);

        if($validate->fails()){
            return redirect()->route('requests')->with('errorMessage', 'Erro na alteração, tente novamente!');
        }else{

            Solicitation::find($id)->update([
                'menu' => $request->input('menu'),
                'price' => $request->input('price')
            ]);

            return redirect()->route('requests');
        }
    }

}
