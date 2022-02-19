<script>
  var table = $("#table-referralBonus").DataTable({
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
    {data: 'type'},
    {
      data: 'value',
      "render": function ( data, type, row, meta )
      {
        if(row.type == 'NOMINAL'){
          return 'Rp.'+addCommas(data)
        }else{
          return data  + '%'
        }
      }
    },
    {data: 'sort',
    render : function (data, type, row, meta) {
      if(data == 1) {
        return '<a class="badge badge-pill badge-success">Aktif</a>';
      }else {
        return '<a class="badge badge-pill badge-danger text-white">Tidak Aktif</a>';
      }
    }
  },
  {
    data: "id",
    "render": function ( data, type, row, meta )
    {
      var activateButton = ''
      if(row.sort == 0){
        activateButton = '<a class="mb-1 btn btn-success btn-sm text-white" onclick="activate(' + data + ');" title="Aktikan"><i class="fa fa-check"></i></a>&NewLine;'
      } 
      var deactivateButton = ''
     //  if(row.sort == 1){
     //   deactivateButton = '<a class="mb-1 btn btn-secondary btn-sm text-white" onclick="deactivate(' + data + ');" title="Non-Aktikan"><i class="fa fa-ban"></i></a>&NewLine;'
     // }
     var url = '{{url('backoffice/referensi/referral-bonus/edit')}}/';
     return '<div class="text-center">'+ activateButton + 
     deactivateButton +
     '<a class="mb-1 btn btn-warning btn-sm text-white" href="'+ url + data +'"><i class="fa fa-edit"></i></a>&NewLine;'+
     '<a class="mb-1 btn btn-danger btn-sm text-white" onclick="deleteRecord(' + data + ');"><i class="fa fa-trash"></i></a>'+
     '</div>';
   }
 }
 ],
 colReorder: true,
});

  function activate(id){
    Swal.fire({
      title: 'Apakah anda yakin mengaktifkan ?',
      showDenyButton: true,
      confirmButtonText: 'Iya',
      denyButtonText: `Tidak`,
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "{!! url('backoffice/referensi/referral-bonus/activate/') !!}/" + id,
          dataType: "json",
          type: "get",
          success: function(data) {
            table.ajax.reload();
          }
        });
      }
    })
  }

  function deactivate(id){
    Swal.fire({
      title: 'Apakah anda yakin meng-non-aktifkan ?',
      showDenyButton: true,
      confirmButtonText: 'Iya',
      denyButtonText: `Tidak`,
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "{!! url('backoffice/referensi/referral-bonus/deactivate/') !!}/" + id,
          dataType: "json",
          type: "get",
          success: function(data) {
            table.ajax.reload();
          }
        });
      }
    })
  }

  function deleteRecord(id){
    Swal.fire({
      title: 'Apakah Anda Yakin?',
      showDenyButton: true,
      confirmButtonText: 'Iya',
      denyButtonText: `Tidak`,
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "{!! url('backoffice/referensi/referral-bonus/delete') !!}/" + id,
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