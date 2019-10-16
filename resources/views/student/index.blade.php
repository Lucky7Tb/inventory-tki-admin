@extends('layouts.app')

@section('title', 'Student Management')

@section('content')
<div class="container mt-2 responsive-table">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{$message}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <a href="{{route('student.create')}}" class="btn btn-rounded social-icon-btn btn-primary mb-3 mt-5"><i class="pl-1 mdi mdi-plus-outline"></i></a>
        <button type="button" class="btn btn-rounded social-icon-btn btn-success mb-3 mt-5 ml-3" data-toggle="modal" data-target="#importExcel">
			<i class="mdi mdi-file-import"></i>
        </button>
        <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
                <form method="post" action="{{route('student.excel')}}" enctype="multipart/form-data">
                    @csrf
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Pilih file excel</label>
                            </div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>
 
        <table class="table table-bordered table-hover text-center" id="student-table">
            <div class="button"></div>
            <thead>
                <tr>
                    <th>Nama siswa</th>
                    <th>Nis siswa</th>
                    <th>Kelas siswa</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
</div>
@endsection

@push('scripts')
    <script>
        $('document').ready(function () {
            let table = $('#student-table').DataTable({
                processing: true,
                serverside: true,
                responsive: true,
                ajax: "{{route('student.json')}}",
                columns: [
                    {data:"student_name", name:"student_name"},
                    {data:"student_nis", name:"student_nis"},
                    {data:"student_class", name:"student_class"},
                    {data:"student_password", name:"student_password"},
                    {data:"aksi", name:"aksi", orderable: false, searchable: false},
                ],
            });
        });
    </script>
@endpush

