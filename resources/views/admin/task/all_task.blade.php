@extends('admin.admin_master')
@section('admin')

<div class="content">

    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Task List</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>tno</th>
                                    <th>Title</th>
                                    <th>Short Description</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($task as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->short_desc}}</td>
                                    <td>{{$item->created_at->format('Y-m-d')}}</td>
                                    <td>
                                        @if($item->status == 0)
                                        <span style="font-size: 1.2em;" class="badge rounded-pill bg-danger">Pending</span>
                                        @else
                                        <span style="font-size: 1.2em;" class="badge rounded-pill bg-success">Completed</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('view.task',$item->id)}}" class="btn btn-info btn-sm" title="View task"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('edit.task',$item->id)}}" class="btn btn-success btn-sm" title="Edit Task"><i class="fa fa-pencil"></i></a>
                                        @if($item->status == 0)
                                        <a href="{{route('task.complete',$item->id)}}" class="btn btn-warning btn-sm" title="Change To Completed"><i class="fa-solid fa-check"></i></a>
                                        @else
                                        <a href="{{route('task.pending',$item->id)}}" class="btn btn-warning btn-sm" title="Change To Pending"><i class="fa-solid fa-xmark"></i></a>
                                        @endif
                                        <a href="{{route('delete.task',$item->id)}}" class="btn btn-danger btn-sm" id="delete" title="Delete Task"><i class="fa fa-trash"></i></a>
                                    </td>
                                    
                                </tr>
                                @endforeach  
                                
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>


    </div>


</div>




@endsection