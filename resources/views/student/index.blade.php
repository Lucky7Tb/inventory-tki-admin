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
        <button type="button" class="btn btn-rounded social-icon-btn btn-success mb-3 mt-5 ml-3" data-toggle="modal" data-target="#exportExcel">
			<i class="mdi mdi-file-export"></i>
        </button>

        <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
                <form method="post" action="{{route('student.importexcel')}}" enctype="multipart/form-data">
                    @csrf
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
                            <div class="form-group">
                                <label for="customFile">Pilih file excel</label>
                                <input type="file" name="file" class="form-control-file @error('file') is-invalid @enderror" id="customFile">
                            </div>

                            @error('file')
                                <small id="file_help" class="form-text text-danger">{{ $message }}</small>
                            @enderror
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>

        <div class="modal fade" id="exportExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
                <form method="post" action="{{route('student.exportexcel')}}" enctype="multipart/form-data">
                    @csrf
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Export Excel</h5>
						</div>
						<div class="modal-body">
                            <div class="showcase_text_area">
                                <label>Kelas siswa</label>
                            </div>
                            <select name="student_class" id="kelas" class="custom-select">
                                <option value="10-Elektro-1">10-Elektro-1</option>
                                <option value="10-Elektro-2">10-Elektro-2</option>
                                <option value="10-Elektro-3">10-Elektro-3</option>
                                <option value="10-Elektro-4">10-Elektro-4</option>
                                <option value="10-Mesin-1">10-Mesin-1</option>
                                <option value="10-Mesin-2">10-Mesin-2</option>
                                <option value="10-TGM-1">10-TGM-1</option>
                                <option value="10-TKR-1">10-TKR-1</option>
                                <option value="10-TKR-2">10-TKR-2</option>
                                <option value="10-Tekstil-1">10-Tektil-1</option>
                                <option value="10-Tekstil-2">10-Tekstil-2</option>
                                <option value="10-Tki-1">10-Tki-1</option>
                                <option value="10-Tki-2">10-Tki-2</option>
                                <option value="10-Tki-3">10-Tki-3</option>
                                <option value="10-Tki-4">10-Tki-4</option>
                                <option value="10-Tki-5">10-Tki-5</option>
                                <option value="10-Tki-6">10-Tki-6</option>
                                <option value="11-Elektro-1">11-Elektro-1</option>
                                <option value="11-Elektro-2">11-Elektro-2</option>
                                <option value="11-Elektro-3">11-Elektro-3</option>
                                <option value="11-Mekatronika">11-Mekatronika</option>
                                <option value="11-Mesin-1">11-Mesin-1</option>
                                <option value="11-Mesin-2">11-Mesin-2</option>
                                <option value="11-TGM-1">11-TGM-1</option>
                                <option value="11-TKR-1">11-TKR-1</option>
                                <option value="11-TKR-2">11-TKR-2</option>
                                <option value="11-Tekstil-1">11-Tektil-1</option>
                                <option value="11-Tekstil-2">11-Tekstil-2</option>
                                <option value="11-TKJ-1">11-Tkj-1</option>
                                <option value="11-TKJ-2">11-Tkj-2</option>
                                <option value="11-MM-1">11-MM-1</option>
                                <option value="11-MM-2">11-MMi-2</option>
                                <option value="11-RPL-1">11-Rpl-1</option>
                                <option value="11-RPL-2">11-Rpl-2</option>
                                <option value="12-Elektro-1">12-Elektro-1</option>
                                <option value="12-Elektro-2">12-Elektro-2</option>
                                <option value="12-Elektro-3">12-Elektro-3</option>
                                <option value="12-Mekatronika">12-Mekatronika</option>
                                <option value="12-Mesin-1">12-Mesin-1</option>
                                <option value="12-Mesin-2">12-Mesin-2</option>
                                <option value="12-TGM-1">12-TGM-1</option>
                                <option value="12-TKR-1">12-TKR-1</option>
                                <option value="12-TKR-2">12-TKR-2</option>
                                <option value="12-Tekstil-1">12-Tektil-1</option>
                                <option value="12-Tekstil-2">12-Tekstil-2</option>
                                <option value="12-TKJ-1">12-Tkj-1</option>
                                <option value="12-TKJ-2">12-Tkj-2</option>
                                <option value="12-MM-1">12-MM-1</option>
                                <option value="12-MM-2">12-MMi-2</option>
                                <option value="12-RPL-1">12-Rpl-1</option>
                                <option value="12-RPL-2">12-Rpl-2</option>
                            </select>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Export</button>
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

