@extends('Layouts.app')

@section('content')
    <div class="Searchcontainer">
        <h1 class="title">Sotero H. Laurel Academic Resource Center</h1>

        <div class="container">
            <div class="row" id="slider-text">
              <div class="col-md-6" >
                <h1 class="home-title">NEW BOOKS COLLECTION</h1>
              </div>
            </div>
          </div>
          
          <!-- Item slider-->
          <div class="container-fluid">
          
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="carousel carousel-showmanymoveone slide" id="itemslider">
                  <div class="carousel-inner">
          
                   
          
                    @foreach($books as $book)
                      @if($book['id']==$books[0]['id'])
                        <div class="item active">
                          <div class="col-xs-12 col-sm-6 col-md-2">
                              <a href="{{route('bookShow',$book->id)}}"><img src="{{asset('storage/images/'.$book->image)}}" class="img-responsive center-block"></a>
                              <h4 class="text-center">{{$book->title}}</h4>
                            </div>
                        </div>
                      @else
                      <div class="item">
                        <div class="col-xs-12 col-sm-6 col-md-2">
                          <a href="{{route('bookShow',$book->id)}}"><img src="{{asset('storage/images/'.$book->image)}}" class="img-responsive center-block"></a>
                          <h4 class="text-center">{{$book->title}}</h4>
                        </div>
                      </div>
                      @endif
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