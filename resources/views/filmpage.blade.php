@extends('Layout')
@section('filmpage')
    <div class="container " id="Text">
        <div class="row featurette">
            @foreach($filmShow as $value)
                <div class="featurette-item-img col-lg-3 col-md-12 col-sm-12 order-md-first">
                    <img class="featurette-image img-fluid mx-auto" style="width: 250px; " src="{{$value->film_img}}"
                         data-holder-rendered="true">
                </div>
                <div class="featurette-item-block col-lg-5 col-md-12 col-sm-12 order-md-last">
                    <h2 class="featurette-heading"> {{$value->film_name}}</h2>
                    <hr class="featurette-divider">
                    <h4>{{$value->genre}} </h4>
                    <p>{{$value->film_discription}}</p>
                    <!-- Example split danger button -->
                    @endforeach

                        <button class="btn btn-info dropdown-toggle" href="http://example.com" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>

                    <div class="next">
                    @foreach($seanceshow as $value)
                        <div class="list-group list-group-horizontal">
                            <div class="card text-white bg-warning" id="Seancecard"
                                 style="max-width: 7rem;  margin-top: 1rem;  max-height: 8rem;">
                                <div class="card-header">{{$value->zal_name}}</div>
                                <p class="card-text justify-content-center"> {{$value->Seance_data}}</p>
                            </div>
                            @endforeach
                        </div>
                </div>
                </div>
        </div>
        </div>
    </div>
    </div>
@endsection

