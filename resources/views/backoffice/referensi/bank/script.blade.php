<script>
  var table = $("#table-bank").DataTable({
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
        {data: 'bank_code'},
        {data: 'bank_name'},
        {data: 'account_number'},
        {data: 'account_name'},
        {data: 'swift_code'},
        {
          data: "id",
          "render": function ( data, type, row, meta )
          {
            var url = '{{url('backoffice/referensi/bank/edit')}}/';
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
              url: "{!! url('backoffice/referensi/bank/delete') !!}/" + id,
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