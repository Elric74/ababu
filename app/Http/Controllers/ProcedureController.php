<?php

namespace App\Http\Controllers;

use App\Procedure;
use Illuminate\Http\Request;

class ProcedureController extends Controller
{
    /**
     * Display a listing of possible diagnoses (VeNom).
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $diagnoses = Procedure::orderby('term_name', 'asc')->select('id', 'term_name')->limit(5)->get();
        } else {
            $diagnoses = Procedure::orderby('term_name', 'asc')->select('id', 'term_name')->where('term_name', 'like', '%' . $search . '%')->limit(5)->get();
        }

        $response = array();
        foreach ($diagnoses as $diagnosis) {
            $response[] = array(
                "id" => $diagnosis->id,
                "text" => $diagnosis->term_name
            );
        }

        echo json_encode($response);
        exit;
    }
}
