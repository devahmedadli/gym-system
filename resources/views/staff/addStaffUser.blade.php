
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
                   Add New Staff User 
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
                    @if (session("error"))
                        <div class="alert alert-danger">
                            {{session("error")}}
                        </div>
                    @endif
                    @if (session("success"))
                        <div class="alert alert-success p-1 m-1">
                            {{session("success")}}
                        </div>
                        
                    @endif
                    <form action="{{ route('staff.store') }}" method="post">
                        @csrf
                        {{-- Personal Innformation --}}
                        <div class="row">
                            <div class="col-6">

                                {{-- <h2 class="text-center" >Edit user User</h2> --}}
                                <div class="p-2 ">
                                    <label class="pb-2" for="name">Name</label>
                                    <input type="text" id="name" name="name" placeholder="Full Name" class="d-block w-100 p-2">
                                </div>
                                <div class="p-2 ">
                                    <label class="pb-2" for="username">Username</label>
                                    <input type="text" id="username" name="username" placeholder="Username" autocomplete="off" class="d-block w-100 p-2">
                                </div>
                                <div class="p-2 ">
                                    <label class="pb-2" for="password">Password</label>
                                    <input type="password" id="password" name="password" placeholder="Password" class="d-block w-100 p-2">
                                </div>
                                <div class="p-2">
                                    <label class="pb-2" for="gender">Gender</label>
                                    <select name="gender" id="gender">
                                        <option value="gender" disabled hidden selected> Select Gender </option>
                                        <option value="male"> Male </option>
                                        <option value="female"> Female </option>
                                    </select>
                                </div>
                            </div>
                            {{-- Contact and Service Details --}}
                            <div class="col-6">

                                {{-- Contact Information --}}
                                <div class="p-2 ">
                                    <label class="pb-2" for="contact">Phone Number</label>
                                    <input type="tel"  name="contact" placeholder="Contact Number" class="d-block w-100 p-2">
                                </div>
                                <div class="p-2 ">
                                    <label class="pb-2" for="address">Address</label>
                                    <input type="text"  name="address" placeholder="Address" class="d-block w-100 p-2">
                                </div>

                                {{-- Contact Information --}}
                                <div class="p-2">
                                    <label class="pb-2" for="role">Designation</label>
                                    <select name="role" id="role">
                                        <option value="" disabled selected hidden> Satff Designation </option>
                                        <option value="cashier"> Cashier </option>
                                        <option value="front-desk"> Front Desk </option>
                                        <option value="trainer" > Trainer </option>
                                        <option value="gym-assistant"> GYM Assistant </option>
                                        <option value="manager"> Manager </option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        
                        <input type="submit" value="Add New Staff User" class="btn btn-success d-block w-100 p-2 mt-2">
                    </form>
                </div>
                  
            </div>
        </div>
    </div>
</div>
@include("footer")