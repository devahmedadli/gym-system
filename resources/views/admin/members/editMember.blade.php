
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
                    Add New Member 
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
                    <form action="/admin/update-member" method="post">
                        @csrf
                        {{-- Personal Innformation --}}
                        <div class="row">
                            <div class="col-6">

                                <h2 class="text-center" >Register New User</h2>
                                <input type="hidden" name="id" value="{{$member->id}}">
                                <div class="p-2 ">
                                    <label class="pb-2" for="name">Name</label>
                                    <input type="text" id="name" name="name" value="{{$member->name}}" placeholder="Full Name" class="d-block w-100 p-2">
                                </div>
                                <div class="p-2 ">
                                    <label class="pb-2" for="username">Username</label>
                                    <input type="text" id="username" name="username" value="{{$member->username}}" placeholder="Username" autocomplete="off" class="d-block w-100 p-2">
                                </div>
                                <div class="p-2">
                                    <label class="pb-2" for="gender">Gender</label>
                                    <select name="gender" id="gender">
                                        <option value="male" @if ($member->gender == "male") {{"selected"}} @endif> Male </option>
                                        <option value="female" @if ($member->gender == "female") {{"selected"}} @endif> Female </option>
                                    </select>
                                </div>
                                <div class="p-2">
                                    <label class="pb-2" for="plan">Plan</label>
                                    <select name="plan" id="plan">
                                        <option value="1" @if ($member->plan == "1") {{"selected"}} @endif>One Month</option>
                                        <option value="3" @if ($member->plan == "3") {{"selected"}} @endif>Three Months</option>
                                        <option value="6" @if ($member->plan == "6") {{"selected"}} @endif>Six Months</option>
                                        <option value="12" @if ($member->plan == "12") {{"selected"}} @endif>One Year</option>
             
                                    </select>
                                </div>
                                <div class="p-2">
                                    <label for="date">Registration Date</label>
                                    <input type="date" name="date" id="date" value="{{$member->reg_date}}">
                                </div>
                            </div>
                            {{-- Contact and Service Details --}}
                            <div class="col-6">

                                {{-- Contact Information --}}
                                <h3 class="text-center" >Contact Details</h3>
                                <div class="p-2 ">
                                    <label class="pb-2" for="phone">Phone Number</label>
                                    <input type="tel"  name="phone" value="{{$member->contact}}" placeholder="Phone Number" class="d-block w-100 p-2">
                                </div>
                                <div class="p-2 ">
                                    <label class="pb-2" for="address">Address</label>
                                    <input type="text"  name="address" value="{{$member->address}}" placeholder="Address" class="d-block w-100 p-2">
                                </div>

                                {{-- Contact Information --}}
                                <h3 class="text-center" >Service Details</h3>
                                <div class="p-2 ">
                                    <label class="pb-2" for="service">Services</label>
                                    <div class="services">
                                        <div class="Sauna">
                                            <label for="">Fitness - 65$/month</label>
                                            <input type="radio" name="service" value="Fitness" @if ($member->services == "Fitness") {{"checked"}} @endif>
                                        </div>
                                        <div class="Sauna">
                                            <label for="">Sauna - 55$/month</label>
                                            <input type="radio" name="service" value="Sauna" @if ($member->services == "Sauna") {{"checked"}} @endif>
                                        </div>
                                        <div class="Sauna">
                                            <label for="">Cardio - 45$/month</label>
                                            <input type="radio" name="service" value="Cardio" @if ($member->services == "Cardio") {{"checked"}} @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <label for="amount">Total Amount</label>
                                    <input type="number" name="amount" id="amount" value="{{$member->amount}}">
                                </div>

                            </div>
                        </div>
                        
                        <input type="submit" value="Update Member Data" class="btn btn-success d-block w-100 p-2 mt-2">
                    </form>
                </div>
                  
            </div>
        </div>
    </div>
</div>
@include("footer")