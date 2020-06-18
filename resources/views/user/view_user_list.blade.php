@extends('layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-10">
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="box">
                    <div class="box-header box-header-title">
                        <h3 class="box-title">LIST OF User</h3>
                    </div>
                    
                    <div class="box-body">
                         <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Full Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                               <th>Action</th>
                            </tr>
                             @foreach ($user as $userItem)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $userItem->name }}</td>
                                <td>{{ $userItem->phone }}</td>
                                <td>{{ $userItem->email }}</td>
                                <td>
                                <form action="/user-delete/{{$userItem->id}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}                                        
                                <button class="btn btn-danger">Delete</button>
                                  <a class="btn btn-primary" href="/user-edit/{{$userItem->id}}">Edit</a>
                                    </form>
                            </td>
                            </tr>
                            @endforeach
                        </table>
                         {!! $user->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@include('include.footer')
@endsection