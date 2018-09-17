<div class="alert alert-{{ session('notification.class') }} alert-dismissible fade show" role="alert">
  <h4 class="alert-heading">{{ session('notification.title') }}</h4>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <p>{{ session('notification.message') }}</p>
</div>