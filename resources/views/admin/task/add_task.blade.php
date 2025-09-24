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
                        <h5 class="card-title mb-0">Add Task</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{route('store.task')}}" method="post" id="myForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="example-email" class="form-label">Title</label>
                                        <input type="text" id="example-email" name="title" value="{{old('title')}}" class="form-control" placeholder="Enter Title">
                                    </div>
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Short Description</label>
                                        <input type="text" id="simpleinput" name="short_desc" value="{{old('short_desc')}}" class="form-control" placeholder="Enter Short Description">
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-textarea" class="form-label">Description</label>
                                        <textarea class="form-control" id="example-textarea" name="description" value="{{old('description')}}" rows="5" placeholder="Enter Description"></textarea>
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