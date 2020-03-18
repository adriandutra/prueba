<?php

namespace App\Http\Controllers\Backend\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ApiResponse;
use App\Helpers\ModelResponse;
use Carbon\Carbon;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Event;
use Log;
use DB;


class SocioController extends Controller
{
    public function getListado1()
    {
        try {
            
            $servers = DB::table('socios as s')
                        ->Select(DB::raw('s.name as nombre
                                         , s.edad as edad
                                         , s.group as equipo'))
                        ->where('s.level', 'Universitario')
                        ->where('s.status', 'Casado')
                        ->orderby('s.edad', 'ASC')->take(100)
                        ->get();
                                         
                                         
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Listado1';
            $r->data = $servers;
            return $r->doResponse();
                                         
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
    public function getListado2()
    {
        try {
            
            $pops  = DB::table('socios as s')
                        ->Select(DB::raw('s.name as nombre,
                                          count(*) as numero'))
                        ->where('s.group', 'Racing')
                        ->groupBy('s.name')
                        ->having('numero', '>', 5)
                        ->take(5)
                        ->get();
                                         
                                         
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Listado2';
            $r->data = $pops;
            return $r->doResponse();
                                         
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
    public function getListado3()
    {
        try {
            
            $servers = DB::table('socios as s')
                        ->Select(DB::raw('s.group as equipo, 
                                          count(*) as socios,
                                          round(avg(edad), 2) as edad, 
                                          min(edad) as minimo, 
                                          maX(edad) as maximo'))
                        ->GroupBy('s.group')                 
                        ->OrderBy('socios', 'ASC')                        
                        ->get();
                                         
                                         
           $r = new ModelResponse();
           $r->success = true;
           $r->message = 'Listado3';
           $r->data = $servers;
           return $r->doResponse();
                                         
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
    public function getListado4()
    {
        try {
            
            $servers = DB::table('socios as s')
                       ->Select(DB::raw('count(*) as cantidad'))
                       ->get();
                                         
                                         
           $r = new ModelResponse();
           $r->success = true;
           $r->message = 'Listado4';
           $r->data = $servers;
           return $r->doResponse();
                                         
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
    public function getListado5()
    {
        try {
            
            $servers = DB::table('socios as s')
                        ->Select(DB::raw('round(avg(s.edad), 2) as edad'))
                        ->where('s.group', 'Racing')
                        ->get();
                                         
                                         
             $r = new ModelResponse();
             $r->success = true;
             $r->message = 'Listado5';
             $r->data = $servers;
             return $r->doResponse();
                                         
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
}
