
          <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link active" href="{{route('admin_view')}}">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
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
                  <a class="nav-link" href="{{route('books.create')}}">
                    <span data-feather="bar-chart-2"></span>
                    Add Book
                  </a>
                </li>
                
              </ul>
          </nav>

