@extends('Layouts.admin')

@section('content')
<div class="Searchcontainer bootstrap snippet">
        <div class="row">
            <div class="col-md-15">
            <div class="panel panel-default">
            <div class="panel-body">
                        <div class="row">
                              <div class="col-xs-12 col-sm-8">
                                  <h2 class="text-primary"><b></span> {{$user->name}}</b></h2>
                                  <p><strong></span>Email: </strong>{{$user->email}}</p>
                                  <p><strong></span>Account Created at: </strong>{{$user->created_at}}</p>
                              </div><!--/col-->          
                              <div class="col-xs-12 col-sm-4 text-center">
                                     
                              </div><!--/col-->
      
                              <div class="col-xs-12 col-sm-4">
                                  <h2><strong>{{$requests}} </strong></h2>                    
                                  <p><small>Book Requests</small></p>
                                  
                              </div><!--/col-->
                              <div class="col-xs-12 col-sm-4">
                                  <h2><strong>{{$onHand}}</strong></h2>                    
                                  <p><small>Books on Hand</small></p>
                              </div><!--/col-->
                        </div><!--/row-->
                    </div><!--/panel-body-->
                </div><!--/panel-->
          </div>
        </div>
      </div>       
@endsection