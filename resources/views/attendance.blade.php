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
            <div class="attendances-table">
                <table class="table table-hover table-bordered text-center" style="font-size: 16px;font-weight: bold;">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Choosen Service</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0?>
                        @foreach ($members as $member)
                        <tr>
                            <th scope="row">{{++$i}}</th>
                            <td>{{$member->name}}</td>
                            <td>{{$member->gender}}</td>
                            <td>{{$member->contact}}</td>
                            <td>{{$member->services}}</td>
                            <td>  
                                
                                @if ($member->check_in == 0)
                                <a class="btn btn-outline-danger" href="check-in/{{$member->id}}">Check In</a>
                                @else
                                
                                <div>{{$member->current_date}}</div>
                                <a class="btn btn-outline-success" href="check-out/{{$member->id}}">Check Out</a>
                                @endif

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