<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Category;
use Validator, Str;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
        $this->middleware('user.status');
    }

    public function getHome($module){
        $cats = Category::where('module', $module)->orderBy('name', 'Asc')->paginate(25);
        $data = ['cats' => $cats];
        return view('admin.categories.home', $data);
    }

    public function getCategoryAdd(){
        return view('admin.categories.add');
    }

    public function postCategoryAdd(Request $request){
        $rules = [
            'name' => 'required',
            'icon' => 'required',
        ];

        $message = [
            'name.required' => 'Se require de un nombre para la categoria.',
            'icon.required' => 'Se require de un icono para la categoria'
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error!')->with('typealert', 'danger');
        else:
            $c = new Category;
            $c->module = $request->input('module');
            $c->name = e($request->input('name'));
            $c->slug = Str::slug($request->input('name'));
            $c->icon = e($request->input('icon'));
            if($c->save()):
                return redirect('/admin/categories/'.$c->module)->with('message', 'Guardado con éxito!')->with('typealert', 'success');
            endif;
        endif;
    }

    public function getCategoryEdit($id){
        $cat = Category::findOrFail($id);
        $data = ['cat' => $cat];
        return view('admin.categories.edit', $data);
    }

    public function postCategoryEdit(Request $request, $id){
        $rules = [
            'name' => 'required',
            'icon' => 'required',
        ];

        $message = [
            'name.required' => 'Se require de un nombre para la categoria.',
            'icon.required' => 'Se require de un icono para la categoria'
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error!')->with('typealert', 'danger');
        else:
            $c =  Category::findOrFail($id);
            $c->module = $request->input('module');
            $c->name = e($request->input('name'));
            $c->icon = e($request->input('icon'));
            if($c->save()):
                return redirect('/admin/categories/'.$c->module)->with('message', 'Guardado con éxito!')->with('typealert', 'success');
            endif;
        endif;
    }

    public function postProductDelete($id){
        $c =  Category::findOrFail($id);
        if($c->delete()):
            return back()->with('message', 'Eliminado con éxito!')->with('typealert', 'success');
        endif;
    }
}
