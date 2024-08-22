<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;

class CrudController extends Controller
{
    public function index(){

        $data = Book::all_data();
        return view("welcome",["books"=>$data]);
    }
    public function create(Request $request){
        $sql = DB::insert(" insert into books(nombre,editorial,autor,pagina) values(?,?,?,?) ",[
            $request->nombre,
            $request->editorial,
            $request->autor,
            $request->pagina
        ]);
        if($sql == true) return back()->with("correcto","Libro Agregado con exito");
        else return back()->with("incorrecto","Libro Agregado sin exito");
    }
    public function update(Request $request){
        try {
            $sql = DB::insert(" update books set nombre=?,editorial=?,autor=?,pagina=? where id=?",[
                $request->nombre,
                $request->editorial,
                $request->autor,
                $request->pagina,
                $request->id,
            ]);
            if($sql == 0) $sql = 1;
                //code...
        } catch (\Throwable $th) {
            //throw $th;
            $sql = 0;
        }
        if($sql == true) return back()->with("correcto","Libro Modificado con exito");
        else return back()->with("incorrecto","Libro Modificado sin exito");
    }
    public function delete($id){
        try {
            $sql = DB::delete(" delete from books where id = $id");
        } catch (\Throwable $th) {
            //throw $th;
            $sql = 0;
        }
        if($sql == true) return back()->with("correcto","Libro Eliminado con exito");
        else return back()->with("incorrecto","Libro Eliminado sin exito");
    }
}                                                                   
