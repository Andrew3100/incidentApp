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
            <div class="col-8 text-center">
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
            <div class="col-4 text-center">

            </div>
        </div>
    </div>


@endsection
