@extends('Layout')
@section('filmpage')
    <div class= "container " id="Text">
            <div class="row featurette">
                @foreach($filmShow as $value)
                    <div class="featurette-item-img col-lg-3 col-md-12 col-sm-12 order-md-first">
                        <img class="featurette-image img-fluid mx-auto" style="width: 250px; " src="{{$value->film_img}}"
                             data-holder-rendered="true">
                    </div>
                    <div class="featurette-item-block col-lg-5 col-md-12 col-sm-12 order-md-last">
                        <h2 class="featurette-heading"> {{$value->film_name}}</h2>
                        <hr class="featurette-divider">
                        <h4>{{$value->genre_type}} </h4>
                        <p>{{$value->film_discription}}</p>
                    </div>
        </div>
    </div>
    <hr class="featurette-divider">
    @endforeach
    @endsection

