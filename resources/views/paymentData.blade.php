
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
                    <form action="/admin/make-payment" method="post">
                        @csrf
                        {{-- Personal Innformation --}}
                        <div class="row ">
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
                                    <label class="pb-2" for="amount">Amount Per Month:</label>
                                    <input type="number" id="amount" name="amount" value="{{$member->amount}}" placeholder="Amount" class="d-block w-100 p-2" required>
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
                                    <label class="pb-2" for="status">Status</label>
                                    <select name="status" id="status">
                                        <option value="active" @if ($member->status == "active") {{"selected"}} @endif>Active</option>
                                        <option value="pending" @if ($member->status == "pendding") {{"selected"}} @endif>Pending</option>
                                        <option value="expired" @if ($member->status == "expired") {{"selected"}} @endif>Expired</option>
             
                                    </select>
                                </div>
                            </div>
                            {{-- Contact and Service Details --}}
                        </div>
                        
                        <input type="submit" value="Update Member Progress" class="btn btn-success d-block w-100 p-2 mt-2">
                    </form>
                </div>
                  
            </div>
        </div>
    </div>
</div>
@include("footer")