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
                                <div class="form-group">
                                    <label for="oldpassword">Место</label>
                                    <input type="text" name="place" id="place" placeholder="Место"
                                           class="form-control modal-field-phone" value="">
                                </div>
                                <div class="form-group">
                                    <label for="newpassword">Ряд</label>
                                    <input type="text" name="spot" id="spot" placeholder="Ряд"
                                           class="form-control modal-field-htoto" value="">
                                </div>
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
    <script>
        $(document).ready(function () {
            $(document).on('click', '.card', function () {
                $("#place").modal('show');
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

                        } else  {
                            alert('Билет отсутсвует ');
                        }

                    }
                }
            });
        })
    </script>
@endsection

