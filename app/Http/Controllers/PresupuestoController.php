<?php

namespace App\Http\Controllers;

use App\Models\Presupuesto;
use App\Models\Servicios;
use App\Models\Clientes;
use App\Models\lineaPresupuesto;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PresupuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $roles = Role::get();
        $presupuestos = Presupuesto::get();
        //dd($presupuestos);
        $ingreso = Presupuesto::where('status',1)->get()->toArray();

        if ($ingreso == null) {
            
            $ingreso = false;
        }else {
            $ingreso = true;
        }
       
        
        return view('admin.presupuesto.index', compact('roles','presupuestos','ingreso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nuevo()
    {
        $servicios = Servicios::get();
        $roles = Role::get();
        $presupuestos = Presupuesto::get();
        $ingreso = Presupuesto::where('status',1)->get();


        return view('admin.presupuesto.nuevo', compact('roles','presupuestos','servicios','ingreso'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {  
           
            $articulos = json_decode($request->listadoArticulos);
            $cliente = Clientes::find($request->cliente_id);
            //dd($request); 
           
                  
            $presupuesto = new Presupuesto();

            $presupuesto->codigo = $request->codigo;       
            $presupuesto->fecha = $request->fecha;
            $presupuesto->marca_vehiculo = $request->marca_vehiculo;
            $presupuesto->ano_vehiculo = $request->ano_vehiculo;
            $presupuesto->placa_vehiculo = $request->placa_vehiculo;
            $presupuesto->usuario_id = auth()->user()->id;
            $presupuesto->cliente_id =$request->cliente_id;
            $presupuesto->subtotal =0;
            $presupuesto->total =0;

            

            if($cliente != null){
                //dd($cliente->nombre ,  );
                $presupuesto->cliente()->associate($cliente);
                $presupuesto->nombre_cliente = $cliente->nombre . " " . $cliente->apellido;
                           
            }

            $presupuesto->status = 0;

            if(is_numeric($request->cotizacion)){
                $presupuesto->cotizacion = $request->cotizacion;
            }
            

            $presupuesto->fecha = date('d/m/Y');   

            $presupuesto->save();

            for ($i=0; $i < count($articulos); $i++) {
                //dd($articulos[$i]);
                $servicios = Servicios::BuscarPorCodigo($articulos[$i]->codigo)->first();
                $linea = $articulos[$i];
    

                    $lineaPresupuesto = new LineaPresupuesto();
                    
                    $idpresupuesto= $lineaPresupuesto->presupuesto()->associate($presupuesto);

                    $lineaPresupuesto->usuario_id = auth()->user()->id;
                    $lineaPresupuesto->servicio_id = $servicios->id;
                    $lineaPresupuesto->presupuesto_id = $idpresupuesto->presupuesto_id;
                    $lineaPresupuesto->fecha       = date("Y-m-d H:i:s");
                    $lineaPresupuesto->servicio_id =$servicios->id;
                    $lineaPresupuesto->precioUnitario = $linea->precio;
                    $lineaPresupuesto->subTotal = $linea->subTotal;
                    $lineaPresupuesto->total = $lineaPresupuesto->subTotal;

                    $linea->subTotal += $lineaPresupuesto->subTotal;
                    $linea->total += $lineaPresupuesto->subTotal;

                    
                    $lineaPresupuesto->save();

                }






           return \Redirect::to('presupuestos')->with(compact('mensaje'));  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
   public function detalle(Request $request, $presupuesto_id)
    {
        $presupuestos = Presupuesto::find(\Hashids::decode($presupuesto_id)[0]);     
        $lineapresupuesto = LineaPresupuesto::where('presupuesto_id',\Hashids::decode($presupuesto_id)[0])->get();
       

        return view('admin.presupuesto.detalle')->with(compact('presupuestos','lineapresupuesto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function editar($presupuesto_id)
    {
    
        if($presupuesto_id <> null){
            $presupuesto = Presupuesto::find(\Hashids::decode($presupuesto_id)[0]);
            $presupuesto->status = 1;
            $presupuesto->save();
         }
            
            $notification = array(
            'message' => 'Datos Modificados!',
            'alert-type' => 'success'
        );

        return \Redirect::to('/presupuestos')->with($notification);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presupuesto $presupuesto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function imprimir($presupuesto_id)
    {
        $presupuesto = Presupuesto::find(\Hashids::decode($presupuesto_id)[0]);
        $desgloce = LineaPresupuesto::where('presupuesto_id',\Hashids::decode($presupuesto_id)[0])->get();
        $total = LineaPresupuesto::where('presupuesto_id',\Hashids::decode($presupuesto_id)[0])
        ->sum('total');

        //dd($monthlyCounts);
        
       
         $id_imp = 189;
          $fecha = "04/07/2018";
          $pdf = app('FPDF');
  
          $pdf->AddPage();
  
  
          $pdf->Ln(1);
        
          //$pdf->Image('images/mmm.png',10,5,40,25,'PNG');
          $pdf->Ln(1);
          $pdf->SetX(175);
          $pdf->SetFont('Arial','B',15);
          $pdf->Cell(20,5,utf8_decode($presupuesto->codigo),'C');
          $pdf->SetY(20);
          $pdf-> SetFillColor(234, 231, 230);
          $pdf->Image('images/logo/logo-vertical.png',6,5,70,25,'PNG');
          

          $pdf->Ln(1);
          $pdf->SetXY(48,30);
          $pdf->SetFont('Arial','B',16);
          $pdf->Cell(128,5,utf8_decode("PLANTILLA DE PRESUPUESTOS." ),0,1,'C');
          //titulos encabezado
          $pdf->SetXY(10, 40);
          $pdf->SetFont('Arial','B',8);
          $pdf->Cell(190,5,utf8_decode("DATOS DEL CLIENTE"),1,1,'C',true);
          $pdf->SetXY(10, 45);
          $pdf->SetFont('Arial','B',6);
          $pdf->Cell(80,5,utf8_decode("NOMBRE Y APELLIDO:"),1,1,'L');
          $pdf->SetXY(90, 45);
          $pdf->Cell(30,5,utf8_decode("TELÉFONO:"),1,1,'L');
          $pdf->SetXY(120, 45);
          $pdf->Cell(80,5,utf8_decode("CORREO ELECTRÓNICO:"),1,1,'L');

           // datos del encabezado
         $pdf->SetFont('Arial','',7);
         $pdf->SetXY(10, 50);
         $pdf->Cell(80,5,utf8_decode($presupuesto->cliente->nombre.' '. $presupuesto->cliente->apellido),1,1,'C');
         $pdf->SetXY(90, 50);
         $pdf->Cell(30,5,utf8_decode($presupuesto->cliente->telefono),1,1,'C');
         $pdf->SetXY(120, 50);
         $pdf->Cell(80,5,utf8_decode($presupuesto->cliente->mail),1,1,'C');
        
          //titulos encabezado
          $pdf->SetXY(10, 55);
          $pdf->SetFont('Arial','B',6);
          $pdf->Cell(80,5,utf8_decode("DOCUMENTO:"),1,1,'L');
          $pdf->SetXY(90, 55);
          $pdf->Cell(110,5,utf8_decode("DIRECCIÓN:"),1,1,'L');
          $pdf->SetXY(120, 55);
           // datos del encabezado
          $pdf->SetFont('Arial','',7);
          //dd($presupuesto->cliente);
          $pdf->SetXY(10, 60);
          $pdf->Cell(80,5,utf8_decode(($presupuesto->cliente->tipodoc->tipo_documento).' '. $presupuesto->cliente->documento),1,1,'C');
          $pdf->SetXY(90, 60);
          $pdf->Cell(110,5,utf8_decode($presupuesto->cliente->direccion),1,1,'C');
           //titulos encabezado
          $pdf->SetXY(10, 65);
          $pdf->SetFont('Arial','B',8);
          $pdf->Cell(190,5,utf8_decode("DATOS DEL VEHÍCULO"),1,1,'C',true);
           //titulos encabezado
           $pdf->SetXY(10, 70);
           $pdf->SetFont('Arial','B',6);
           $pdf->Cell(80,5,utf8_decode("MODELO"),1,1,'L');
           $pdf->SetXY(90, 70);
           $pdf->Cell(30,5,utf8_decode("AÑO:"),1,1,'L');
           $pdf->SetXY(120, 70);
           $pdf->Cell(80,5,utf8_decode("PLACA:"),1,1,'L');
            // datos del encabezado
           $pdf->SetFont('Arial','',7);
           $pdf->SetXY(10, 75);
           $pdf->Cell(80,5,utf8_decode($presupuesto->cliente->marca_vehiculo),1,1,'C');
           $pdf->SetXY(90, 75);
           $pdf->Cell(30,5,utf8_decode($presupuesto->cliente->ano_vehiculo),1,1,'C');
           $pdf->SetXY(120, 75);
           $pdf->Cell(80,5,utf8_decode($presupuesto->cliente->placa_vehiculo),1,1,'C');

          $pdf->SetXY(10, 85);
          $pdf->SetFont('Arial','B',8);
          $pdf->Cell(190,5,utf8_decode("DATOS DEL PRESUPUESTO"),1,1,'C',true);
          //titulos encabezado
          $pdf->SetFont('Arial','B',8);
          $pdf->Cell(90,6,utf8_decode("SERVICIO OBTENIDO"),1,0,'C',true);
          $pdf->Cell(100,6,utf8_decode("COSTO"),1,0,'C',true);
          $pdf->Ln(0);

          foreach ($desgloce as $key => $unid) {
          $pdf->Ln(6);
          $pdf->Cell(90,6,utf8_decode($unid->servicio->nombre) ,1,0,'C');
          $pdf->Cell(100,6,utf8_decode("$".$unid->precioUnitario) ,1,0,'C');
          }

          $bolivares =$total * $presupuesto->cotizacion;

          //dd($bolivares);
          $pdf->Ln(6);
          $pdf->SetXY(140, 120);
          $pdf->SetFont('Arial','B',8);
          $pdf->Cell(60,6,utf8_decode("TOTAL A EN DIVISAS"),1,0,'C',true);
          $pdf->SetXY(140, 126);
          $pdf->SetFont('Arial','B',8);
          $pdf->Cell(60,6,utf8_decode('$'.$total),1,0,'C');
          $pdf->Ln(6);
          $pdf->SetXY(140, 137);
          $pdf->SetFont('Arial','B',8);
          $pdf->Cell(60,6,utf8_decode("TOTAL A EN BOLIVARES"),1,0,'C',true);
          $pdf->SetXY(140, 143);
          $pdf->SetFont('Arial','B',8);
          $pdf->Cell(60,6,number_format($bolivares,2),1,0,'C');
         
          
      

          
        
         




            $headers=['Content-Type'=>'application/pdf'];
        return Response($pdf->Output(), 200, $headers);
    }
}
