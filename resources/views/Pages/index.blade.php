@extends('Layouts.app')

@section('content')
    <div class="Searchcontainer">
        <h1 class="title">Sotero H. Laurel Academic Resource Center</h1>
        {!!Form::open(['action'=>"BooksController@search",'method'=>'POST'])!!}
        <!--{{Form::label('title','Search A book')}} 
        {{Form::text('book','',['placeholder'=>'Search for a book or author...', 'class'=>'searchBox'])}}
        {{Form::submit('Search',['class'=>'btn btn-primary-search'])}}
        {!!Form::close()!!} 
        -->
        <div class="container">
            <div class="row" id="slider-text">
              <div class="col-md-6" >
                <h2>NEW BOOKS COLLECTION</h2>
              </div>
            </div>
          </div>
          
          <!-- Item slider-->
          <div class="container-fluid">
          
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="carousel carousel-showmanymoveone slide" id="itemslider">
                  <div class="carousel-inner">
          
                    <div class="item active">
                        <div class="col-xs-12 col-sm-6 col-md-2">
                            <a href="#"><img src="{{asset('images/c++.png')}}" class="img-responsive center-block"></a>
                            <h4 class="text-center"></h4>
                          </div>
                    </div>
          
                    @foreach($books as $book)
                    <div class="item">
                      <div class="col-xs-12 col-sm-6 col-md-2">
                        <a href="#"><img src="{{asset('images/'.$book->image)}}" class="img-responsive center-block"></a>
                        <h4 class="text-center">{{$book->title}}</h4>
                      </div>
                     
                    </div>
                    @endforeach
                    
          
                  </div>
          
                  <div id="slider-control">
                  <a class="left carousel-control" href="#itemslider" data-slide="prev"><img src="https://s12.postimg.org/uj3ffq90d/arrow_left.png" alt="Left" class="img-responsive"></a>
                  <a class="right carousel-control" href="#itemslider" data-slide="next"><img src="https://s12.postimg.org/djuh0gxst/arrow_right.png" alt="Right" class="img-responsive"></a>
                </div>
                </div>
              </div>
            </div>
          </div>
    </div>
    
@endsection