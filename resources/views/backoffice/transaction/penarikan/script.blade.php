<script>
  var table = $("#table-penarikan").DataTable({
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
    {
      data: 'user.fullname',
      render : function (data, type, row, meta) {
        if(data) {
          return data;
        } else{
          return 'N/A';
        }
      }
    },
    {data: 'member_no'},
    {data: 'email'},
    {
      data: 'amount',
      render : function (data, type, row, meta) {
        return 'Rp. ' + addCommas(data)
      }},
    {data: 'target_bank_name'},
    {data: 'target_bank_account_no'},
    {data: 'target_bank_account_name'},
      {
        data: 'status',
        render : function (data, type, row, meta) {
          if(data == 0) {
            return '<a class="badge badge-pill badge-secondary">Menunggu Verifikasi</a>';
          }else if(data == 1){
            return '<a class="badge badge-pill badge-info">Disetujui</a>';
          }else if(data == 2){
            return '<a class="badge badge-pill badge-danger">Ditolak</a>';
          }else {
            return '<a class="badge badge-pill badge-warning text-white">Tidak ada Status</a>';
          }
        }
      },

    {
      data: 'approved_by',
      "render": function( data, type, row, meta)
      {
        if(row.approved_by != null){
          return data;
        }else{
          return '-'; 
        }
      }
    },

      {
        data: "id",
        "render": function ( data, type, row, meta )
        {
          if(row.type != 'ADMIN'){
            var verifikasi = ''
            if(row.status != 2){
              verifikasi = '<a class="mb-1 btn btn-success btn-sm text-white" onclick="approvePenarikan(' + data + ');" title="Verifikasi"><i class="fa fa-check"></i></a>&NewLine;'
            } else {
              verifikasi = ''
            }
            var reject = ''
            if(row.status != 3 && row.status != 2){
              reject = '<a class="mb-1 btn btn-warning btn-sm text-white" onclick="declinePenarikan(' + data +');" title="Tolak"><i class="fa fa-times"></i></a>&NewLine;'
            }else{
              reject = ''
            }
            var deleteButton = ''
            if(row.status != 2){
              deleteButton = '<a class="mb-1 btn btn-danger btn-sm text-white" onclick="deletePenarikan(' + data + ');"  title="Hapus"><i class="fa fa-trash"></i></a>';
            }
            return '<div class="text-center">'+
            verifikasi+
            reject+
            deleteButton
            +
            '</div>';
          }else{
            return '';
          }
        }
      }
      ],
      colReorder: true,
    });

  function approvePenarikan(id){
    Swal.fire({
      title: 'Apakah anda yakin setujui penarikan saldo?',
      showDenyButton: true,
      confirmButtonText: 'Iya',
      denyButtonText: `Tidak`,
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "{!! url('backoffice/transaction/penarikan/approved/') !!}/" + id,
          dataType: "json",
          type: "get",
          success: function(data) {
            table.ajax.reload();
          }
        });
      }
    })
  }

  function declinePenarikan(id){
    Swal.fire({
      title: 'Apakah anda yakin tolak penarikan saldo?',
      showDenyButton: true,
      confirmButtonText: 'Iya',
      denyButtonText: `Tidak`,
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "{!! url('backoffice/transaction/penarikan/decline/') !!}/" + id,
          dataType: "json",
          type: "get",
          success: function(data) {
            table.ajax.reload();
          }
        });
      }
    })
  }

  function deletePenarikan(id){
    Swal.fire({
      title: 'Apakah anda yakin menghapus penarikan saldo?',
      showDenyButton: true,
      confirmButtonText: 'Iya',
      denyButtonText: `Tidak`,
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "{!! url('backoffice/transaction/penarikan/delete/') !!}/" + id,
          dataType: "json",
          type: "get",
          success: function(data) {
            table.ajax.reload();
          }
        });
      }
    })
  }

  // function rejectInvoice(id){
  //   $('#id_invoice').val(id);
  // }

</script>
