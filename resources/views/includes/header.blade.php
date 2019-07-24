<div class="header-outs" id="home">
      <div class="header-bar">
         <div class="info-top-grid">
            <div class="info-contact-agile">
               <ul>
                  <li>
                     <span class="fas fa-phone-volume"></span>
                     <p>+(0274)374770</p>
                  </li>
                  <li>
                     <span class="fas fa-envelope"></span>
                     <p><a href="mailto:vmale@gmail.com">vmale@gmail.com</a></p>
                  </li>
                  <li>
                  </li>
               </ul>
            </div>
         </div>
         <div class="container-fluid">
            <div class="hedder-up row">
            
               <div class="col-lg-3 col-md-3 logo-head">
               
                  <h1><a class="navbar-brand" href="{{route('index')}}">Vmale Fashion</a></h1>
               </div>

               <!-- <form class="form-inline" action="{{ route('barang.index') }}" method="get">
                 <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Pencarian">
                 </div>
                 <div class="form-group">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                 </div>
                </form> -->

               <div class="col-lg-5 col-md-6 search-right">
                  <form class="form-inline my-lg-0"  action="{{ route('index') }}" method="get">
                     <input class="form-control mr-sm-2" type="text" name="search" type="search" placeholder="Pencarian">
                     <button class="btn" type="submit">Search</button>
                  </form>
               </div>
               
               <div class="col-lg-4 col-md-3 right-side-cart">
               
            
                  <div class="cart-icons">
                     <ul>
                     <li> <a href="{{url('favorit')}}"><i><span class="far fa-heart"></span></i></a></li>
                     <li>  <a href="{{url('cart')}}"><i><span class="fas fa-shopping-cart"></span></i></a></li> 
                        <li>
                        
                        @guest
                         <a href="{{route('login')}}"> <i><span class="fa fa-user"></span></i></a>
                         @else
                         <nav class="navbar navbar-light ">
                        
                           <a class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              {{ Auth::user()->nama }} <span class="caret"></span>
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="nav-link" href="{{route('profil')}}">Akun</a>
                              @php $users1 = Auth::user()->id; @endphp
                              <a class="nav-link " href="{{route('riwayat',$users1)}}"}>Riwayat</a>
                              <!-- <a class="nav-link " href="{{url('tracking')}}">Lacak Pengiriman</a>
                              <a href="{{route('ongkir')}}" class="nav-link">Cek Ongkir</a> -->
                    
                              <?php if (Auth::user()->ID_Peran == 2): ?>
                              <a class="nav-link" href="{{route('dashboard.create')}}"> Admin </a>
                              <?php else : ?>
                              
                              <?php endif; ?>

                              <?php if (Auth::user()->ID_Peran == 3): ?>
                              <a class="nav-link" href="{{route('dashboard.create')}}"> Admin </a>
                              <?php else: ?>
                              
                              <?php endif; ?>

                             
                              <a class="nav-link" href="{{ route('logout') }}"
                              onclick="event.preventDefault(); 
                                          document.getElementById('logout-form').submit();">
                              {{ __('Keluar') }}
                           </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                              </form>

                              </div>
                        </a>
       
                         </nav>
                         </li>
                         @endguest
                     </ul>
                  </div>
                  
                  
               </div>
               
            </div>
            
         </div>
         <nav class="navbar navbar-expand-lg navbar-light">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                  <ul class="navbar-nav ">
                     <li class="nav-item active">
                        <a class="nav-link" href="{{route('index')}}">Beranda <span class="sr-only">(current)</span></a>
                     </li>
                     <li class="nav-item">
                        <a href="{{route('about')}}" class="nav-link">Tentang</a>
                     </li>
                     <li class="nav-item">
                        <a href="{{route('service')}}" class="nav-link">Layanan</a>
                     </li>
                     <li class="nav-item">
                        <a href="{{route('produk')}}" class="nav-link">Produk</a>
                     </li>
                    

                  </ul>
               </div>
            </nav>
      </div>
	  </div>