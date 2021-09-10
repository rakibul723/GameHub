
@extends('organizer/layouts.organizerapp')

@section('content')
<title>Update Tournaments</title>




<!--Round popup-->
<div class="panel-body">

      <div style="top: 50px;" class="modal fade " id="targetR" role="dialog">
      <div class="modal-dialog">
      <div class="modal-content">

            <div class="modal-header">
                <h6 style="color: black;" class=modal-title>Add New Round!</h6>
                <button type="button" class="close" data-dismiss="modal" >&times</button>

            </div>
            <div class="modal-body" style="background: #6c757dab;">

                <form class="border border-light p-5" method="POST" action="{{route('organizer.addRound')}}" enctype="multipart/form-data">
                @csrf
                      <input  type="number" class="form-control" name="tournament" value="{{$tournaments->id}}" hidden >

                    <div class="form-group">
                      <label for="exampleInputEmail1">Round</label>
                      <input  type="text" class="form-control" name="round_number" aria-describedby="emailHelp" >
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
<!--Round popup end-->



<!--Room popup-->
<div class="panel-body">

      <div style="top: 50px;" class="modal fade " id="targetRM" role="dialog">
      <div class="modal-dialog">
      <div class="modal-content">

            <div class="modal-header">
                <h6 style="color: black;" class=modal-title>Add New Room!</h6>
                <button type="button" class="close" data-dismiss="modal" >&times</button>

            </div>
            <div class="modal-body" style="background: #6c757dab;">

                <form class="border border-light p-5" method="POST" action="{{route('organizer.addRoom')}}" enctype="multipart/form-data">
                @csrf





                      <input  type="number" class="form-control" name="tournament" value="{{$tournaments->id}}" hidden >

                      <div class="form-group">
                        <label for="exampleInputEmail1">Round Number</label>
                        <select class="form-control" name="round_number" required>
                              @foreach($rounds->reverse() as $value)
                                 @if($value->tournament == $tournaments->id )
                                     <option value="{{ $value->id }}" >{{ $value->round_number }}</option>
                                 @endif
                              @endforeach
                        </select>
                      </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Room Number</label>
                      <input  type="text" class="form-control" name="room_number" aria-describedby="emailHelp" >
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Room Start at</label>
                      <input  type="text" class="form-control" name="room_start_at" aria-describedby="emailHelp" >
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Room Screen</label>
                      <input  type="text" class="form-control" name="room_screen" aria-describedby="emailHelp" >
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Room ID</label>
                      <input  type="text" class="form-control" name="room_id" aria-describedby="emailHelp" >
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Room Password</label>
                      <input  type="text" class="form-control" name="room_pass" aria-describedby="emailHelp" >
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Max Player</label>
                      <input  type="number" class="form-control" name="max_player" aria-describedby="emailHelp" >
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
<!--Room popup end-->








   <!-- Page content -->

      <div class="row justify-content-center">

        <div class="col-xl-8 order-xl-1" style="margin-left: 10px; margin-right: 10px;">
          <div class="card shadow">



                <div class="row justify-content-center pb-5 mb-3 ">

                <div class="col-md-12 heading-section text-center ftco-animate">
                  <h3>Update Tournament!</h3>
                </div>
                </div>

                <div class="row justify-content-center">


                                  <div class="col-lg-4 col-md-6 mb-4" >

                                            <form style="margin-left: 10px; margin-right: 10px;" class="border border-light p-5" method="POST" action="{{route('organizer.updateTournamentPost')}}" enctype="multipart/form-data">
                                                @csrf

                                                <input type="text" class="form-control" name="tournament_id" value="{{$tournaments->id}}" aria-describedby="emailHelp" hidden>

                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">Tournament</label>
                                                  <input  type="text" class="form-control" name="t_name" value="{{$tournaments->tournament_name}}" aria-describedby="emailHelp" >
                                                </div>

                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">Game</label>
                                                  <input  type="text" class="form-control" name="g_name" value="{{$tournaments->game_name}}" aria-describedby="emailHelp" >
                                                </div>

                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">Tournament Start</label>
                                                  <input  type="text" class="form-control" name="start_date" value="{{$tournaments->start_date}}" aria-describedby="emailHelp" >
                                                </div>


                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">Participate Fee</label>
                                                  <input  type="number" class="form-control" name="participate_fee" value="{{$tournaments->participate_fee}}" step="any" min="0" aria-describedby="emailHelp" >
                                                </div>



                                                <div class="form-group">
                                                  <label for="comment">Prize Description:</label>
                                                  <textarea class="form-control" rows="5" name="prize_description" required>{{$tournaments->prize_description}}</textarea>
                                                </div>


                                                <div class="form-group">
                                                      <input  type="text"  name="p_poster" value="{{$tournaments->poster}}" hidden/>
                                                      <label for="exampleInputPassword1">Poster</label><br>
                                                      <img id="previewPoster" src="{{$tournaments->poster}}" class="img-fluid" alt="Responsive image"/>
                                                </div>

                                                <div class="form-group">
                                                      <input  type="file" name="poster" onchange="posterPreview(this)"/>
                                                </div>

                                                <div class="form-group">
                                                      <label >Status</label>
                                                            <select style=" background: #27293d !important;" class="form-control" name="t_status" required>
                                                                  <option  value="Participation" {{$tournaments->t_status == "Participation"  ? 'selected' : ''}} >Participation</option>
                                                                  <option  value="Started" {{$tournaments->t_status == "Started"  ? 'selected' : ''}} >Started</option>
                                                                  <option  value="End" {{$tournaments->t_status == "End"  ? 'selected' : ''}} >End</option>
                                                            </select>
                                                </div>


                                                <div class="form-group">
                                                  <input type="submit"  class="btn btn-dark float-left" value="Update"/>
                                                </div><br>


                                                </form>


                                    </div>

                      </div>



















                      <div class="row justify-content-center  mb-3 ">



                      <div class="card-header border-0">
                        <a class="text-center" data-toggle="modal" data-target="#targetR" href=""><i class="fa fa-plus-square" aria-hidden="true"> Add Round</i></a>
                      </div>
                      <div class="col-md-12 heading-section text-center ftco-animate">
                          <h3>Rounds!</h3>
                      </div>
                      </div>

                      <div class="row">






                                        @foreach($rounds->reverse() as $value)

                                                @if($value->tournament == $tournaments->id )
                                                     <div class="col-lg-4 col-md-4 mb-4">
                                                        <form style="margin-left: 10px; margin-right: 10px; background: #d6d6d6;"  class="border border-light p-5" method="POST" action="{{route('organizer.updateParticipatePost')}}" enctype="multipart/form-data">
                                                              @csrf



                                                                      <div class="form-group">
                                                                            Round:  <a>{{$value->round_number}}</a>
                                                                      </div>


                                                                <div class="form-group">
                                                                <a class="float-right" href="{{ route('organizer.deletePlayground',$value->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                                </div><br>

                                                        </form>
                                                      </div>
                                                @endif

                                          @endforeach



                       </div>













                      <div class="row justify-content-center mb-3 ">


                      <div class="card-header border-0">
                        <a class="text-center" data-toggle="modal" data-target="#targetRM" href=""><i class="fa fa-plus-square" aria-hidden="true"> Add Room</i></a>
                      </div>
                      <div class="col-md-12 heading-section text-center ftco-animate">
                          <h3>Rooms!</h3>
                      </div>
                      </div>

                      <div class="row">


                                          @foreach($rooms->reverse() as $value)

                                                @if($value->tournament == $tournaments->id )
                                                     <div class="col-lg-4 col-md-6 mb-4">
                                                        <form style="margin-left: 10px; margin-right: 10px; background: #d6d6d6;"  class="border border-light p-5" method="POST" action="{{route('organizer.updateRoomPost')}}" enctype="multipart/form-data">
                                                              @csrf

                                                              <input type="text" class="form-control" name="r_id" value="{{$value->id}}" aria-describedby="emailHelp" hidden>


                                                                @foreach($rounds->reverse() as $rn_value)
                                                                    @if($rn_value->id == $value->round )

                                                                      <div class="form-group">
                                                                            Round:  <a>{{$rn_value->round_number}}</a>
                                                                      </div>

                                                                    @endif
                                                                @endforeach

                                                                <div class="form-group">
                                                                    Room:  <a>{{$value->room_number}}</a>
                                                                </div>

                                                                <div class="form-group">
                                                                    Start at:  <a>{{$value->room_start_at}}</a>
                                                                </div>

                                                                <div class="form-group">
                                                                    Room Live:  <br><iframe style="max-width: 180px; max-height: 120px;" id="video" src="{{$value->room_screen}}" frameborder="0" allowfullscreen></iframe>
                                                                </div>

                                                                <div class="form-group">
                                                                    Room ID:  <a>{{$value->room_id}}</a>
                                                                </div>

                                                                <div class="form-group">
                                                                    Room Password:  <a>{{$value->room_pass}}</a>
                                                                </div>

                                                                <div class="form-group">
                                                                    Max Player:
                                                                    <input  type="number" class="form-control" name="max_player" value="{{$value->max_player}}" aria-describedby="emailHelp" >
                                                                </div>


                                                                <div class="form-group">
                                                                      <label >Status</label>
                                                                            <select style=" background: #27293d !important;" class="form-control" name="r_status" required>
                                                                                  <option  value="Starting" {{$value->room_status == "Starting"  ? 'selected' : ''}} >Starting</option>
                                                                                  <option  value="Started" {{$value->room_status == "Started"  ? 'selected' : ''}} >Started</option>
                                                                                  <option  value="End" {{$value->room_status == "End"  ? 'selected' : ''}} >End</option>
                                                                            </select>
                                                                </div>

                                                                <div class="form-group">
                                                                  <input type="submit"  class="btn btn-dark float-left" value="Save"/>
                                                                </div>

                                                                <div class="form-group">
                                                                <br><a class="float-right" href="{{ route('organizer.deleteRoom',$value->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                                </div><br>

                                                        </form>
                                                      </div>
                                                @endif

                                          @endforeach



                       </div>



















                      <div class="row justify-content-center pb-5 mb-3 ">


                      <div class="col-md-12 heading-section text-center ftco-animate">
                        <br> <br> <h3>Playgrounds!</h3>
                      </div>
                      </div>

                      <div class="row">






                                          @foreach($playgrounds->reverse() as $value)

                                                @if($value->tournament == $tournaments->id )
                                                     <div class="col-lg-4 col-md-6 mb-4">
                                                        <form style="margin-left: 10px; margin-right: 10px; background: #d6d6d6;"  class="border border-light p-5" method="POST" action="{{route('organizer.updateParticipatePost')}}" enctype="multipart/form-data">
                                                              @csrf


                                                                @foreach($rounds->reverse() as $rn_value)
                                                                    @if($rn_value->id == $value->round )

                                                                      <div class="form-group">
                                                                            Round:  <a>{{$rn_value->round_number}}</a>
                                                                      </div>

                                                                    @endif
                                                                @endforeach


                                                                @foreach($rooms->reverse() as $r_value)
                                                                    @if($r_value->id == $value->room )

                                                                      <div class="form-group">
                                                                            Room:  <a>{{$r_value->room_number}}</a>
                                                                      </div>

                                                                    @endif
                                                                @endforeach

                                                                <div class="form-group">
                                                                    Gamer:  <a>{{$value->gamer_email}}</a>
                                                                </div>

                                                                @foreach($participates->reverse() as $p_value)
                                                                    @if($p_value->tournament == $tournaments->id && $p_value->gamer_email == $value->gamer_email )

                                                                      <div class="form-group">
                                                                            Current Round:  <a> @if($p_value->round) {{$p_value->round}} @endif @if(!$p_value->round) 0 @endif </a>
                                                                      </div>

                                                                      <div class="form-group">
                                                                            'GH':  <a>{{$p_value->next_round}}</a>
                                                                      </div>

                                                                    @endif
                                                                @endforeach



                                                                <div class="form-group">
                                                                        <a class="float-left" href="{{route('organizer.pickNextRound',[$value->gamer_email, $tournaments->id])}}">  Give 'GH' <i class="far fa-share-square"></i> </a>
                                                                </div><br>



                                                                <div class="form-group">
                                                                    Gamer Live:  <br><iframe style="max-width: 180px; max-height: 120px;" id="video" src="{{$value->gamer_screen}}" frameborder="0" allowfullscreen></iframe>
                                                                </div><br>

                                                                <div class="form-group">
                                                                <a class="float-right" href="{{ route('organizer.deletePlayground',$value->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                                </div><br>

                                                        </form>
                                                      </div>
                                                @endif

                                          @endforeach



                     </div>











                                      <div class="row justify-content-center pb-5 mb-3 ">

                                      <div class="col-md-12 heading-section text-center ftco-animate">
                                      <br><br>  <h3>Tournament Participates!</h3>
                                      </div>
                                      </div>


                                      <div class="row">






                                                          @foreach($participates->reverse() as $value)

                                                                @if($value->tournament == $tournaments->id )
                                                                 <div class="col-lg-4 col-md-6 mb-4">
                                                                    <form style="margin-left: 10px; margin-right: 10px; background: #d6d6d6;"  class="border border-light p-5" method="POST" action="{{route('organizer.updateParticipatePost')}}" enctype="multipart/form-data">
                                                                          @csrf

                                                                          <div class="form-group">
                                                                              Current Round:  <a>@if($value->round) {{$value->round}} @endif @if(!$value->round) 0 @endif </a>
                                                                          </div>

                                                                            <div class="form-group">
                                                                                Gamer:  <a>{{$value->gamer_email}}</a>
                                                                            </div>


                                                                            <div class="form-group">
                                                                                Participate Fee:  <a>{{$value->participate_fee}}</a>
                                                                            </div><br>


                                                                            <div class="form-group">
                                                                                   Receive Bkash: <a>{{$value->organizer_bkash}}</a>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                Sender Bkash: <a>{{$value->gamer_bkash}}</a>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                Transaction ID: <a>{{$value->transaction_id}}</a>
                                                                            </div>


                                                                            @if($value->fee == "Pending")


                                                                                    <input type="number" name="p_id" class="form-control" value="{{$value->id}}"  hidden >

                                                                                    <div class="form-group">
                                                                                    <label >Fee</label>
                                                                                        <select style=" background: #27293d !important;" class="form-control" name="p_fee" required>
                                                                                            <option  value="Pending" {{$value->payment == "Pending"  ? 'selected' : ''}} >Pending</option>
                                                                                            <option  value="Approved" {{$value->payment == "Approved"  ? 'selected' : ''}} >Approved</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <input type="submit"  class="btn btn-dark float-left" value="Save"/><br> <br> <br> <br>

                                                                            @endif


                                                                            <div class="form-group">
                                                                                  <label for="gender">Fee Status: </label>
                                                                                  <span> {{$value->fee}} </span>
                                                                            </div>


                                                                    </form>
                                                                  </div>
                                                                @endif

                                                          @endforeach



                                      </div>

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
