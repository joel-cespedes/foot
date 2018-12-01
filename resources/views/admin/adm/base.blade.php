<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/images/favicon.ico')}}">
    <title> FacilFood </title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Bootstrap -->
    <link href="{{asset('admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{asset('admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- NProgress -->
    <link href="{{asset('admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/redactor.css')}}" rel="stylesheet">



    <!-- jQuery custom content scroller -->
    <link href="{{asset('admin/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet"/>
    @yield('css')

    <!-- Custom Theme Style -->
    <link href="{{asset('admin/css/toastr.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/custom.css')}}" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{url('adm/')}}" class="site_title">
                <img src="{{asset('admin/images/logo_pequeno.png')}}" alt=""></a>
            </div>
            <div class="clearfix"></div>
            <div class="profile clearfix flex_colunm">
              <div class="profile_pic"><a href="{{url('adm/')}}">
                <img src="{{asset('admin/images/logo.png')}}" alt="logo">
                </a>
              </div>
              <div class="profile_info">
                <span>Bienvenido </span>
                <h2>....</h2>
{{--                <h2>  {{\Auth::user()->email}}</h2>--}}
              </div>
            </div>
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menú</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-th "></i> Productos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('adm/cproducto')}}">Categorias</a></li>
                      <li><a href="{{url('adm/producto')}}">Productos</a></li>
                      {{--<li><a href="{{url('adm/img')}}">Imágenes</a></li>--}}
                      <li><a href="{{url('adm/tag')}}">Tags</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-file-text"></i> Noticias <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('adm/cnoticia')}}">Categorias</a></li>
                      <li><a href="{{url('adm/noticia')}}">Noticias</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-commenting"></i> Comentarios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('adm/comentario')}}">Ver </a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cogs"></i> Contenido <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('adm/dat')}}">Datos de la Web</a></li>
                      <li><a href="{{url('adm/entrega')}}">Entrega Fácil</a></li>
                      <li><a href="{{url('adm/politicaCookie')}}">Politicas de Cookies</a></li>
                      <li><a href="{{url('adm/politicaPrivacidad')}}">Politicas de Privacidad</a></li>
                      <li><a href="{{url('adm/nosotros')}}">Nosotros</a></li>
                      <li><a href="{{url('adm/mayorista')}}">Mayorista</a></li>
                      <li><a href="{{url('adm/como_comprar')}}">Como Comprar</a></li>
                      <li><a href="{{url('adm/como_pagar')}}">Como Pagar</a></li>
                      <li><a href="{{url('adm/metodo_envio')}}">Metodo de Envío</a></li>

                    </ul>
                  </li>
                  <li><a><i class="fa fa-database"></i> Dinámicos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('adm/rede')}}">Redes Sociales</a></li>
                      <li><a href="{{url('adm/faq')}}">Faqs</a></li>
                      <li><a href="{{url('adm/emails')}}">Emails</a></li>
                      <li><a href="{{url('adm/newsletter')}}">Correos Newsletter</a></li>
                      <li><a href="{{url('adm/newsletter_mayorista')}}">Correos Mayoristas</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-envelope-open-o"></i> Cupones <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('adm/cupon')}}">Ver</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-line-chart "></i> Seo <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('adm/seo')}}">ver </a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-shopping-basket "></i> Pedidos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('adm/pedidos')}}">ver </a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cc-paypal"></i> Pagos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('adm/pagos')}}">ver </a></li>
                    </ul>
                  </li>

                  <li>
                    <a href="{{url('/')}}" target="_blank"><i class="fa fa-laptop"></i> Ver Web <span class="label label-success pull-right">Inicio</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>


        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="para_salir">
                  <form id="logout-form" action="{{ url('logout') }}" method="post" style="display: block;">
                    {{ csrf_field() }}
                    <button>Salir</button>
                  </form>



                </li>


              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
      </div>
        <!-- page content -->
      <div class="right_col" role="main" style="min-height: 3749px;">
        <div class="">

          @yield('section')
          <footer>
            <div class="pull-right">
              Administrativo por  <a href="https://socialestrategia.com">Social Estrategia.com</a>
            </div>
            <div class="clearfix"></div>
          </footer>

      </div>



      </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('admin/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('admin/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('admin/vendors/nprogress/nprogress.js')}}"></script>
    <script src="{{asset('admin/js/redactor2.js')}}"></script>

    <script src="{{asset('admin/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('admin/js/highcharts.js')}}"></script>

    @yield('script')
    <!-- Custom Theme Scripts -->

    <script src="{{asset('admin/js/custom.js')}}"></script>
    <script src="{{asset('admin/js/toastr.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.knob.min.js')}}"></script>
    <script>

      $(".oo").filestyle('buttonText', 'Cargar...');



        $('#editor').redactor({
            imageUpload: '{{url('adm/subir_imagen')}}',
            imagePosition: true,
            imageResizable: true,
            plugins: ['alignment','fontsize','video','table','source','fullscreen','fontcolor']});

          $('#editor1').redactor({
              imageUpload: '{{url('adm/subir_imagen')}}',
              imagePosition: true,
              imageResizable: true,
              plugins: ['alignment','fontsize','video','table','source','fullscreen','fontcolor']});

          $('#editor2').redactor({
              imageUpload: '{{url('adm/subir_imagen')}}',
              imagePosition: true,
              imageResizable: true,
              plugins: ['alignment','fontsize','video','table','source','fullscreen','fontcolor']});
      $('#editor3').redactor({ imageUpload: '{{url('adm/subir_imagen')}}',
          imagePosition: true,
          imageResizable: true,
          plugins: ['alignment','fontsize','video','table','source','fullscreen','fontcolor']});
      $('#editor4').redactor({ imageUpload: '{{url('adm/subir_imagen')}}',plugins: ['alignment'],
          imagePosition: true,
          imageResizable: true,
          plugins: ['alignment','fontsize','video','table','source','fullscreen','fontcolor']});
      $('#editor5').redactor({ imageUpload: '{{url('adm/subir_imagen')}}',
          imagePosition: true,
          imageResizable: true,
          plugins: ['alignment','fontsize','video','table','source','fullscreen','fontcolor']});
      $('#editor6').redactor({ imageUpload: '{{url('adm/subir_imagen')}}',
          imagePosition: true,
          imageResizable: true,
          plugins: ['alignment','fontsize','video','table','source','fullscreen','fontcolor']});
      $('#editor7').redactor({ imageUpload: '{{url('adm/subir_imagen')}}',
          imagePosition: true,
          imageResizable: true,
          plugins: ['alignment','fontsize','video','table','source','fullscreen','fontcolor']});
      $('#editor8').redactor({ imageUpload: '{{url('adm/subir_imagen')}}',
          imagePosition: true,
          imageResizable: true,
          plugins: ['alignment','fontsize','video','table','source','fullscreen','fontcolor']});
      $('#editor9').redactor({ imageUpload: '{{url('adm/subir_imagen')}}',
          imagePosition: true,
          imageResizable: true,
          plugins: ['alignment','fontsize','video','table','source','fullscreen','fontcolor']});
      $('#editor10').redactor({ imageUpload: '{{url('adm/subir_imagen')}}',
          imagePosition: true,
          imageResizable: true,
          plugins: ['alignment','fontsize','video','table','source','fullscreen','fontcolor']});


      var limite_title = 60;
      var limite_description = 155;
      var limite_keywords = 800;

      $('#meta_title').keyup(function(e){
          var box = $(this).val();
          var resta = limite_title - box.length;
          if(box.length <= limite_title)
          {
              $('#res_title').html('Te restan ' +resta+ ' caracteres.');
          }
      });


      //desciption
      $('#meta_description').keyup(function(e){
          var box = $(this).val();
          var resta_description = limite_description - box.length;
          if(box.length <= limite_description)
          {
              $('#res_description').html('Te restan ' +resta_description+ ' caracteres.');
          }
      });

      //keywords
      $('#meta_keywords').keyup(function(e){
          var box = $(this).val();
          var resta_keywords = limite_keywords - box.length;
          if(box.length <= limite_keywords)
          {
              $('#res_keywords').html('Te restan ' +resta_keywords+ ' caracteres.');
          }
      });



    </script>



    @if (Session::has('success'))
      <script> toastr.success("{{ Session('success')}}")</script>
    @endif

    @if (count($errors) > 0)

      @foreach ($errors->all() as $error)
        <script> toastr.warning("{{ $error }}")</script>
      @endforeach

    @endif


  </body>
</html>