@guest
@endguest
@auth('admin')
          <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link active" href="{{route('books.index')}}">
                    <span data-feather="home"></span>
                    Books <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('admin_view')}}">
                    <span data-feather="file"></span>
                    Book Requests
                  </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('BookAccepts.index')}}">
                    <span data-feather="shopping-cart"></span>
                    Book Accepts
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('BookMonitoring.index')}}">
                    <span data-feather="users"></span>
                    Book Monitoring
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('booklog')}}">
                      <span data-feather="users"></span>
                      Book Logs
                    </a>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('books.create')}}">
                    <span data-feather="bar-chart-2"></span>
                    Add Book
                  </a>
                </li>
                
              </ul>
          </nav>
@endauth

