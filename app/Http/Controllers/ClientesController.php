<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumento;
use App\Models\Clientes;
use App\Models\Genero;
use App\Models\Presupuesto;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
class ClientesController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(Request $request)
    {
         $roles = Role::get();


        $busqueda = $request->get('busqueda');
        $clientes = Clientes::FiltrarPorNombre($busqueda)
            ->FiltrarPorApellido($busqueda)
            ->FiltrarPorRut($busqueda)
            ->get();
        return view('admin.clientes.index')->with(compact('clientes','roles'));
    }

    public function nuevo()
    {
        $roles = Role::get();
        $tipos_documento = TipoDocumento::all();
        $generos = Genero::all();
        $clientes = Clientes::all();
        return view('admin.clientes.nuevo')->with(compact('tipos_documento', 'clientes','roles','generos'));
    }

    public function guardar(Request $request){
        
        //dd($request);

        $cliente = new Clientes();

        if($request->cliente_id){
            $cliente = Clientes::find(\Hashids::decode($request->cliente_id)[0]);
            if($cliente->empresa){
                $cliente->nombre = $request->razonSocial;
                $cliente->rut = $request->rut;
            }else{
                $cliente->nombre = $request->nombre;
                $cliente->apellido = $request->apellido;
               
            }
            $cliente->mail = $request->mail;
            $cliente->direccion = $request->direccion;
            $cliente->telefono = $request->telefono;
            $cliente->genero_id = $request->genero_id;
            $cliente->marca_vehiculo = $request->marca_vehiculo;
            $cliente->ano_vehiculo = $request->ano_vehiculo;
            $cliente->placa_vehiculo = $request->placa_vehiculo;
            $cliente->save();
             $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );
            return \Redirect::to('/cliente/detalle/' . $cliente->encode_id)->with($notification);
        }else{
            if($request->tipo_cliente == "persona"){
                $cliente->nombre = $request->nombre;

                $cliente->usuario_id = $request->usuario_id;
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
            $cliente->genero_id = $request->genero_id;
            $cliente->marca_vehiculo = $request->marca_vehiculo;
            $cliente->ano_vehiculo = $request->ano_vehiculo;
            $cliente->placa_vehiculo = $request->placa_vehiculo;
            $cliente->save();
           $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );

        return \Redirect::to('/cliente/nuevo')->with($notification);
        }
    }

    public function detalle($cliente_id){
        $roles = Role::get();
        $cliente = Clientes::find(\Hashids::decode($cliente_id)[0]);
        $generos = Genero::all();
        $presupuestos =Presupuesto::where('cliente_id',\Hashids::decode($cliente_id)[0])
        ->paginate(6);
        //dd($presupuestos);
        return view('admin.clientes.detalle')->with(compact('cliente', 'presupuestos','roles','generos'));
    }

    public function buscar(Request $request){
        $texto = $request->texto;
        $clientes = Clientes::FiltrarPorNombre($texto)
                        ->FiltrarPorApellido($texto)
                        ->FiltrarPorRut($texto)
                        ->FiltrarPorMail($texto)
                        ->get();
        return Response()->json([
            'clientes' => $clientes
        ]);
    }
}
