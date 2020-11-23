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
                                    <tr>
                                        <th scope="row"></th>
                                        <td>
                                            <div>
                                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel"
                                                       value="" aria-label="...">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel"
                                                       value="" aria-label="...">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel"
                                                       value="" aria-label="...">
                                            </div>
                                        </td>
                                    </tr>

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
                    data: {cost , hall , seance , Film},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        {

                            if ('success' in response) {
                                console.log('Super')

                            } else {
                                console.log('bad');
                            }

                        }
                    }
                });
                $.ajax({
                    url: '/Showoccupied',
                    type: 'POST',
                    data: {cost , hall , seance , Film},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        {

                            if ('success' in response) {
                                console.log('Super')

                            } else {
                                console.log('bad');
                            }

                        }
                    }
                });
                //Вывести уже купленные билеты
            })
        })
        $(document).on('submit', '#buyplace', function (event) {
            event.preventDefault();
            $.ajax({
                url: '/buyticket',
                type: 'POST',
                data: $('#buyplace').serialize(),
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
            });
        })
    </script>
@endsection

