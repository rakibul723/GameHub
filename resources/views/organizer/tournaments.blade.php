
@extends('organizer/layouts.organizerapp')

@section('content')
<title>Tournaments</title>


                    <!--Add popup-->
                    <div class="panel-body">

                          <div style="top: 50px;" class="modal fade " id="targetp" role="dialog">
                          <div class="modal-dialog">
                          <div class="modal-content">

                                <div class="modal-header">
                                    <h6 style="color: black;" class=modal-title>Add New Tournament!</h6>
                                    <button type="button" class="close" data-dismiss="modal" >&times</button>

                                </div>
                                <div class="modal-body" style="background: #6c757dab;">

                                    <form class="border border-light p-5" method="POST" action="{{route('organizer.addTournament')}}" enctype="multipart/form-data">
                                    @csrf


                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Tournament</label>
                                          <input  type="text" class="form-control" name="t_name"  aria-describedby="emailHelp" >
                                        </div>

                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Game</label>
                                          <input  type="text" class="form-control" name="g_name" aria-describedby="emailHelp" >
                                        </div>

                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Tournament Start</label>
                                          <input  type="text" class="form-control" name="start_date" aria-describedby="emailHelp" >
                                        </div>


                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Participate Fee</label>
                                          <input  type="number" class="form-control" name="participate_fee" step="any" min="0" aria-describedby="emailHelp" >
                                        </div>



                                        <div class="form-group">
                                          <label for="comment">Prize Description:</label>
                                          <textarea class="form-control" rows="5" name="prize_description" required></textarea>
                                        </div>


                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Poster</label>
                                        <img class="form-control" id="previewPoster" src="images/blankimg.png" style="max-width:68px; margin-top:10px;"/><br><br>
                                        <input required type="file" name="poster" onchange="posterPreview(this)"/>
                                      </div>


                                      <div class="form-group">
                                        <input type="submit"  class="btn btn-dark float-left" value="Add"/>
                                      </div><br>

                                    </form>

                                </div>
                                <div class="modal-footer">
                                </div>

                          </div>
                          </div>
                          </div>

                    </div>
                    <!--Add popup end-->






   <!-- Page content -->

      <div class="row justify-content-center">

        <div class="col-xl-8 order-xl-1" style="margin-left: 10px; margin-right: 10px;">
          <div class="card shadow">
            <div class="card-header border-0">
              <a class="text-center" data-toggle="modal" data-target="#targetp" href=""><i class="fa fa-plus-square" aria-hidden="true"> Add New</i></a>
            </div>

                <div class="row justify-content-center pb-5 mb-3 ">

                <div class="col-md-12 heading-section text-center ftco-animate">
                  <h3>My Tournaments!</h3>
                </div>
                </div>

                <div class="row">

                          @foreach($tournaments->reverse() as $value)


                          @if($value->organizer == Auth::user()->email )

                                  <div class="col-lg-4 col-md-6 mb-4" >

                                  <form style="margin-left: 10px; margin-right: 10px;" class="border border-light p-5" method="POST" action="" enctype="multipart/form-data">
                                      @csrf

                                        <div class="form-group">
                                              <label for="exampleInputEmail1">Poster</label>
                                              <img src="{{$value->poster}}" class="img-fluid" alt="Responsive image">
                                        </div>



                                        <div class="form-group">
                                             Tournament:  <a>{{$value->tournament_name}}</a>
                                        </div>

                                        <div class="form-group">
                                             Game:  <a>{{$value->game_name}}</a>
                                        </div>

                                        <div class="form-group">
                                             Tournament Start:  <a>{{$value->start_date}}</a>
                                        </div>

                                        <div class="form-group">
                                             Participate Fee:  <a>{{$value->participate_fee}}</a>
                                        </div>


                                        <div class="form-group">
                                              <label for="gender">Status : </label>
                                              <span> {{$value->t_status}} </span><br>
                                        </div>


                                        <div class="form-group">
                                        <a class="float-left" href="{{ route('organizer.updateTournamentGet',$value->id) }}">View</a>
                                        <a class="float-right" href="{{ route('organizer.deleteTournament',$value->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </div><br>


                                      </form>

                                      </div>
                          @endif

                          @endforeach



                </div>





          </div>
        </div>

      </div>



<script>

function posterPreview(input){
    var file = $("input[type=file]").get(0).files[0];
    if(file){
        var reader = new FileReader();
        reader.onload = function(){
            $("#previewPoster").attr("src",reader.result);
        }
        reader.readAsDataURL(file);
    }
}

</script>




@endsection
