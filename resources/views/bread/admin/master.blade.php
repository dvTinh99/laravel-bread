@include('bread.admin.layouts.header')
  <body class="with-welcome-text">
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      @include('bread.admin.layouts.navbar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        
        @include('bread.admin.layouts.sidebar')
        <!-- partial -->
        <div class="main-panel">
          @yield('content')
          <!-- content-wrapper ends -->
        </div>
        <!-- partial:partials/_footer.html -->
        <!-- partial -->
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
  </body>
  @include('bread.admin.layouts.footer')