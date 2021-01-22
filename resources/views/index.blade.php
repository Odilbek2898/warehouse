@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navBAR-light bg-faded">
                    <a href="{{route('income.index')}}">
                        <button type="button" class="btn btn-success">Добавить Приход</button>
                    </a>
                    <a href="{{route('outgo.index')}}">
                        <button type="button" class="btn btn-danger">Добавить Уход</button>
                    </a>
                </nav>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th style="color: #0E9A00">Тип</th>
                                <th style="color: #0E9A00">Продукт</th>
                                <th style="color: #0e9a00">Дата</th>
                                <th style="color: #0E9A00">Количество</th>
                                <th style="color: #0E9A00">Остаток</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($calculations as $calculation)
                                @php /**@var \App\Models\BlogCategory $item */ @endphp
                                <tr>
                                    <td>{{$calculation->type->name}}</td>
                                    <td>{{$calculation->product->name}}</td>
                                    <td>{{$calculation->created_at}}</td>
                                    <td>{{number_format("$calculation->kolichestvo",2,"."," ")}}</td>
                                    <td>{{number_format("$calculation->ostatok",2,"."," ")}}</td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
        @if($calculations->total() > $calculations->count(7))
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card-body">
                        {{ $calculations->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
