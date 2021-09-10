<title>Participates</title>

@extends('layouts.pageapp')


@section('content')



<!--Submit My Screen popup-->
<div class="panel-body">

      <div style="top: 50px;" class="modal fade " id="targetR" role="dialog">
      <div class="modal-dialog">
      <div class="modal-content">

            <div class="modal-header">
                <h6 style="color: black;" class=modal-title>Join Room!</h6>
                <button type="button" class="close" data-dismiss="modal" >&times</button>

            </div>
            <div class="modal-body" style="background: #6c757dab;">

              <form  class="border border-light p-5" method="POST" action="{{route('gamer.joinPlayGround')}}" enctype="multipart/form-data">
                  @csrf
                     <div class="form-group">
                           <label for="gender">Your Screen Embed Code: </label>
                           <input  type="text" class="form-control" name="gamer_screen" aria-describedby="emailHelp" >
                     </div><br>


                     <div class="form-group">
                       <input type="submit"  class="btn btn-danger float-left" value="Join"/>
                     </div><br>


              </form>

            </div>
            <div class="modal-footer">
            </div>

      </div>
      </div>
      </div>

</div>
<!--Submit My Screen popup end-->








<!--Submit Score popup-->
<div class="panel-body">

      <div style="top: 50px;" class="modal fade " id="targetSS" role="dialog">
      <div class="modal-dialog">
      <div class="modal-content">

            <div class="modal-header">
                <h6 style="color: black;" class=modal-title>Submit Score!</h6>
                <button type="button" class="close" data-dismiss="modal" >&times</button>

            </div>
            <div class="modal-body" style="background: #6c757dab;">

              <form  class="border border-light p-5" enctype="multipart/form-data">
                  @csrf
                     <div class="form-group">
                           <label for="gender">Score Screenshot: </label><br>
                           <input type="number" name="tournament" value="" hidden/>
                           <img id="previewSS" src="images/blankimg.png" style="max-width:130px; margin-top:20px;"/><br><br>
                     </div>

                     <div class="form-group">
                           <input required type="file" name="sc_ss"  onchange="ssPreview(this)"/>
                     </div><br>

                     <div class="form-group">
                       <input type="submit"  class="btn btn-danger float-left" value="Submit"/>
                     </div><br>


              </form>

            </div>
            <div class="modal-footer">
            </div>

      </div>
      </div>
      </div>

</div>
<!--Submit Score popup end-->












