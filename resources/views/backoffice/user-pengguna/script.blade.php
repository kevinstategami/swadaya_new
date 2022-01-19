<script>
  var table = $("#table-userPengguna").DataTable({
    "processing": true,
    "ordering": false,
    "serverSide": true,
    "ajax": {
      "url": "{{ url()->current() }}",
      "data": function ( d ) {
        return $.extend( {}, d, {
          type: true
        } );
      }
    },
    columns: [
    {data: 'id'},
    {data: 'name'},
    {data: 'email'},
    {data: 'username'},
    {data: 'type'},
    {
      data: 'status_aktivasi',
      render : function (data, type, row, meta) {
        if(data == 0) {
          return '<a class="badge badge-pill badge-danger">Tidak Aktif</a>';
        }else if(data == 2){
          return '<a class="badge badge-pill badge-info text-white">Menunggu Verifikasi</a>';
        }else if(data == 4){
          return '<a class="badge badge-pill badge-success text-white">Member Aktif</a>';
        }else{
          return '<a class="badge badge-pill badge-secondary">Tidak Ada Status</a>';
        }
      }
    },
    {
      data: "id",
      "render": function ( data, type, row, meta )
      {
        var url = '{{url('backoffice/user-pengguna/edit')}}/';
        return '<div class="text-center">'+
        '<a class="mb-1 btn btn-warning btn-sm text-white" href="'+ url + data +'"><i class="fa fa-edit"></i></a>&NewLine;'+
        '<a class="mb-1 btn btn-danger btn-sm text-white" onclick="deleteRecord(' + data + ');"><i class="fa fa-trash"></i></a>'+
        '</div>';
      }
    }
    ],
    colReorder: true,
  });

  function deleteRecord(id){
    Swal.fire({
      title: 'Apakah Anda Yakin?',
      showDenyButton: true,
      confirmButtonText: 'Iya',
      denyButtonText: `Tidak`,
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "{!! url('backoffice/user-pengguna/delete') !!}/" + id,
          dataType: "json",
          type: "get",
          success: function(data) {
            table.ajax.reload();
          }
        });
      }
    })
  }
</script>