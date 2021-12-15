<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="far fa-comments"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <a href="{{ url('/admin/data-feedback') }}" class="dropdown-item">
        <!-- Message Start -->
        <div class="media">
          @if (empty($data['feedback']))
            <div class="media-body">
              <p class="text-sm">No data available to show</p>
            @else                
            <img src="/img/undraw_profile.svg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                {{ $data['feedback']->name }}
              </h3>
              <p class="text-sm">{{ $data['feedback']->message }}</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ $data['feedback']->created_at }}</p>
            @endif
          </div>
        </div>
        <!-- Message End -->
      </a>
      <div class="dropdown-divider"></div>
      <a href="{{ url('/admin/data-feedback') }}" class="dropdown-item dropdown-footer">See All Feedback</a>
    </div>
  </li>