<!-- Page content -->

      <div class="row justify-content-center">

        <div class="col-xl-8 order-xl-1" style="margin-left: 10px; margin-right: 10px;"><br><br><br><br>
          <div class="card shadow">

                <div class="row justify-content-center pb-5 mb-3 ">

                <div class="col-md-12 heading-section text-center ftco-animate">
                  <h3>My Participates!</h3>
                </div>
                </div>

                <div class="row justify-content-center">

                  @foreach($participates->reverse() as $value)

                           @if($value->gamer_email == Auth::user()->email )


                                  @foreach($tournaments->reverse() as $t_value)
                                        @if($t_value->id == $value->tournament )

                                          <div class="col-lg-4 col-md-6 mb-4" >

                                              <form class="border border-light p-5">




                                                <div class="form-group">
                                                      <img src="{{$t_value->poster}}" class="img-fluid" alt="Responsive image">
                                                </div>




                                                <div class="form-group">
                                                    <a>{{$t_value->tournament_name}}</a>
                                                </div>

                                                <div class="form-group">
                                                    Game:  <a>{{$t_value->game_name}}</a>
                                                </div>

                                                <div class="form-group">
                                                     Start at:  <a>{{$t_value->start_date}}</a>
                                                </div>

                                                <div class="form-group">
                                                    Participate Fee:  <a>{{$t_value->participate_fee}}</a>
                                                </div><br>


                                                <div class="form-group">
                                                      <label for="gender">Fee Status: </label>
                                                      <span> {{$value->fee}} </span><br>
                                                </div><br>

                                                <div class="form-group">
                                                      <label for="gender">Tournament: </label>
                                                      <span> {{$t_value->t_status}} </span><br>
                                                </div><br>

                                                <div class="form-group">
                                                     Round <a> @if($value->round) {{$value->round}} @endif @if(!$value->round) 0 @endif </a>
                                                </div>

                                              </form>



                                                  @if($t_value->t_status == "Started")
                                                     @foreach($rooms->reverse() as $r_value)
                                                         @if($r_value->tournament == $t_value->id && $r_value->max_player && $r_value->room_status == "Starting" && $value->fee == "Approved")

                                                        <!--   <?php $total_in_room = 0; ?>


                                                         @foreach($playgrounds->reverse() as $pg_value)
                                                             @if($pg_value->round == $r_value->round && $pg_value->tournament == $r_value->tournament &&  $pg_value->room == $r_value->id)

                                                                     <?php $total_in_room++; ?>

                                                             @endif
                                                         @endforeach -->



                                                          @foreach($rounds->reverse() as $rn_value)
                                                                @if($value->round != $rn_value->round_number && $value->next_round )

                                                                  @if($rn_value->id == $r_value->round )

                                                                      <form  class="border border-light p-5" method="POST" action="{{route('gamer.joinPlayGround')}}" enctype="multipart/form-data">
                                                                         @csrf

                                                                             <div class="form-group">
                                                                                   <label for="gender">Round: </label>


                                                                                           <span> {{$rn_value->round_number}} </span>


                                                                             </div>
                                                                               <div class="form-group">
                                                                                     <label for="gender">Room Number : </label>
                                                                                     <span> {{$r_value->room_number}} </span>
                                                                               </div>
                                                                               <div class="form-group">
                                                                                     <label for="gender">Room Start at: </label>
                                                                                     <span> {{$r_value->room_start_at}} </span>
                                                                               </div>
                                                                               <div class="form-group">
                                                                                     <label for="gender">Room Screen: </label>
                                                                                     <span> {{$r_value->room_screen}} </span>
                                                                               </div><br>
                                                                               <div class="form-group">
                                                                                     <label for="gender">Room ID: </label>
                                                                                     <span> {{$r_value->room_id}} </span>
                                                                               </div>
                                                                               <div class="form-group">
                                                                                     <label for="gender">Room Password: </label>
                                                                                     <span> {{$r_value->room_pass}} </span>
                                                                               </div>
                                                                               <div class="form-group">
                                                                                     <label for="gender">Player Left: </label>
                                                                                     <span> {{$r_value->max_player}} </span>
                                                                               </div>



                                                                                      <input  type="number" class="form-control" name="tournament" value="{{$t_value->id}}" hidden >
                                                                                      <input  type="number" class="form-control" name="round" value="{{$r_value->round}}" hidden >
                                                                                      <input  type="number" class="form-control" name="room" value="{{$r_value->id}}" hidden >



                                                                                      <div class="form-group">
                                                                                            <label for="gender">Your Screen Embed Code: </label>
                                                                                            <input  type="text" class="form-control" name="gamer_screen" aria-describedby="emailHelp" >
                                                                                      </div><br>


                                                                                      <div class="form-group">
                                                                                        <input type="submit"  class="btn btn-danger float-left" value="Join"/>
                                                                                      </div><br>


                                                                        </form>
                                                                    @endif

                                                                @endif
                                                           @endforeach

                                                         @endif
                                                     @endforeach
                                                  @endif











                                              </div>

                                        @endif
                                  @endforeach


                          @endif

                    @endforeach




                </div>





          </div>
        </div>

      </div><br><br>


      <script>


            function ssPreview(input){
                var file = $("input[type=file]").get(0).files[0];
                if(file){
                    var reader = new FileReader();
                    reader.onload = function(){
                        $("#previewSS").attr("src",reader.result);
                    }
                    reader.readAsDataURL(file);
                }
            }


      </script>


@endsection
