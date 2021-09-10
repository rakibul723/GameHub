<title>Participate Tournament</title>

@extends('layouts.pageapp')


@section('content')


                    <!--Participate popup-->
                    <div class="panel-body">

                          <div style="top: 50px;" class="modal fade" id="targetP" role="dialog">
                          <div class="modal-dialog">
                          <div class="modal-content">
                          <div class="modal-header">
                              <h6 style="color: black;" class=modal-title>Participate Fee!</h6>
                              <a type="button" class="close" data-dismiss="modal" >&times</a>

                          </div>
                                <div class="modal-body">

                                    <form class="text-left border border-light p-5" method="POST" action="{{route('gamer.participatePost')}}" enctype="multipart/form-data">
                                    @csrf

                                       <input type="text" name="tournament_id" value="{{$tournaments->id}}" hidden/>
                                       <input type="text" name="t_organizer" value="{{$tournaments->organizer}}" hidden/>
                                       <input type="text" name="p_fee" value="{{$tournaments->participate_fee}}" hidden/>
                                       <input type="text" name="organizer_bkash" value="{{$phone}}" hidden/>

                                            <div class="form-group">
                                                Send <a>BDT: {{$tournaments->participate_fee}}</a>
                                            </div>
                                            <div class="form-group">
                                                Bkash Agent: <a>{{$phone}}</a>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="gamer_bkash" placeholder="Your Bkash Number" required/>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="t_id" placeholder="Transaction ID" required/>
                                            </div>




                                        <br><input type="submit"  class="btn btn-danger float-left" value="Confirm"/>
                                    </form>

                                </div>
                          <div class="modal-footer">
                          </div>
                          </div>
                          </div>
                          </div>


                    </div>
                    <!--Buy Participate end-->


<!-- Page content -->

      <div class="row justify-content-center">

        <div class="col-xl-8 order-xl-1" style="margin-left: 10px; margin-right: 10px;"><br><br><br><br>
          <div class="card shadow">

                <div class="row justify-content-center pb-5 mb-3 ">

                <div class="col-md-12 heading-section text-center ftco-animate">
                  <h3>Participate Tournament!</h3>
                </div>
                </div>

                <div class="row justify-content-center">

                                  <div class="col-lg-4 col-md-6 mb-4" >

                                  <form style="margin-left: 10px; margin-right: 10px;" class="border border-light p-5" method="POST" action="" enctype="multipart/form-data">
                                      @csrf

                                        <div class="form-group">
                                              <img src="{{$tournaments->poster}}" class="img-fluid" alt="Responsive image">
                                        </div>



                                        <div class="form-group">
                                             Tournament:  <a>{{$tournaments->tournament_name}}</a>
                                        </div>

                                        <div class="form-group">
                                             Game:  <a>{{$tournaments->game_name}}</a>
                                        </div>

                                        <div class="form-group">
                                             Start at:  <a>{{$tournaments->start_date}}</a>
                                        </div>

                                        <div class="form-group">
                                             Participate Fee:  <a>{{$tournaments->participate_fee}}</a>
                                        </div>


                                        <div class="form-group">
                                              <label for="gender">Status : </label>
                                              <span> {{$tournaments->t_status}} </span><br>
                                        </div>



                                      </form>

                                      @if($tournaments->t_status == "Participation")
                                      <center><button class="btn btn-danger" data-toggle="modal" data-target="#targetP" href=""><i class="fa fa-plus-square" aria-hidden="true">Participate</i></button><center>
                                      @endif
                                      </div>




                </div>





          </div>
        </div>

      </div><br><br>


@endsection
