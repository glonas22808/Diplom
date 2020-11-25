@extends('Layout')
@section('filmpage')
    <div class="container " id="Text">
        <div class="modal fade container-fluid" id="place" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="buyplace" enctype="multipart/form-data" name="formName">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title " id="exampleModalLabel">Выберите место</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="order-md-2">
                                <table class="table table-sm">
                                    <tbody>
{{--                                    //Таблица сама создается--}}
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-dark">Купить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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

                    <button class="btn btn-info dropdown-toggle" href="http://example.com" id="dropdown04"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>

                    <div class="next">
                        @foreach($seanceshow as $value)
                            <div class="list-group list-group-horizontal">
                                <div class="card text-white bg-warning " data-cost=" {{$value->cost}} "
                                     data-zal_id="{{$value->zal_id}}" data-seance_id="{{$value->seance_id}}"
                                     data-film_id="{{$value->film_id}}" id="Seancecard"
                                     style="max-width: 7rem;  margin-top: 1rem;  max-height: 8rem;">
                                    <div class="card-header  ">{{$value->zal_name}}</div>
                                    <p class="card-text justify-content-center"> {{$value->Seance_data}}</p>
                                </div>
                                @endforeach
                            </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.card', function () {
                $("#place").modal('show');
                cost = $('#Seancecard').data('cost');
                hall = $('#Seancecard').data('zal_id');
                seance = $('#Seancecard').data('seance_id');
                Film = $('#Seancecard').data('film_id');
                $.ajax({
                    url: '/ShowPlace',
                    type: 'POST',
                    data: {cost, hall, seance, Film},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        Object.keys(response.place).forEach((key) => {
                            $('tbody').append('<tr>')
                            $('tbody').append('<th scope="row"> ' + key + '</th>')
                            response.place[key].forEach((elem) => {
                                $('tbody').append('                                        <td>\n' +
                                    '                                            <div>\n' +
                                    '                                                <input class="form-check-input" type="checkbox" id="'+elem.place_id+'"\n' +
                                    '                                                       data-place="' + elem.place_id + '" data-cost="' + cost + '" name="place" aria-label="...">\n' +
                                    '                                            </div>\n' +
                                    '                                        </td>')
                            })
                            $('tbody').append('</tr>')

                        })
                    }
                })
                $.ajax({
                    url: '/Showoccupied',
                    type: 'POST',
                    data: {cost, hall, seance, Film},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        {
                        console.log()
                         $(' #'+response.occupied[0].place_id +' ').append('class = disabled');

                        }
                    }
                })
                //Вывести уже купленные билеты
            })

            $(document).on('submit', '#buyplace', function (event) {
                event.preventDefault();
                cost = $('#buyplace').data('cost');
                place = $('#buyplace').data('place');
                console.log(cost);
                console.log(place);
                console.log(typeof   $('#buyplace').serialize())
                $.ajax({
                    url: '/buyticket',
                    type: 'POST',
                     data: {cost ,place  } ,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        {

                            if ('success' in response) {
                                alert('Билет есть');

                            } else {
                                alert('Билет отсутсвует ');
                            }

                        }
                    }
                })
            })
        })
    </script>
@endsection

