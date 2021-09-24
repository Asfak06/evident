@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-secondary text-center text-light">{{ __('Khoj the search') }}</div>

                <div class="card-body">
                    <form  id="inputform">
                        @csrf
                        <input type="hidden" name="id" class="form-control form-control-lg is-valid"  value="{{Auth::id()}}" >
                        <div class="form-group mb-4">
                            <div>
                                <label for="validationServer01">input values : </label>
                                <input type="text" id="string" name="inputstring" class="form-control form-control-lg "  value="" >
                                <label for="validationServer01">Search Value : </label>
                                <input type="text" name="search" class="form-control form-control-lg "  value="" >
                            </div>                                               
                        </div>

                        <button type="submit" class="btn btn-block btn-primary w-25 m-auto">Khoj</button> 
                    </form>

                    <h2 class="form-control mt-3" id="result" style="display:none"></h2>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection
@section('script')
<script>
jQuery(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#inputform").submit(function(e){
            e.preventDefault();   

                $.ajax({
                    type:'POST',
                    url:'{{route("input-values")}}',
                    data:$(this).serialize(),
                    success:function(data){
                        if(data.success){
                            var html="result : "+data.request;                    
                            $("#result").show();
                            if(data.request == true){
                              $("#result").removeClass("text-danger border border-danger");                            
                              $("#result").addClass("text-success border border-success");                            
                            }else{
                                $("#result").removeClass("text-success border border-success");
                                $("#result").addClass("text-danger border border-danger");                            
                            }
                            $("#result").html(html);
                            console.log(data.request);
                        }else if(data.invalid){
                            var html="wrong input : "+data.invalid;                    
                            $("#result").show();
                            $("#result").addClass("text-danger border border-danger");                            
                            $("#result").html(html);
                        }else{
                            console.log('error');
                        }
                    }
                });


        });

});
</script>
@endsection