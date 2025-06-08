
 <!--  Body Wrapper -->
 <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
 data-sidebar-position="fixed" data-header-position="fixed">
 <!-- Sidebar Start -->
  <aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
         <img src="{{ asset('image/logo.jpg') }} " class=" logo">
        <a href="./index.html" class="text-nowrap logo-img">
          {{-- <img src="../assets/images/logos/logo-light.svg" alt="" /> --}}
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul calss="sidebarnav nav nav-pills">
            @php $id = session('user_id'); @endphp
              @if($id==2)
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
            <span class="hide-menu">Home</span>
          </li>
           
          <li class="sidebar-item nav-item">
             
            <a class="sidebaritem nav-link "  href="{{ route('index') }}" aria-expanded="false">
        <span>
                <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
              </span>    Dashboard
            </a>
          </li>
            @endif
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
            <span class="hide-menu">UI COMPONENTS</span>
          </li>
          <li class="sidebar-item">
             
              <a class="sidebaritem nav-link" href="{{ route('employe') }}"> <span>
                <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
              </span> Employé  

          </li>
          <li class="sidebar-item">
            
              <a  class="sidebaritem nav-link" href="{{ route('pointage') }}">  <span>
                <iconify-icon icon="solar:danger-circle-bold-duotone" class="fs-6"></iconify-icon>
              </span> Pointage  </a>

          </li>
          <li class="sidebar-item">
             
              <a  class="sidebaritem nav-link" href="{{ route('conge') }}"> <span>
                <iconify-icon icon="solar:bookmark-square-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
              </span> Congé  </a>
          </li>

          <li class="sidebar-item">
            
            <a  class="sidebaritem nav-link" href="{{ route('projet') }}"><span>
              <iconify-icon icon="solar:bookmark-square-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
            </span> Projet  </a>
        </li>
            @if($id==2)
 <li class="sidebar-item">
         
          <a class="sidebaritem nav-link" href="{{ route('salaire') }}"> <span>
            <iconify-icon icon="solar:bookmark-square-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
          </span> salaire  </a>
      </li>
      
             <li class="sidebar-item">
        
          <a  class="sidebaritem nav-link" href="{{ route('budget') }}">  <span>
            <iconify-icon icon="solar:bookmark-square-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
          </span> budget  </a>
      </li>
        
        <li class="sidebar-item">
        
          <a  class="sidebaritem nav-link" href="{{ route('costs') }}">  <span>
            <iconify-icon icon="solar:bookmark-square-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
          </span> costs  </a>
      </li>
        @endif  
       <li class="sidebar-item">
          <a  class="sidebaritem nav-link" href="{{ route('rapport') }}">  <span>
            <iconify-icon icon="solar:bookmark-square-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
          </span> Rapport  </a>
      </li>   
        </ul>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
  <!--  Sidebar End -->

  