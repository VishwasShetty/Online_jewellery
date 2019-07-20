@extends('layouts.app')
{{--edit kotre ide page redirect agatte adre text box editing enable agatte
first button edit
amele button save agatte
--}}

@section('content');
<style>
    #img{
        border-radius:100%;
        width:250px;
        height:200px;
        margin-left: 5px;
      
    }
    .form-control{
        border: none;
    }
    #lb{
        font:bold;
    }
    </style>
            <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">{{ __('Profile') }}</div>
                    
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('myprofileupdate') }}" enctype="multipart/form-data">
                                            @csrf
                    
                                            <div class="form-group row">
                                                <label for="profile_image" class="col-md-4 col-form-label text-md-right"></label>
                    
                                                <div class="col-md-6">
                                                <img  src="/storage/profiles/{{$user->profile_image}}" id="img" name="profile_image" id="profile_image">
                    
        
                                                </div>
                                            </div>
                    
                    
                                            <div class="form-group row">
                                                    <label style="margin-left:110px;" for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                                <div class="col-md-6">
                                                        <label for="name" class="form-control">{{ $user->name}}</label>
                                
                                                </div>
                                        </div>

                                        <div class="form-group row">
                                                        <label style="margin-left:110px;" for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                                                    <div class="col-md-6">
                                                            <label for="name" class="form-control">{{$user->phone}}</label>
                                
                                                    </div>
                                            </div>
                    
                                        <div class="form-group row">
                                                <label style="margin-left:110px;" for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                                            <div class="col-md-6">
                                                    <label for="name" class="form-control">{{$user->address}}</label>
                            
                                            </div>
                                    </div>
                    
                                            <div class="form-group row">
                                                <label style="margin-left:110px;" for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    
                                                <div class="col-md-6">
                                                        <label for="name" class="form-control">{{$user->email}}</label>
                            
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            {{-- <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    {{-- <button type="submit" class="btn btn-primary">
                                                        {{ __('Edit') }}
                                                    </button> 
                                                    <a href="" data-method="post" button type="button" name="nobook" id="edit" class="btn btn-danger btn-xs delete-user">Edit</button></a>
                                                </div> --}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection