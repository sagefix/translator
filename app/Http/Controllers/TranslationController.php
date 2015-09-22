<?php
namespace App\Http\Controllers;

use App\Translation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use \Validator;
use Illuminate\Support\Facades\Schema;

class TranslationController extends Controller
{
     public function translate(Request $request)
    {
        $data = $request->only('word','src_language','trans_language');
        $validator = Validator::make($data,
            array(
                'word'      => 'required',
                'src_language' => 'required',
                'trans_language' => 'required'
            )
        );
        if ($validator->passes()){
            $columns = Schema::getColumnListing('translation'); // users table
            if(! in_array($data['src_language'], $columns)){
                return response()->json(array('error' => 1, 'labels' => 'Source language is not available'));
            }
            else if(! in_array($data['trans_language'], $columns)){
                return response()->json(array('error' => 1, 'labels' => 'Translation language is available'));
            }
            else {
                $tra = Translation::where($data['src_language'], $data['word'])->first();
                if(! $tra){
                    return response()->json(array('error' => 1, 'labels' => 'This word is not available in our source language'));
                }else{
                    $data = array('word' => $data['word'], 'source' => $data['src_language'], 'target' => $data['trans_language'], 'result' => $tra->$data['trans_language']);
                    return response()->json(array('error' => 0, 'data' => $data, 'errors' => array()));
                }
            }
        }else{
            return response()->json(array('error' => 1, 'labels' => $validator->messages()));
        }
    }



    
    

}