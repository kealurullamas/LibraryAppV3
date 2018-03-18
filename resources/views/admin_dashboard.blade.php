@extends('layouts.admin')

@section('content')
<div class="admincontainer"> 
    <div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard <a href="{{route('BookAccepts.index')}}" class="btn btn-primary">Book Accepts</a>
                    <a class="btn btn-primary" href="#">Book Monitoring</a>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Book Requests
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Book Title</th>
                            <th scope="col">Requester</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(count($book_requests)>0)
                                @foreach($book_requests as $bookreq)
                                    @if($bookreq->status != 'Accepted'||'Rejected')
                                        <tr>
                                            <td><img src="{{asset('images/'.$bookreq->book->image)}}" class='img-thumbnail'></td>
                                            <td>{{$bookreq->book->title}}</td>
                                            <td><a href="{{route('admin.show',$bookreq->user->id)}}">{{$bookreq->user->name}}</a></td>
                                            <td>{{$bookreq->status}}</td>
                                            <!--<td><a href="" class="btn btn-success">Accept</td>-->
                                            <td>
                                                {!!Form::open(['action'=>['BookRequestsController@update',$bookreq->id],'method'=>'POST'])!!}
                                                    {{Form::hidden('status','Accepted')}} 
                                                    {{Form::submit('Accept',['class'=>'btn btn-success'])}}
                                                    {{Form::hidden('_method','PUT')}}
                                                {!!Form::close()!!}
                                            </td>
                                            <td>
                                                {!!Form::open(['action'=>['BookRequestsController@update',$bookreq->id],'method'=>'POST'])!!}
                                                    {{Form::hidden('status','Rejected')}} 
                                                    {{Form::submit('Reject',['class'=>'btn btn-danger'])}}
                                                    {{Form::hidden('_method','PUT')}}
                                                {!!Form::close()!!}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{$book_requests->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
