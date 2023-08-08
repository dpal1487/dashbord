@extends('backend.layout')
@section('title')
Dashboard
@endsection
@section('page_name')
Dashboard
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="form" style="padding: 20px;">
                        <form action="{{asset('/dashboard')}}" method="post">
                            {{@csrf_field()}}
                            <div class="row">
                                <div class="form-group col-sm-3">
                                    <input type="text" placeholder="PID" value="{{Request::get('pid')}}" name="pid" id="pid" class="form-control" required />
                                </div>
                                <div class="form-group col-sm-3">
                                    <select name="status" class="form-control">
                                        <option value="complete" {{Request::get('status')=='complete' ? 'selected' : '' }}>Completed</option>
                                        <option value="terminate" {{Request::get('status')=='terminate' ? 'selected' : '' }}>Terminated</option>
                                        <option value="quotafull" {{Request::get('status')=='quotafull' ? 'selected' : '' }}>Quotafull</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <input type="text" placeholder="PID,UID" value="{{Request::get('q')}}" name="q" id="q" class="form-control" />
                                </div>
                                <div class="col-sm-3">
                                    <input type="submit" class="btn btn-primary" value="submit" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">

                        <table id="example2" class="table table-bordered table-hover  text-center">
                            <thead>
                                <tr class="bg-dark">
                                    <th>S. NO</th>
                                    <th>Project ID</th>
                                    <th>Respondent ID</th>
                                    <th>Status</th>
                                    <th>Date/Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                @forelse($surveys as $survey)
                                <?php
                                $color = "";
                                if ($survey->status == "complete") {
                                    $color = "success";
                                } else if ($survey->status == "terminate") {
                                    $color = "danger";
                                } else {
                                    $color = "warning";
                                }
                                ?>
                                <tr class="bg-{{$color}}">
                                    <td>{{$i++}}</td>
                                    <td>{{$survey->project_id}}</td>
                                    <td>{{$survey->user_id}}</td>
                                    <td>{{$survey->status}}</td>
                                    <td>{{$survey->date}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">No Result Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection