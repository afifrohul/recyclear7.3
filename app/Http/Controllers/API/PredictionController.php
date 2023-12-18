<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prediction;

class PredictionController extends Controller
{
    public function prediction(Request $request)
    {
        $status = '';
        $message = '';
        $data = '';

        try {
            $prediction = Prediction::where('user_id', $request->user_id)->get();
            $status = 'success';
            $message = 'berhasil';
            $data = $prediction;
        }catch(\Exception $e){
            $status = 'failed';
            $message = 'Gagal. ' . $e->getMessage();
        }
        catch(\Illuminate\Database\QueryException $e){
            $status = 'failed';
            $message = 'Gagal. ' . $e->getMessage();
        }
        finally{
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $data
            ], 200);
        }

    }
}
