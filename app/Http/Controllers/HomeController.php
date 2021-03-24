<?php

namespace App\Http\Controllers;
use App\Models\Presupuesto;
use App\Models\Iglesias;
use App\Models\Notificaciones;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use App\Models\User; 
use Spatie\Permission\Models\Role;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show  the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pastor = \Auth::user()->display_name;


        if (\Auth::user()->hasRole('Administrador')) {
         $roles = Role::get();
         
         //get Current date and time
         $date_current = Carbon::now()->toDateTimeString();

        $notificaciones = Notificaciones::count();
        $descripNot = Notificaciones::get();       
     
        return view('admin.home.index')
            ->with([

                'notificaciones'        =>$notificaciones,
                'descripNot'            =>$descripNot,
                'roles'                 =>$roles

            ]);
        }

        $roles = Role::get();
        //get Current date and time
        $date_current = Carbon::now()->toDateTimeString();
        //get date and time of previous month
        /**
         *  subMonths() means it will subtract the month with
         *  the given argument.
         */
        $prev_date1 = $this->getPrevDate(1);
        $prev_date2 = $this->getPrevDate(2);
        $prev_date3 = $this->getPrevDate(3);
        $prev_date4 = $this->getPrevDate(4);

        /**
         *  get count of employee between two given dates.
         */
        $emp_count_1 = Presupuesto::whereBetween('created_at',[$prev_date1,$date_current])->count();
        $emp_count_2 = Presupuesto::whereBetween('created_at',[$prev_date2,$prev_date1])->count();
        $emp_count_3 = Presupuesto::whereBetween('created_at',[$prev_date3,$prev_date2])->count();
        $emp_count_4 = Presupuesto::whereBetween('created_at',[$prev_date4,$prev_date3])->count();

        //dd($emp_count_2);
        $presupuestoPendiente = Presupuesto::where('status',0)->count();
        $presupuestoAceptados = Presupuesto::where('status',1)->count();
        $notificaciones = Notificaciones::count();
       

        $descripNot = Notificaciones::get();       
     
        return view('admin.home.index')
            ->with([

                'notificaciones'        =>$notificaciones,
                'descripNot'            =>$descripNot,
                'emp_count_1'     =>  $emp_count_1,
                'emp_count_2'     =>  $emp_count_2,
                'emp_count_3'     =>  $emp_count_3,
                'emp_count_4'     =>  $emp_count_4,
                'roles'           =>  $roles,
                'presupuestoPendiente' => $presupuestoPendiente,
                'presupuestoAceptados' => $presupuestoAceptados                 

            ]);
        

       


   
    }




    /**
     *  get the sub month of the given integer
     */
    private function getPrevDate($num){
        return Carbon::now()->subMonths($num)->toDateTimeString();
    }

 public function borrarNotificacion(Request $request, $notificacion_id){
        if($request->ajax()){            
            $notificacion = Notificaciones::find($notificacion_id);
            $usuario = \Auth::user();
            if($notificacion != null && $usuario != null){
                $usuario->notificaciones()->detach($notificacion);
                $usuario->save();
                //Notificaciones::cargarNotificaciones();

                if($notificacion->usuarios()->count() == 0){
                    $notificacion->delete();
                }               
            }
            $notificaciones_total = $usuario->notificaciones()->count();

            return Response()->json([
                'total' => $notificaciones_total,
                'mensaje' => 'Notiicación borrada'
            ]);
        }   
    }
}
