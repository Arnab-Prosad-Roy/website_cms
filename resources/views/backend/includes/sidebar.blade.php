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
      </li><!-- End blog Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#events-nav" data-bs-toggle="collapse" href="#" aria-expanded="@if(request()->url() ==route('admin.blog.index') ) 
                  true 
                  @elseif(request()->url() == route('admin.event.create') ) 
                  true 
                  @elseif(url('admin/category/event/type/') == request()->url()) 
                  true
                  @elseif(url('admin/category/event/create/') == request()->url() ) 
                  true 
                  @else
                  false
                  @endif" >
          <i class="bi bi-menu-button-wide"></i><span>Events</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="events-nav" class="nav-content collapse @if(request()->url() ==route('admin.event.index') ) 
                  show 
                  @elseif(request()->url() == route('admin.event.create') ) 
                  show 
                  @elseif(url('admin/category/event/type/') == request()->url()) 
                  show
                  @elseif(url('admin/category/event/create/') == request()->url() ) 
                  show 
                  @else
                  @endif" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.event.create')}}">
              <i class="bi bi-circle"></i><span>Create Event</span>
            </a>
          </li>          
          <li>
            <a href="{{route('admin.event.index')}}">
              <i class="bi bi-circle"></i><span>Manage Blogs</span>
            </a>
          </li>
          </li>

        </ul>
      </li><!-- End event Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#achivement-nav" data-bs-toggle="collapse" href="#" aria-expanded="@if(request()->url() ==route('admin.blog.index') ) 
                  true 
                  @elseif(request()->url() == route('admin.achivement.create') ) 
                  true 
                  @elseif(url('admin/category/achivement/type/') == request()->url()) 
                  true
                  @elseif(url('admin/category/achivement/create/') == request()->url() ) 
                  true 
                  @else
                  false
                  @endif" >
          <i class="bi bi-menu-button-wide"></i><span>Achivements</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="achivement-nav" class="nav-content collapse @if(request()->url() ==route('admin.achivement.index') ) 
                  show 
                  @elseif(request()->url() == route('admin.achivement.create') ) 
                  show 
                  @elseif(url('admin/category/achivement/type/') == request()->url()) 
                  show
                  @elseif(url('admin/category/achivement/create/') == request()->url() ) 
                  show 
                  @else
                  @endif" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.achivement.create')}}">
              <i class="bi bi-circle"></i><span>Create Achivements</span>
            </a>
          </li>          
          <li>
            <a href="{{route('admin.achivement.index')}}">
              <i class="bi bi-circle"></i><span>Manage Achivements</span>
            </a>
          </li>
          <li>
            <a href="{{route('admin.achivement.index',['slug'=>'achivement'])}}">
              <i class="bi bi-circle"></i><span>Manage Achivements</span>
            </a>
          </li>          
          <li>
            <a href="{{route('admin.achivement.create',['slug'=>'achivement'])}}">
              <i class="bi bi-circle"></i><span>Create Achivements</span>
            </a>
          </li>

        </ul>
      </li><!-- End achivement Nav --> 

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#member-nav" data-bs-toggle="collapse" href="#" aria-expanded="@if(request()->url() ==route('admin.blog.index') ) 
                  true 
                  @elseif(request()->url() == route('admin.member.create') ) 
                  true 
                  @elseif(url('admin/category/member/type/') == request()->url()) 
                  true
                  @elseif(url('admin/category/member/create/') == request()->url() ) 
                  true 
                  @else
                  false
                  @endif" >
          <i class="bi bi-menu-button-wide"></i><span>Members</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="member-nav" class="nav-content collapse @if(request()->url() ==route('admin.member.index') ) 
                  show 
                  @elseif(request()->url() == route('admin.member.create') ) 
                  show 
                  @elseif(url('admin/category/member/type/') == request()->url()) 
                  show
                  @elseif(url('admin/category/member/create/') == request()->url() ) 
                  show 
                  @else
                  @endif" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.member.create')}}">
              <i class="bi bi-circle"></i><span>Create Member</span>
            </a>
          </li>          
          <li>
            <a href="{{route('admin.member.index')}}">
              <i class="bi bi-circle"></i><span>Manage Members</span>
            </a>
          </li>
        </ul>
      </li><!-- End member Nav -->  

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#question-nav" data-bs-toggle="collapse" href="#" aria-expanded="@if(request()->url() ==route('admin.blog.index') ) 
                  true 
                  @elseif(request()->url() == route('admin.question.create') ) 
                  true 
                  @elseif(url('admin/category/question/type/') == request()->url()) 
                  true
                  @elseif(url('admin/category/question/create/') == request()->url() ) 
                  true 
                  @else
                  false
                  @endif" >
          <i class="bi bi-menu-button-wide"></i><span>Questions</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="question-nav" class="nav-content collapse @if(request()->url() ==route('admin.question.index') ) 
                  show 
                  @elseif(request()->url() == route('admin.question.create') ) 
                  show 
                  @elseif(url('admin/category/question/type/') == request()->url()) 
                  show
                  @elseif(url('admin/category/question/create/') == request()->url() ) 
                  show 
                  @else
                  @endif" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.question.create')}}">
              <i class="bi bi-circle"></i><span>Create Questions</span>
            </a>
          </li>          
          <li>
            <a href="{{route('admin.question.index')}}">
              <i class="bi bi-circle"></i><span>Manage Questions</span>
            </a>
          </li>
        </ul>
      </li><!-- End question Nav -->  

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#testimonial-nav" data-bs-toggle="collapse" href="#" aria-expanded="@if(request()->url() ==route('admin.blog.index') ) 
                  true 
                  @elseif(request()->url() == route('admin.testimonial.create') ) 
                  true 
                  @elseif(url('admin/category/testimonial/type/') == request()->url()) 
                  true
                  @elseif(url('admin/category/testimonial/create/') == request()->url() ) 
                  true 
                  @else
                  false
                  @endif" >
          <i class="bi bi-menu-button-wide"></i><span>Testimonials</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="testimonial-nav" class="nav-content collapse @if(request()->url() ==route('admin.testimonial.index') ) 
                  show 
                  @elseif(request()->url() == route('admin.testimonial.create') ) 
                  show 
                  @elseif(url('admin/category/testimonial/type/') == request()->url()) 
                  show
                  @elseif(url('admin/category/testimonial/create/') == request()->url() ) 
                  show 
                  @else
                  @endif" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.testimonial.create')}}">
              <i class="bi bi-circle"></i><span>Create Testimonial</span>
            </a>
          </li>          
          <li>
            <a href="{{route('admin.testimonial.index')}}">
              <i class="bi bi-circle"></i><span>Manage Testimonials</span>
            </a>
          </li>
        </ul>
      </li><!-- End testimonial Nav --> 
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#certification-nav" data-bs-toggle="collapse" href="#" aria-expanded="@if(request()->url() ==route('admin.blog.index') ) 
                  true 
                  @elseif(request()->url() == route('admin.certification.create') ) 
                  true 
                  @elseif(url('admin/category/certification/type/') == request()->url()) 
                  true
                  @elseif(url('admin/category/certification/create/') == request()->url() ) 
                  true 
                  @else
                  false
                  @endif" >
          <i class="bi bi-menu-button-wide"></i><span>Certifications</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="certification-nav" class="nav-content collapse @if(request()->url() ==route('admin.certification.index') ) 
                  show 
                  @elseif(request()->url() == route('admin.certification.create') ) 
                  show 
                  @elseif(url('admin/category/certification/type/') == request()->url()) 
                  show
                  @elseif(url('admin/category/certification/create/') == request()->url() ) 
                  show 
                  @else
                  @endif" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.certification.create')}}">
              <i class="bi bi-circle"></i><span>Create Certification</span>
            </a>
          </li>          
          <li>
            <a href="{{route('admin.certification.index')}}">
              <i class="bi bi-circle"></i><span>Manage Certifications</span>
            </a>
          </li>
        </ul>
      </li><!-- End certification Nav --> 
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#clients-nav" data-bs-toggle="collapse" href="#" aria-expanded="@if(request()->url() ==route('admin.blog.index') ) 
                  true 
                  @elseif(request()->url() == route('admin.clients.create') ) 
                  true 
                  @elseif(url('admin/category/clients/type/') == request()->url()) 
                  true
                  @elseif(url('admin/category/clients/create/') == request()->url() ) 
                  true 
                  @else
                  false
                  @endif" >
          <i class="bi bi-menu-button-wide"></i><span>Clients</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="clients-nav" class="nav-content collapse @if(request()->url() ==route('admin.clients.index') ) 
                  show 
                  @elseif(request()->url() == route('admin.clients.create') ) 
                  show 
                  @elseif(url('admin/category/clients/type/') == request()->url()) 
                  show
                  @elseif(url('admin/category/clients/create/') == request()->url() ) 
                  show 
                  @else
                  @endif" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.clients.create')}}">
              <i class="bi bi-circle"></i><span>Create Clients</span>
            </a>
          </li>          
          <li>
            <a href="{{route('admin.clients.index')}}">
              <i class="bi bi-circle"></i><span>Manage Clients</span>
            </a>
          </li>
        </ul>
      </li><!-- End client Nav --> 
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#partner-nav" data-bs-toggle="collapse" href="#" aria-expanded="@if(request()->url() ==route('admin.blog.index') ) 
                  true 
                  @elseif(request()->url() == route('admin.clients.create') ) 
                  true 
                  @elseif(url('admin/category/clients/type/') == request()->url()) 
                  true
                  @elseif(url('admin/category/clients/create/') == request()->url() ) 
                  true 
                  @else
                  false
                  @endif" >
          <i class="bi bi-menu-button-wide"></i><span>Partners</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="partner-nav" class="nav-content collapse @if(request()->url() ==route('admin.partner.index') ) 
                  show 
                  @elseif(request()->url() == route('admin.partner.create') ) 
                  show 
                  @elseif(url('admin/category/partner/type/') == request()->url()) 
                  show
                  @elseif(url('admin/category/partner/create/') == request()->url() ) 
                  show 
                  @else
                  @endif" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.partner.create')}}">
              <i class="bi bi-circle"></i><span>Create Partner</span>
            </a>
          </li>          
          <li>
            <a href="{{route('admin.partner.index')}}">
              <i class="bi bi-circle"></i><span>Manage Partner</span>
            </a>
          </li>
        </ul>
      </li><!-- End partner Nav --> 

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#slider-nav" data-bs-toggle="collapse" href="#" aria-expanded="@if(request()->url() ==route('admin.blog.index') ) 
                  true 
                  @elseif(request()->url() == route('admin.slider.create') ) 
                  true 
                  @elseif(url('admin/category/slider/type/') == request()->url()) 
                  true
                  @elseif(url('admin/category/slider/create/') == request()->url() ) 
                  true 
                  @else
                  false
                  @endif" >
          <i class="bi bi-menu-button-wide"></i><span>Slider</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="slider-nav" class="nav-content collapse @if(request()->url() ==route('admin.slider.index') ) 
                  show 
                  @elseif(request()->url() == route('admin.slider.create') ) 
                  show 
                  @elseif(url('admin/category/slider/type/') == request()->url()) 
                  show
                  @elseif(url('admin/category/slider/create/') == request()->url() ) 
                  show 
                  @else
                  @endif" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.slider.create')}}">
              <i class="bi bi-circle"></i><span>Create Slider</span>
            </a>
          </li>          
          <li>
            <a href="{{route('admin.slider.index')}}">
              <i class="bi bi-circle"></i><span>Manage Slider</span>
            </a>
          </li>
        </ul>
      </li><!-- End partner Nav --> 
    </ul>

  </aside><!-- End Sidebar-->