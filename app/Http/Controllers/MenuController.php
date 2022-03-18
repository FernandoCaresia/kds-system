<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Menu;

class MenuController extends Controller
{
    public function menuFormInsert (){

        return view('menu.newMenu');

    }
    
    public function menuCreate(Request $request){

        $name = $request->file('image')->getClientOriginalName();
        
        $rules = [
            'menu' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'image' => 'mimes:jpg,png'
        ]; 
        
        $validateRules = Validator::make($request->all(), $rules);

        $request->file('image')->storeAs('public/images', $name);

        if($validateRules->fails()){
            return redirect()->route('menuInsert')->with('errorMessage', 'Todos os campos devem ser preenchidos');
        }else{
            $newMenu = new Menu();
            $newMenu->menu = $request->input('menu');
            $newMenu->description = $request->input('description');
            $newMenu->price = $request->input('price');
            $newMenu->img = $name;
            $newMenu->save();

            return redirect()->route('listMenu');
        }

        
    }

    public function menuList (){

        $menu = Menu::all();

        return view('menu.menu', ['menu' => $menu]);
        
    }

    public function menuDelete ($id){

        $item = Menu::find($id);

        if($item){
            Menu::find($id)->delete();

            return redirect()->route('listMenu');
        }else{
            return redirect()->route('listMenu');
        }
        
    }

    public function menuFormUpdate ($id){
        
        $menuItem = Menu::find($id);

        if($menuItem){
            return view('menu.editMenu', ['data' => $menuItem]);
        }else{
            return view('menu.menu');
        }

    }

    public function menuUpdate (Request $request, $id){

        $rules = [
            'menu' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer'
        ]; 
        
        $validateRules = Validator::make($request->all(), $rules);

        if($validateRules->fails()){
            return redirect()->route('listMenu')->with('errorMessage', 'Alteração recusada, tente novamente!');
        }else{
            
            Menu::find($id)->update([
                'menu' => $request->input('menu'),
                'description' => $request->input('description'),
                'price' => $request->input('price')
            ]);

            return redirect()->route('listMenu');
        }
        
    }
}
