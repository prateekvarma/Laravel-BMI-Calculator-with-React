<?php

namespace App\Http\Controllers;
use App\Imc;
use Illuminate\Support\Facades\Auth;
use JavaScript;

use Illuminate\Http\Request;

class ImcController extends Controller
{
    public function index()
    {
        
        $imc_obj = Imc::where('user_id', Auth::id())->paginate(5);
      
        return view('imc.index', compact('imc_obj'));
        
        
    }
    
    public function show(Imc $imc)
    {
        return view('imc.show', compact('imc'));
    }
    
    public function check()
    {
        $all = Imc::where('user_id', Auth::id())->get();
         $last = collect($all)->last();
         
         if ($last) {
        
        JavaScript::put([
            
         'clasificacion' => $last->clasificacion,
         'imc' => $last->imccalculado,
        
        ]);
        
         }
        
        $imc = Imc::all();
        return view('imc.check-imc', compact('imc'));
    }
    
    public function store(Request $request)
    {
        $imc = new Imc;
        $imc->peso = $request->peso;
        $imc->altura = $request->altura;
        $altura2 = ($imc->altura) * ($imc->altura);
        $imc->imccalculado = ( $imc->peso / $altura2 );
        
        if (($imc->imccalculado) < 16.00)
        {
            $imc->clasificacion = 'Delgadez severa';
        }
        elseif (($imc->imccalculado >= 16.00) && ($imc->imccalculado <= 16.99))
        {
            $imc->clasificacion = 'Delgadez moderada';
        }
        elseif (($imc->imccalculado >= 17.00) && ($imc->imccalculado <= 18.40))
        {
            $imc->clasificacion = 'Delgadez leve';
        }
        elseif (($imc->imccalculado >= 18.5) && ($imc->imccalculado  <= 24.99))
        {
            $imc->clasificacion = 'Normal';
        }
        elseif (($imc->imccalculado >= 25.00)  && ($imc->imccalculado <= 29.99))
        {
            $imc->clasificacion = 'Preobeso';
        }
        elseif (($imc->imccalculado >= 30.00) && ($imc->imccalculado <= 34.99))
        {
            $imc->clasificacion = 'Obesidad leve';
        }
        elseif (($imc->imccalculado >= 35.00) && ($imc->imccalculado <= 39.99))
        {
            $imc->clasificacion = 'Obesidad media';
        }
        elseif (($imc->imccalculado) >= 40.00 )
        {
            $imc->clasificacion = 'Obesidad morbida';
        }
        
        $imc->user_id = Auth::id();
        
        // $all = Imc::where('user_id', Auth::id())->get();
        //  $last = collect($all)->last();
        
        // JavaScript::put([
            
        //  'clasificacion' => $last->clasificacion,
        //  'imc' => $last->imccalculado,
        
        // ]);

        $imc->save();
        
       return redirect('/imcs');
        
    }
    
    public function result()
    {
         $all = Imc::where('user_id', Auth::id())->get();
         $last = collect($all)->last();
         return $last;
    }
}
