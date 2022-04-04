   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
       <!-- Left navbar links -->
       <ul class="navbar-nav">
           <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
           </li>
           <li class="nav-item d-none d-sm-inline-block">
               <a href="{{ route('home') }}" class="nav-link">Home</a>
           </li>
       </ul>

       <!-- Right navbar links -->
       <ul class="navbar-nav ml-auto">
           <!-- Navbar Search -->
           <!-- Notifications Dropdown Menu -->
           <li class="nav-item">
               <form action="{{ route('logout') }}" method="POST">
                   @csrf
                   <button type="submit" class="nav-link bg-transparent border-0 btn-lg">
                       <span class="fas fa-sign-out-alt"></span>
                   </button>
               </form>
           </li>
       </ul>
   </nav>
