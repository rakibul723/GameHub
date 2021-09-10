
@extends('admin/layouts.adminapp')


@section('content')
<title> Add Game</title>




         




<div class="pcoded-content">
   <div class="pcoded-inner-content">
    <!-- Main-body start -->
        <div class="main-body">



        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-8">


                        <form class="text-left border border-dark p-5" method="POST" action="upload.game" enctype="multipart/form-data">
                            @csrf
                                <input type="text" name="id" value="" hidden/>
                                <a class = "label label-left">Game Name</a>
                                <input type="text" name="game_name" class="form-control mb-4" placeholder="Game Name" value="">

                                <a class = "label label-left">Game Details</a><br>
                                <input type="text" name="game_details" class="form-control mb-4" placeholder="Game Details" value="" >

                                <div class="form-group">
                                        <img id="preview_n_id" src="" style="max-width:68px; margin-top:10px;"/><br><br>
                                        <label for="exampleInputPassword1">Game logo</label><br>
                                        <input  type="file" name="game-logo" placeholder="Shop Banner" onchange="n_id_view(this)"/>
                                </div>

                                <a class = "label label-left">Game file</a><br>
                                <label for="exampleInputPassword1">Game file</label><br>
                                <input type="file" name="game_logo" class="form-control mb-4"  value="" >

                                
                                <!-- Send button -->
                                <button class="btn btn-primary" type="submit">Add Gmme</button><br><br>
                                
                        </form>




                    </div>
              </div>
        </div>





          </div>
    </div>
</div>








@endsection
