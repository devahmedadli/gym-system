@include('header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 sidebar-container">
            {{-- SideBar --}}
            @include('admin.parts.sidebar')
        </div>
        {{-- Page Content --}}
        <div class="col-md-9">
            <h1 class="text-center p-5">
                Registered Attendances List 
            </h1>
            <div class="offset-10 col-2 p-2">
                <a href="/admin/add-user" class="btn btn-success">
                    Add Staff User  
                    <i class="fa fa-plus"></i>
                </a>
            </div>
            <div class="attendances-table">
                <table class="table table-hover table-bordered text-center" style="font-size: 16px;font-weight: bold;">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Role</th>
                        <th scope="col">Address</th>
                        <th scope="col">Contact</th>
                        {{-- <th scope="col">Email</th> --}}
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0?>
                        @foreach ($staff as $user)
                        <tr>
                            <th scope="row">{{++$i}}</th>
                            <td>{{$user->full_name}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->gender}} </td>
                            <td>{{$user->role}} </td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->contact}}</td>
                            {{-- <td>{{$user->email}}</td> --}}
                            <td>
                                <a class="btn btn-success" href="edit-staff/{{$user->id}}">Edit</a>                                
                                <a class="btn btn-danger" href="remove-staff/{{$user->id}}">Remove</a>                                
                            </td>
                        </tr>
                        @endforeach
                      
                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@include("footer")