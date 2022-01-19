<script>
	var table = $("#table-data-anggota").DataTable({
    "processing": true,
    "ordering": false,
    "serverSide": true,
    "ajax":{
      "url": "{{ url()->current() }}",
      "data": function ( d ) {
        return $.extend( {}, d, {
          type: true
        } );
      }
    },
    columns: [
    {data: 'member_no'},
    {data: 'fullname'},
    {data: 'email'},
    {data: 'identity_no'},
    {data: 'address'},
    {data: 'phone_no'},
    {data: 'gender'},
    {
      data: "member_since",
      render: function(data, type, row){
        if(type === "sort" || type === "type"){
          return data;
        }
        return moment(data).format("MM-DD-YYYY HH:mm");
      }
    },
    {
      data: "user_id",
      "render": function ( data, type, row, meta )
      {
        var url = '{{url('backoffice/keanggotaan/anggota/edit')}}/';
        return '<div class="text-center">'+
        '<a class="mb-1 btn btn-success btn-sm text-white" onclick="getDownline(' + data + ');"  data-toggle="modal" data-target="#modal-anggota-downline"><i class="fa fa-users" title="Downline"></i></a>&NewLine;'+
        '<a class="mb-1 btn btn-warning btn-sm text-white" href="'+ url + data +'" title="Edit"><i class="fa fa-edit"></i></a>&NewLine;'+
        '<a class="mb-1 btn btn-danger btn-sm text-white" onclick="deleteRecord(' + data + ');" title="Hapus"><i class="fa fa-trash"></i></a>'+
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
          url: "{!! url('backoffice/keanggotaan/anggota/delete') !!}/" + id,
          dataType: "json",
          type: "get",
          success: function(data) {
            table.ajax.reload();
          }
        });
      }
    })
  }

  function deleteDownline(id){
    Swal.fire({
      title: 'Apakah Anda Yakin?',
      showDenyButton: true,
      confirmButtonText: 'Iya',
      denyButtonText: `Tidak`,
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "{!! url('backoffice/keanggotaan/anggota/downline/delete') !!}/" + id,
          dataType: "json",
          type: "get",
          success: function(data) {
            $('#table-data-anggota-downline').DataTable().ajax.reload();
          }
        });
      }
    })
  }

  function getDownline(id){
    $('#table-data-anggota-downline').DataTable().destroy();
    var tableDownline = $("#table-data-anggota-downline").DataTable({
      "processing": true,
      "ordering": false,
      "serverSide": true,
      "ajax":{
        "url": '{{URL::current()}}/downline/' + id,
        "data": function ( d ) {
          return $.extend( {}, d, {
            type: true
          } );
        }
      },
      columns: [
      {data: 'fullname'},
      {data: 'member_no_downline'},
      {data: 'email_downline'},
      {data: 'referal_code'},
      {
        data: "id",
        "render": function ( data, type, row, meta )
        {
          var url = '#';
          return '<div class="text-center">'+
          '<a class="mb-1 btn btn-danger btn-sm text-white" onclick="deleteDownline(' + data + ');" title="Hapus"><i class="fa fa-trash"></i></a>'+
          '</div>';
        }
      }
      ],
      colReorder: true,
    });
  }
</script>