<script>
  var table = $("#table-jenisSimpanan").DataTable({
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
        {data: 'type_code'},
        {data: 'type_name'},
        {data: 'deposit_min',
          "render": function ( data, type, row, meta )
          {
            return '<div class="text-right">'+ addCommas(data) +'</div>';
          }
        },
        {data: 'deposit_max',
          "render": function ( data, type, row, meta )
          {
            return '<div class="text-right">'+ addCommas(data) +'</div>';
          }
        },
        {data: 'shu.shu_name'},
        {data: 'status',
          "render": function ( data, type, row, meta )
          {
            var status;
            switch(data){
              case "0":
                status = "Tidak Aktif";
              break;
              case "1":
                status = "Aktif";
              break;
            }
            return '<div class="text-center">'+ status +'</div>';
          }
        },
        {
          data: "id",
          "render": function ( data, type, row, meta )
          {
            var url = '{{url('backoffice/referensi/jenis-simpanan/edit')}}/';
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
              url: "{!! url('backoffice/referensi/jenis-simpanan/delete') !!}/" + id,
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