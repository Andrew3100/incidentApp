<?php

namespace App\Http\Controllers;

use App\Models\incident;
use App\Models\incidentModel;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main() {

        $data = new incident();
        return view('main',['data' => $data->all()]);
    }

    public function addIncident(Request $request) {
        $incident = new incident();
        $incident->header = $request->input('header');
        $incident->type = $request->input('type');
        $incident->group_view = $request->input('group_view');
        $incident->description = $request->input('description');
        $incident->status = 1;
        $incident->updated_at = date('d-m-Y, H:i:s',time());
        $incident->created_at = date('d-m-Y, H:i:s',time());
        $incident->save();
        echo "<script>window.location.replace('/');</script>";
    }


    public function editIncident(Request $request) {
        $incident = new incident();
        $upd = [
            'header' => $request->input('header'),
            'type' => $request->input('type'),
            'group_view' => $request->input('group_view'),
            'description' => $request->input('description')
        ];
        $incident->where('id', '=' , $request->input('record_id'))->update(
            $upd
        );
        echo "<script>window.location.replace('/');</script>";
    }
}
