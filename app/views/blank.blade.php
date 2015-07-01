@extends('layouts.master')
<?php

	$version = time();
?>
@section('title')
<title>Startup Bootstrap</title>
@stop

@section('head')

@stop

@section('content')


<div id="page-wrapper">
     <div class="row">
         <div class="col-lg-12">
             <h1 class="page-header">Blank</h1>
         </div>
         <!-- /.col-lg-12 -->
     </div>
     <!-- /.row -->
 </div>
 <!-- /#page-wrapper -->


@stop

@section('javascript')

<script>

</script>
<script src="/js/[path/report_name].js?version=<?php echo $version; ?>"></script>


@stop
