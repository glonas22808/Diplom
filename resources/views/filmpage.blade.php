@extends('Layout')
@section('filmpage')
    <div class="container-fluid" id ="Text" >
        <div class="container row justify-content-center">
            <div class="col-md-8 col-lg-9 blog-main ">
                <h3 class="pb-3 mb-4">
                    @foreach($filmShow as $value)
                        {{$value->name}}</h3>
                <img class="featurette-image img-fluid mx-auto"  style="width: 500px;" src="{{$item->img}}" data-holder-rendered="true">
    {{$value->description}}
    @endforeach
    @endsection
