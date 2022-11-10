
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
                Registered Members List 
            </h1>
            <div class="members-table">
                <table class="table table-hover table-bordered text-center" style="font-size: 12px;font-weight: bold;">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">D.O.R</th>
                        <th scope="col">Address</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Choosen Service</th>
                        <th scope="col">Plan</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0?>
                        @foreach ($members as $member)
                        <tr>
                            <th scope="row">{{++$i}}</th>
                            <td>{{$member->name}}</td>
                            <td>{{$member->username}}</td>
                            <td>{{$member->gender}}</td>
                            <td>{{$member->contact}}</td>
                            <td>{{$member->reg_date}}</td>
                            <td>{{$member->address}}</td>
                            <td>{{$member->amount}}</td>
                            <td>{{$member->services}}</td>
                            <td>{{$member->plan}} month/s</td>
                            <td>
                                <a class="btn btn-outline-danger" href="remove-member/{{$member->id}}">Remove</a>
                                <a class="btn btn-outline-success" href="edit-member/{{$member->id}}">Edit</a>
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