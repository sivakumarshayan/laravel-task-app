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
                        <h5 class="card-title mb-0">Edit Task</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{route('update.task')}}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" value="{{$task->id}}">

                                    <div class="mb-3">
                                        <label for="example-email" class="form-label">Title</label>
                                        <input type="text" id="example-email" name="title" class="form-control" value="{{$task->title}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Short Description</label>
                                        <input type="text" id="simpleinput" name="short_desc" class="form-control" value="{{$task->short_desc}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-textarea" class="form-label">Description</label>
                                        <textarea class="form-control" id="example-textarea" name="description" rows="5" spellcheck="false">{{$task->description}}</textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>

                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>


</div>




@endsection