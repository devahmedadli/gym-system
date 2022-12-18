
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
                    Add New Gym Equipment 
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
                    <form action="{{ route('equipments.store') }}" method="post">
                        @csrf
                        
                        {{-- Personal Innformation --}}
                        <div class="row">
                            <div class="col-6">

                                <h2 class="text-center" >Register New Equipment</h2>
                                <div class="p-2 ">
                                    <label class="pb-2" for="name">Equipment Name</label>
                                    <input type="text" id="name" name="name" placeholder="Equipment Name" class="d-block w-100 p-2" required>
                                </div>
                                <div class="p-2 ">
                                    <label class="pb-2" for="description">Equipment Description</label>
                                    <input type="textarea" id="description" name="description" placeholder="Description" autocomplete="off" class="d-block w-100 p-2" required>
                                </div>
                                
                                <div class="p-2">
                                    <label for="date">Purchase Date</label>
                                    <input type="date" name="date" id="date" required>
                                </div>
                                <div class="p-2">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" name="quantity" id="quantity" value="1" required>
                                </div>
                                
                            </div>
                            {{-- Contact and Service Details --}}
                            <div class="col-6">

                                {{-- Contact Information --}}
                                <h3 class="text-center" >Other Details</h3>
                                <div class="p-2 ">
                                    <label class="pb-2" for="v_name">Vendor Name</label>
                                    <input type="text" id="v_name" name="v_name" placeholder="Vendor Name" class="d-block w-100 p-2" required>
                                </div>
                                <div class="p-2 ">
                                    <label class="pb-2" for="address">Address</label>
                                    <input type="text"  name="address" placeholder="Address" class="d-block w-100 p-2" required>
                                </div>
                                <div class="p-2 ">
                                    <label class="pb-2" for="contact">Contact Number</label>
                                    <input type="tel"  name="contact" placeholder="Contact Number" class="d-block w-100 p-2" required>
                                </div>

                                {{-- Contact Information --}}
                                <h3 class="text-center mt-3" >Service Details</h3>
                                <div class="p-2 ">
                                    <div class="cost">
                                        <label for="">Cost per Item</label>
                                        <input type="number" name="cost" placeholder="267$" required>
                                    </div>
                                </div>
                               

                            </div>
                        </div>
                        
                        <input type="submit" value="Submit" class="btn btn-success d-block w-100 p-2 mt-2">
                    </form>
                </div>
                  
            </div>
        </div>
    </div>
</div>
@include("footer")