@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Outgo') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('outgo.store') }}">
                            @csrf
                            @if($errors->any())
                                <div class="row justify-content-center">
                                    <div class="col-md-11">
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">x</span>
                                            </button>
                                            {{$errors->first()}}

                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="row-justify-content-center">
                                    <div class="col-md-11">
                                        <div class="alert alert-success" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">x</span>
                                            </button>
                                            {{session()->get('success')}}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="product">Product</label>
                                <select name="product_id"
                                        id="product"
                                        class="form-control"
                                        placeholder="Vibrate producty"
                                        required>
                                    @foreach($income_products as $product)
                                        <option value="{{ $product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="kolichestvo"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Kolichestvo') }}</label>
                                <div class="col-md-6">
                                    <input id="kolichestvo" type="kolichestvo"
                                           class="form-control @error('kolichestvo') is-invalid @enderror" name="kolichestvo"
                                           value="{{ old('kolichestvo') }}" required autocomplete="sum">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="card-body">
                                    <a href="{{route('index.history')}}">
                                        <button type="button" class="btn btn-danger">Назад</button>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <button type="submit" class="btn btn-warning"> Сохранить </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
