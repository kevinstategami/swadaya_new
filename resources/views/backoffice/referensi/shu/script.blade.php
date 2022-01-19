<script>
  var table = $("#table-shu").DataTable({
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
        {data: 'shu_name'},
        {data: 'percentage'},
        {
          data: "id",
          "render": function ( data, type, row, meta )
          {
            var url = '{{url('backoffice/referensi/shu/edit')}}/';
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
              url: "{!! url('backoffice/referensi/shu/delete') !!}/" + id,
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