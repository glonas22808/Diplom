@extends('Layout')
@section('timing')
    <div class="container-fluid">Здесь будет что-то вроде расписания</div>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @if(!empty($filmList))@foreach($filmList as $value)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm bg-dark">
                        <img class="img-fluid img-thumbnail"  width="400" height="225" src="{{$value->img}}" >
                        <div class="card-body">
                            <p class="card-text text-white">{{$value->description}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a  href="{{route('showFilm',$value->id)}}" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
        </div>
    </div>
    </div>
@endsection
