<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="far fa-comments"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <a href="{{ url('/admin/data-feedback') }}" class="dropdown-item">
        <!-- Message Start -->
        <div class="media">
          <div class="media-body">
            <h3 class="dropdown-item-title">
              {{ $data['feedback']->name }}
            </h3>
            <p class="text-sm">{{ $data['feedback']->message }}</p>
            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ $data['feedback']->created_at }}</p>
          </div>
        </div>
        <!-- Message End -->
      </a>
      <div class="dropdown-divider"></div>
      <a href="{{ url('/admin/data-feedback') }}" class="dropdown-item dropdown-footer">See All Feedback</a>
    </div>
  </li>