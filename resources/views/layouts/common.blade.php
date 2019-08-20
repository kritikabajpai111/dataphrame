<!DOCTYPE html>
<html>
@include('includes.head')
<body class="hold-transition skin-blue sidebar-mini">    

<div class="wrapper">  
		@include('includes.header')		
	    @include('includes.sidebar')
            @yield('content')
			@include('includes.footer')	
</div>
	    
</body>
</html>
