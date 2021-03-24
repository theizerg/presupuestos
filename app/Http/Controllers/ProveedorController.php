<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Proveedor;
use App\Models\TipoDocumento;
use App\Models\Genero;
use Spatie\Permission\Models\Role;
class ProveedorController extends Controller
{

	        public function __construct()
    {
        $this->middleware('auth');
    }



	
    public function index(Request $request)
	{		
		$busqueda = $request->get('busqueda');
		$proveedores = Proveedor::FiltrarPorNombre($busqueda)
					->FiltrarPorRazonSocial($busqueda)
					->FiltrarPorRut($busqueda)
					->FiltrarPorMail($busqueda)
					->orderBy('nombre')
					->paginate(20);		
		return view('admin.proveedores.index')->with(compact('proveedores'));
	}

	public function nuevo(){
		$proveedores = Proveedor::paginate(5);
		$roles = Role::get();
        $tipos_documento = TipoDocumento::all();
        $generos = Genero::all();
		return view('admin.proveedores.nuevo')->with(compact('proveedores','roles','tipos_documento','generos'));
	}

	public function guardar(Request $request){
		
	 $exist= $this->exist($request);
    
    if ($exist) {
        
         $notification = array(
            'message' => 'Datos Modificados!',
            'alert-type' => 'success'
        );

        return \Redirect::to('/proveedores/nuevo')->with($notification);
    }
     $notification = array(
            'message' => 'Ha ocurrido un error!',
            'alert-type' => 'error'
        );

        return \Redirect::to('/proveedores/nuevo')->with($notification);
		
	}

	public function detalle($proveedor_id){		
		$proveedor = Proveedor::find(\Hashids::decode($proveedor_id)[0]);	
       // dd($proveedor);	
		if($proveedor){
			return view('admin.proveedores.detalle')->with(compact('proveedor'));
		}else{
			$mensaje = "No se encontró el proveedor al cual se intentó acceder.";
			return Redirect::to('/proveedores')->with(compact('mensaje'));
		}
	}



	public function buscar(Request $request){
		$texto = $request->texto;
		$proveedores = Proveedor::FiltrarPorNombre($texto)
						->FiltrarPorRazonSocial($texto)
						->FiltrarPorRut($texto)
						->FiltrarPorMail($texto)
						->get();
		return Response()->json([
			'proveedores' => $proveedores
		]);
	}


   public function exist(Request $request)
	{
		
        $cliente = new Proveedor();
        if($request->cliente_id){
            $cliente = Proveedor::find(\Hashids::decode($cliente_id)[0]);
            if($cliente->empresa){
                $cliente->nombre = $request->razonSocial;
                $cliente->rut = $request->rut;
            }else{
                $cliente->nombre = $request->nombre;
                $cliente->apellido = $request->apellido;
                $cliente->genero_id = $request->genero_id;
            }
            $cliente->mail = $request->mail;
            $cliente->direccion = $request->direccion;
            $cliente->telefono = $request->telefono;
            $cliente->save();
            $notification = array(
            'message' => 'Datos Modificados!',
            'alert-type' => 'success'
        );

        return \Redirect::to('/proveedores/detalle/' . $cliente->id)->with($notification);
        }else{
            if($request->tipo_cliente == "persona"){
                $cliente->nombre = $request->nombre;

                $cliente->usuario_id = $request->usuario_id;
                $cliente->genero_id = $request->genero_id;
                $cliente->apellido = $request->apellido;
                if($request->tipo_documento_id != null){
                    $cliente->tipo_documento_id = $request->tipo_documento_id;
                    $cliente->tipo_documento_id = $request->tipo_documento_id;
                }
            }else{
                $cliente->nombre = $request->razonSocial;
                $cliente->rif = $request->rif;
                $cliente->empresa = 1;
            }
            $cliente->mail = $request->mail;
            $cliente->documento = $request->documento;
            $cliente->usuario_id = $request->usuario_id;
            $cliente->direccion = $request->direccion;          
            $cliente->telefono = $request->telefono;
            $cliente->tipo_documento_id = 1;

            $cliente->genero_id = 1;
            
            $cliente->save();
         
        }

	}
}
