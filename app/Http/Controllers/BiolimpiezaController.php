<?php

namespace App\Http\Controllers;

use App\Mail\BudgetMailable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class BiolimpiezaController extends Controller
{
    public function sendBudget(Request $request){
        $send = $this->sendMail($request->all(), 'SOLICITAR PRESUPUESTO');
        return response()->json($send);
    }

    public function sendPlan(Request $request){
        $send = $this->sendMail($request->all(), 'SOLICITAR PLAN');
        return response()->json($send);
    }

    public function sendQuestion(Request $request){
        $send = $this->sendMail($request->all(), 'PREGUNTAS FRECUENTES');
        return response()->json($send);
    }

    public function sendContact(Request $request){
        $send = $this->sendMail($request->all(), 'CONTACTO');
        return response()->json($send);
    }

    private function sendMail(array $data, string $subject)
    {
        try{
            $data['subject'] = $subject;
            $mail            = new BudgetMailable($data, $subject);
            // Mail::to(['biolimpiezapy@gmail.com', 'vazquez182@gmail.com'])->send($mail);
            Mail::to(['puntocodepy@gmail.com'])->send($mail);
            return true;
            
        }catch(Exception $ex){
            Log::error(__METHOD__, [ $ex->getMessage(), $data ]);
            return ['message' => $ex->getMessage()];
        }
    
    }
}
