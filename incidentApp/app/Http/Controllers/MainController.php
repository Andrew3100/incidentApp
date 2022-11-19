<?php

namespace App\Http\Controllers;

use App\Models\comments;
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
        $incident->user = $request->input('user_inc');
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

    public function showCard(Request $request) {
        $data = new incident();
        return view('card',['data' => 'Карточка инцидента']);
    }

    public function addMessage(Request $request) {
        $comment_add = new comments();
        $comment_add->comment_text = $request->input('text_comment');
        $comment_add->card_id = $request->input('card_id');
        $comment_add->user_id = $request->input('uid');
        $comment_add->save();
        echo "<script>window.location.replace('/card?id=$comment_add->card_id');</script>";
    }


    public function change_status(Request $request) {
        $new_status = new incident();
        $upd = [
            'status' => $request->input('change')
        ];
        $new_status->where('id', '=' , $request->input('incident_id'))->update(
            $upd);
        $id = $request->input('incident_id');
        echo "<script>window.location.replace('/card?id=$id');</script>";
    }


    public function change_user(Request $request) {
        $new_status = new incident();
        $upd = [
            'group_view' => $request->input('group_view'),
            'user' => $request->input('user')
        ];
        $new_status->where('id', '=' , $request->input('incident_id'))->update(
            $upd);
        $id = $request->input('incident_id');
        echo "<script>window.location.replace('/card?id=$id');</script>";
    }


}
