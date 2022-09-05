@include('layout.admin.header')
@include('layout.admin.top-bar')
@include('layout.admin.left-sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Posts</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              @if(Session::has('success'))
              <p class="alert bg-success">{{ Session::get('success') }}</p>
              @endif
              <ul class="ul-error">
              @foreach ($errors->all() as $error)
                  <li class="alert bg-danger">{{ $error }}</li>
              @endforeach
              </ul>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Category Name</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Published</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $row)
                  <tr>
                    <td>{{$row->category->category_name}}</td>
                    <td>{{$row->title}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{date('d M y', strtotime($row->post_date))}}</td>
                    <td>
                      @if($row->status==1)
                      <span class="badge badge-success p-2">Active</span>
                      @else
                      <span class="badge badge-danger p-2">Inactive</span>
                      @endif
                    </td>
                    <td>
                    <a href="{{route('posts.edit', $row->id)}}" class="m-1 bg-info text-white rounded action-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form action="{{route('posts.destroy', $row->id)}}" class="d-inline" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                        @csrf
                        <button type="submit" class="bg-danger text-white rounded action-btn"><i class="fa-solid fa-trash-can text-light"></i></button>
                    </form>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <!-- <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                  </tr>
                  </tfoot> -->
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <@include('layout.admin.footer-bottom')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('public/admin')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('public/admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/admin')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/admin')}}/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('public/admin')}}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{asset('public/admin')}}/plugins/raphael/raphael.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('public/admin')}}/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/admin')}}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/admin')}}/dist/js/pages/dashboard2.js"></script>

<!-- jQuery -->
<script src="{{asset('public/admin')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('public/admin')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('public/admin')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/admin')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/admin')}}/dist/js/demo.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
