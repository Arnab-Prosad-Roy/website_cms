  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#" aria-expanded="@if(request()->url() ==route('admin.blog.index') ) 
                  true 
                  @elseif(request()->url() == route('admin.blog.create') ) 
                  true 
                  @elseif(url('admin/category/blog/type/') == request()->url()) 
                  true
                  @elseif(url('admin/category/blog/create/') == request()->url() ) 
                  true 
                  @else
                  false
                  @endif" >
          <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse @if(request()->url() ==route('admin.blog.index') ) 
                  show 
                  @elseif(request()->url() == route('admin.blog.create') ) 
                  show 
                  @elseif(url('admin/category/blog/type/') == request()->url()) 
                  show
                  @elseif(url('admin/category/blog/create/') == request()->url() ) 
                  show 
                  @else
                  @endif" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.blog.create')}}">
              <i class="bi bi-circle"></i><span>Blog</span>
            </a>
          </li>          
          <li>
            <a href="{{route('admin.blog.index')}}">
              <i class="bi bi-circle"></i><span>Manage Blogs</span>
            </a>
          </li>
          <li>
            <a href="{{route('admin.category.index',['slug'=>'blog'])}}">
              <i class="bi bi-circle"></i><span>Manage Categories</span>
            </a>
          </li>          
          <li>
            <a href="{{route('admin.category.create',['slug'=>'blog'])}}">
              <i class="bi bi-circle"></i><span>Create Categories</span>
            </a>
          </li>

        </ul>
      </li><!-- End Components Nav -->

    </ul>

  </aside><!-- End Sidebar-->