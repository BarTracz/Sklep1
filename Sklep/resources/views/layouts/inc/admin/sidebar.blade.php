<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/brand') }}">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Brands</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#products" aria-expanded="false" aria-controls="product">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Products</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="products">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/products/create') }}">Add Products</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/products') }}">View Products</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/sliders') }}">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Slider</span>
        </a>
      </li>
    </ul>
  </nav>