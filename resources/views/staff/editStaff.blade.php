
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
                   Update Staff Data 
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
                    <form action="/admin/update-staff" method="post">
                        @csrf
                        {{-- Personal Innformation --}}
                        <div class="row">
                            <div class="col-6">

                                {{-- <h2 class="text-center" >Edit user User</h2> --}}
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <div class="p-2 ">
                                    <label class="pb-2" for="name">Name</label>
                                    <input type="text" id="name" name="name" value="{{$user->full_name}}" placeholder="Full Name" class="d-block w-100 p-2">
                                </div>
                                <div class="p-2 ">
                                    <label class="pb-2" for="username">Username</label>
                                    <input type="text" id="username" name="username" value="{{$user->username}}" placeholder="Username" autocomplete="off" class="d-block w-100 p-2">
                                </div>
                                <div class="p-2 ">
                                    <label class="pb-2" for="password">Password</label>
                                    <input type="text" id="password" name="password" value="***********" disabled class="d-block w-100 p-2">
                                    Note: Only the members are allowed to change their password until and unless it's an emergency.
                                </div>
                                <div class="p-2">
                                    <label class="pb-2" for="gender">Gender</label>
                                    <select name="gender" id="gender">
                                        <option value="male" @if ($user->gender == "male") {{"selected"}} @endif> Male </option>
                                        <option value="female" @if ($user->gender == "female") {{"selected"}} @endif> Female </option>
                                    </select>
                                </div>
                            </div>
                            {{-- Contact and Service Details --}}
                            <div class="col-6">

                                {{-- Contact Information --}}
                                {{-- <h3 class="text-center" >Contact Details</h3> --}}
                                <div class="p-2 ">
                                    <label class="pb-2" for="contact">Phone Number</label>
                                    <input type="tel"  name="contact" value="{{$user->contact}}" placeholder="Contact Number" class="d-block w-100 p-2">
                                </div>
                                <div class="p-2 ">
                                    <label class="pb-2" for="address">Address</label>
                                    <input type="text"  name="address" value="{{$user->address}}" placeholder="Address" class="d-block w-100 p-2">
                                </div>

                                {{-- Contact Information --}}
                                <div class="p-2">
                                    <label class="pb-2" for="role">Designation</label>
                                    <select name="role" id="role">
                                        <option value="cashier" @if ($user->role == "cashier") {{"selected"}} @endif> Cashier </option>
                                        <option value="front-desk" @if ($user->role == "front-desk") {{"selected"}} @endif> Front Desk </option>
                                        <option value="trainer" @if ($user->role == "trainer") {{"selected"}} @endif> Trainer </option>
                                        <option value="gym-assistant" @if ($user->role == "gym-assistant") {{"selected"}} @endif> GYM Assistant </option>
                                        <option value="manager" @if ($user->role == "manager") {{"selected"}} @endif> Manager </option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        
                        <input type="submit" value="Update Staff Data" class="btn btn-success d-block w-100 p-2 mt-2">
                    </form>
                </div>
                  
            </div>
        </div>
    </div>
</div>
@include("footer")