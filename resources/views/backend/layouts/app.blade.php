<html lang="es">

@section('htmlheader')
    @include('backend.layouts.partials.htmlheader')
@show

<body>
   <div class="wrapper">
    <div class="container">
      <div class="row">
	    @include('backend.layouts.partials.mainheader')
	
	   <div class="span3">
	      @include('backend.layouts.partials.sidebar')
	   </div>
	   <div class="span9">
          <div class="content">

		  
			  <!--Contenido-->
                @yield('content')
		      <!--Fin Contenido-->
		  </div>
                        <!--/.content-->
         </div>	  	
	     
	     </div>
      </div>
         <!--/.container-->
    </div>
    
    <div class="footer">
            <div class="container">
                <b class="copyright"> 2019 </b>All rights reserved.
            </div>
     </div>
	
	@section('scripts')
    	@include('backend.layouts.partials.scripts')
	@show
	
@yield('custom-css')
@yield('custom-scripts')

</body></html>
			