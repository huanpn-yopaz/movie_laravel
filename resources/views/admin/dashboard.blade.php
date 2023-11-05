@extends('admin')
@section('content')
    <!-- CONTENT -->

    <div id="members-tickets" style="height: 250px;"></div>
    
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Home</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-download">
                <i class='bx bxs-cloud-download'></i>
                <span class="text">Download PDF</span>
            </a>
        </div>

        <ul class="box-info">
            <li>
                <i class='bx bxs-calendar-check'></i>
                <span class="text">
                    <h3></h3>
                    <p>Zoom</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-group'></i>
                <span class="text">
                    <h3>{{$count_user}}</h3>
                    <p>User</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-dollar-circle'></i>
                <span class="text">
                    <h3></h3>
                    <p>Post</p>
                </span>
            </li>
        </ul>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Thông tin user</h3>

                </div>
                <table id="myTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($user as $value)  
                       <tr>
                           <td>
                               <p>{{$value->name}}</p>
                           </td>
                           <td>{{$value->email}}</td>
                           @if ($value->role==1)
                           <td><span class="status completed">admin</span></td>
                           @else
                           <td><span class="status pending">user</span></td>
                           @endif
                           <td><a href="{{ Route('user.edit', [$value->id]) }}"><span class="status pending">Edit</span></a></td>
                           <td>
                            <form action="{{ Route('user.destroy', [$value->id]) }}" method="post">
                                @method('delete')
                                @csrf
                                <button style=" border:none" type="submit"><span class="status completed">Delete</span></button>
                               </form>
                           </td>
                           
                       </tr>
                       @endforeach
                        
                    </tbody>
                </table>
            </div>

        </div>
    </main>
@endsection
