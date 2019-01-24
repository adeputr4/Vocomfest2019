@extends('user.layouts.main')

@extends('user.admin.menu')
@section('title', 'MADC Teams | Admin')
@section('breadcrumbs')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light"  style="color:#7386D5;margin: 1px 0 0 30px">
         <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
         <li class="breadcrumb-item active" aria-current="page">Galleries</li>
      </ol>
     </nav>
@endsection
@section('content')
@section('content')

	<div class="box">
	    <table class="table table-striped" id="galleries-table">
         <thead>
	        <tr>
	          <th scope="col">No</th>
             <th scope="col">Images</th>
             <th scope="col" class="judul">Judul</th>
	          <th scope="col">Status</th>
	          <th scope="col">Tanggal</th>
	          <th scope="col">Aksi</th>
	        </tr>
	      </thead>
	    </table>
	</div>

	  <!-- modal -->
	<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form>
	          <p>Anda yakin ingin <strong>menghapus</strong> berita?</p>
	          <button type="button" class="btn btn-danger" name="button"> <i class="fa fa-check"></i> Ya</button>
	          <button type="button" class="btn btn-secondary" name="button" data-dismiss="modal"> <i class="fa fa-times"></i> Batal</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- /modal -->

@endsection

@push('scripts')
   <script type="text/javascript" src="{{ asset('assets/vendor/moment/moment.js') }}"></script>
   <script type="text/javascript">
      $(function(){
         $('#galleries-table').DataTable({
            order: [[ 4, 'asc' ]],
            responsive: true,
            serverSide: true,
            prossessing: true,
            ajax: "{{ route('galleries.data') }}",
            columns: [
               {
                 name: 'id',
                 data: 'DT_RowIndex'
               },
               {
                  name: 'gallaries_path',
                  data: 'gallaries_path',
                  render: function(data){
                     return '<img src="{{ url('storage/gallaries') }}/' + data + '" alt="Gallaies" width=160px>'
                  }
               },
               {
                  name: 'title',
                  data: 'title'
               },
               {
                  name: 'status',
                  data: 'status',
                  render: function(data){
                        if (data == 1) {
                           return '<span class="badge badge-primary">Published</span>';
                        }

                        return '<span class="badge badge-danger">Not published yet</span>';

                  }
               },
               {
                  name: 'updated_at',
                  data: 'updated_at',
                  render: function(data){
                     return moment(data).format('DD-MM-YYYY');
                  }
               },
               {
                  name: 'action',
                  data: 'action'
               }
            ]
         })
      })
   </script>
@endpush
