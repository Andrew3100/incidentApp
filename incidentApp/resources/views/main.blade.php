@extends('header')
@section('main-content')


<br>
<br>
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Заголовок</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Тип</th>
                        <th scope="col">Создан</th>
                        <th scope="col">Обновлён</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($data as $d)

                        <tr>
                            <th scope="row">{{$d->id}}</th>
                            <td>{{$d->header}}</td>
                            <td>{{$d->description}}</td>
                            <td>{{$d->type}}</td>
                            <td>{{$d->created_at}}</td>
                            <td>{{$d->updated_at}}</td>
                        </tr>

                    @endforeach


                    </tbody>
                </table>

            </div>
        </div>
    </div>






@endsection
