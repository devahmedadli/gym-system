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
                        <th scope="col">Last Payment Date</th>
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
                            <td>{{$member->paid_date}}</td>
                            <td>{{$member->amount}} $</td>
                            <td>{{$member->services}}</td>
                            <td>{{$member->plan}} Month/s</td>
                            <td>
                                <a class="btn btn-success" href="payment/{{$member->id}}">Make Payment $</a>                                
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