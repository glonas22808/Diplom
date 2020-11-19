@extends('Layout')
@section('timing')
    <div class="container-fluid">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @foreach($filmList as $value)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm bg-dark">
                                <img class="img-fluid " width="400" height="225" src="{{$value->film_img}}">
                                <div class="card-body">
                                    <p class="card-text text-white">{{$value->genre}} , {{$value->film_time}} мин</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{route('showFilm',$value->film_id)}}"
                                               class="btn btn-sm btn-outline-secondary">Расписание</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
