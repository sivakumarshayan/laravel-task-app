@extends('admin.admin_master')
@section('admin')

<div class="content">

    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">

        </div>

        <!-- General Form -->
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">View Task</h5>
                        <a href="{{ route('all.task') }}" class="btn btn-secondary mt-3">Back</a>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                
                                <div class="col-sm-6 col-lg-4">
                                <div class="card d-block">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">{{$task->title}}</h4>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">{{$task->description}}</p>
                                        
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>


</div>




@endsection