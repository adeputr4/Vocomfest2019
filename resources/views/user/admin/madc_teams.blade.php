@extends('user.layouts.main')

@extends('user.admin.menu')
@section('title', 'MADC Teams | Admin')



@section('content')
  <div class="box">
    <div class="row">
        <div class="col-md-12 pull-right">
          <form class="form-inline">
               <div class="form-group mx-sm-2">
                 <label for="search" class="sr-only">Pencarian</label>
                 <input type="text" class="form-control" id="" placeholder="Pencarian">
               </div>
               <button type="submit" class="btn btn-primary">Cari</button>
             </form>
        </div>
     </div>
    <table class="table table-hover table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Tim</th>
          <th>Kategori</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          @if($user->madc != null )
            <td>{{ $i++ }}</td>
             <td><a href="./view-team.html" class="blue">{{ $user->team_name }}</a></td>
             <td>MADC Competition</td>
             @if($user->madc['progress'] == 1)
               <td><span class="badge badge-primary">Registered</span></td>
             @elseif($user->madc['progress'] == 2)
               <td><span class="badge badge-info">Waiting for Confirm</span></td>    <td><span class="badge badge-primary">{{ $user->progress }}</span></td>
             @elseif($user->madc['progress'] == 3)
               <td><span class="badge badge-info">Submitted</span></td>
             @elseif($user->madc['progress'] == 4)
               <td><span class="badge badge-warning">confirmed</span></td>
             @elseif($user->madc['progress'] == 5)
               <td><span class="badge badge-warning">Waiting for Selection</span></td>
             @elseif($user->madc['progress'] == 6)
               <td><span class="badge badge-info">Waiting</span></td>
             @elseif($user->madc['progress'] == 7)
               <td><span class="badge badge-success">Lulus Seleksi</span></td>
             @endif
             <td>
               <a href="#" class="btn-success btn-sm"><i class="fa fa-check"></i></a>
               <a href="./view-team.html" class="btn-primary btn-sm"><i class="fa fa-eye"></i></a>
               <a href="#" class="btn-danger btn-sm" data-toggle="modal" data-target="#deleteTeam"><i class="fa fa-trash" ></i></a>
             </td>
           @endif
        </tr>
        @endforeach
      </tbody>
    </table>

    <!-- pagination -->
    <div class="">
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="disabled page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          <li class="active page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <!-- End of pagination -->
  </div>

    <!-- modal -->
    <div class="modal fade" id="deleteTeam" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            <p>Anda yakin ingin <strong>menghapus</strong> Tim blabla?</p>
            <button type="button" class="btn btn-danger" name="button"> <i class="fa fa-check"></i> Ya</button>
            <button type="button" class="btn btn-secondary" name="button" data-dismiss="modal"> <i class="fa fa-times"></i> Batal</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /modal -->

@endsection
