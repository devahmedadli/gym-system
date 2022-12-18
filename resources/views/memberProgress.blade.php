
@include('header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 sidebar-container">
            {{-- SideBar --}}
            @include('admin.parts.sidebar')
        </div>
        <div class="col-md-9 p-0">
            <div class="container-fluid p-4" style="min-height: 100vh;">
                <h1 class="text-center p-4">
                    Update Member Progress 
                </h1>
                {{-- Register Section --}}
    
                <div class="status">
                    {{-- Registeration Success Message --}}
                    @if ($errors->any)
                        <div class="row">
                            @foreach ($errors->all() as $error)
                            <div class="col-6">
                                <div class="alert alert-danger">
                                    {{$error}}
                                </div>
                            </div>
                        @endforeach</div>                        
                    @endif
                    @if (session("success"))
                        <div class="alert alert-success p-1 m-1">
                            {{session("success")}}
                        </div>
                        
                    @endif
                    <form action="/admin/update-progress" method="post">
                        @csrf
                        {{-- Personal Innformation --}}
                        <div class="row">
                            <div class="col-6">

                                {{-- <h2 class="text-center" >Up</h2> --}}
                                <input type="hidden" name="id" value="{{$member->id}}">
                                
                                <div class="p-2 ">
                                    <label class="pb-2" for="name">Member's Name</label>
                                    <input type="text" id="name" name="name" value="{{$member->name}}" placeholder="Full Name" class="d-block w-100 p-2" disabled>
                                </div>
                                <div class="p-2 ">
                                    <label class="pb-2" for="service">Service Taken</label>
                                    <input type="text" id="service" name="service" value="{{$member->services}}"class="d-block w-100 p-2" disabled>
                                </div>
                                <div class="p-2 ">
                                    <label class="pb-2" for="ini_weight">Initial Weight: (KG)</label>
                                    <input type="number" id="ini_weight" name="ini_weight" value="{{$member->ini_weight}}" placeholder="Initial Weight" autocomplete="off" class="d-block w-100 p-2" required>
                                </div>
                                <div class="p-2 ">
                                    <label class="pb-2" for="curr_weight">Current Weight: (KG)</label>
                                    <input type="number" id="curr_weight" name="curr_weight" value="{{$member->curr_weight}}" placeholder="Current Weight" autocomplete="off" class="d-block w-100 p-2" required>
                                </div>
                            </div>
                            {{-- Contact and Service Details --}}
                            <div class="col-6">

                                {{-- Contact Information --}}
                                <div class="p-2 ">
                                    <label class="pb-2" for="ini_body_type">Initial Body Type:</label>
                                    <input type="text"  name="ini_body_type" value="{{$member->ini_body_type}}" placeholder="Initial Body Type:" class="d-block w-100 p-2" required>
                                </div>
                                <div class="p-2 ">
                                    <label class="pb-2" for="curr_body_type">Current Body Type:</label>
                                    <input type="text"  name="curr_body_type" value="{{$member->curr_body_type}}" placeholder="Current Body Type:" class="d-block w-100 p-2" required>
                                </div>

                                

                            </div>
                        </div>
                        
                        <input type="submit" value="Update Member Progress" class="btn btn-success d-block w-100 p-2 mt-2">
                    </form>
                </div>
                  
            </div>
        </div>
    </div>
</div>
@include("footer")