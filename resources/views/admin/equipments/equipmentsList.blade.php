
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
                Perfect Gym's Equipment List 
            </h1>
            <div class="members-table">
                <table class="table table-hover table-bordered" style="font-size:14px; font-weight:bold;">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">E. Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Vendor</th>
                        <th scope="col">Address</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Purchased Date</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0?>
                        @foreach ($equipments as $equipment)
                        <tr>
                            <th scope="row">{{++$i}}</th>
                            <td>{{$equipment->name}}</td>
                            <td>{{$equipment->description}}</td>
                            <td>{{$equipment->quantity}}</td>
                            <td>{{$equipment->cost}}$</td>
                            <td>{{$equipment->vendor}}</td>
                            <td>{{$equipment->address}}</td>
                            <td>{{$equipment->contact}}</td>
                            <td>{{$equipment->date}}</td>
                        </tr>
                        @endforeach
                      
                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@include("footer")