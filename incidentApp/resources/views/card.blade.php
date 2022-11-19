@extends('header')

@section('main-content')

<br>
<br>

@php
$header = \App\Models\incident::find(request("id"));
$status = \App\Models\statuses::find($header->status)->name;
$description = $header->description;
@endphp

    <div class="container">
        <div class="row">
            <div class="col-6 text-center">
                <div class="card border-primary mb-3" style="max-width: 25rem;">
                    <div class="card-header">{{ $header->header }}</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">Статус инцидента: <b>{{ $status  }}</b></h5>
                        <p class="card-text">{{$description}}</p>
                    </div>
                    <div class="row">
                        <div class="col"><a style="margin-bottom: 15px;" class="btn btn-outline-primary btn-sm">Изменить статус</a></div>
                        <div class="col"><a style="margin-bottom: 15px;" class="btn btn-outline-primary btn-sm">Передать другому</a></div>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
            <div class="col-6 text-center">

                <nav id="navbar-example2" class="navbar navbar-light bg-light">
                    <a class="navbar-brand" href="#">Комментарии по инциденту</a>
                </nav>
                <div data-spy="scroll" data-target="#navbar-example2" data-offset="0" class="scrollspy-example">
                    @foreach(\App\Models\comments::all()->where('card_id',request("id")) as $result)
                        <div class="alert alert-primary" role="alert">
                            <div style="text-align: left"><p>{{$result->created_at}}</p>
                            <p>{{\App\Models\User::find($result->user_id)->name}}</p></div>
                            <div></div>
                            <div class="alert alert-warning" role="alert">
                                {{$result->comment_text}}
                            </div>
                        </div>
                    @endforeach
                    <form action="/addMessage" method="get">
                        <textarea placeholder="Текст комметария..." class="form-control" name="text_comment"></textarea>
                        <input type="hidden" name="uid" value="{{Auth::user()->id}}">
                        <input type="hidden" name="card_id" value="{{request("id")}}">
                        <br><button type="submit" class="btn btn-warning">Добавить комметарий</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
