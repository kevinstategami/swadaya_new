<script>
  var table = $("#table-dompet").DataTable({
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
      data: 'membership_account.fullname',
      render : function (data, type, row, meta) {
        if(data) {
          return data;
        } else{
          return 'N/A';
        }
      }
    },
    {data: 'membership_account.member_no'},
    {data: 'membership_account.email'},
    {
      data: 'amount',
      render : function (data, type, row, meta) {
        return 'Rp. ' + data
      }
    },
    {
      data: 'status_wallet',
      render : function (data, type, row, meta) {
        if(data == 0) {
          return '<a class="badge badge-pill badge-danger">Tidak Aktif</a>';
        }else if(data == 1){
          return '<a class="badge badge-pill badge-success">Aktif</a>';
        }else {
          return '<a class="badge badge-pill badge-warning text-white">Tidak ada Status</a>';
        }
      }
    },
    {
      data: "id",
      "render": function ( data, type, row, meta )
      {
        var buttonActivation = ''
        var buttonDeactive = ''
        if(row.status_wallet != 1){
          buttonActivation = '<a class="mb-1 btn btn-success btn-sm text-white" onclick="activateWallet('+ row.id +')"><i class="fa fa-check" title="Aktifkan"></i></a>&NewLine;';
        }else{
         buttonDeactive = '<a class="mb-1 btn btn-warning btn-sm text-white" onclick="deactiveWallet('+ row.id +')"><i class="fa fa-ban" title="Non-Aktif"></i></a>&NewLine;'; 
       }
       return '<div class="text-center">'+
       '<a class="mb-1 btn btn-info btn-sm text-white" onclick="getHistory('+ row.user_id +')"  data-toggle="modal" data-target="#modal-history"><i class="fa fa-history" title="History"></i></a>&NewLine;'+
       buttonActivation+
       buttonDeactive+
       '<a class="mb-1 btn btn-danger btn-sm text-white" onclick="deleteWallet('+ row.id +')"  title="Hapus"><i class="fa fa-trash"></i></a>'+
       '</div>';
     }
   }
   ],
   colReorder: true,
 });

  function getHistory(id){
    $('#table-wallet-history').DataTable().destroy();
    var tableHistoryWallet = $("#table-wallet-history").DataTable({
      "processing": true,
      "ordering": false,
      "serverSide": true,
      "ajax":{
        "url": '{{URL::current()}}/history/' + id,
        "data": function ( d ) {
          return $.extend( {}, d, {
            type: true
          } );
        }
      },
      columns: [
      {data: 'membership_account.fullname'},
      {data: 'membership_account.member_no'},
      {data: 'mutation_type'},
      {
        data: 'amount',
        render : function (data, type, row, meta) {
          return 'Rp. ' + data
        }
      },
      {data: 'description'}
      ],
      colReorder: true,
    });
  }

  function activateWallet(id){
    Swal.fire({
      title: 'Apakah anda yakin mengaktifkan dompet?',
      showDenyButton: true,
      confirmButtonText: 'Iya',
      denyButtonText: `Tidak`,
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "{!! url('backoffice/transaction/wallet/activate/') !!}/" + id,
          dataType: "json",
          type: "get",
          success: function(data) {
            table.ajax.reload();
          }
        });
      }
    })
  }

  function deactiveWallet(id){
    Swal.fire({
      title: 'Apakah anda yakin menonaktifkan dompet?',
      showDenyButton: true,
      confirmButtonText: 'Iya',
      denyButtonText: `Tidak`,
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "{!! url('backoffice/transaction/wallet/deactive/') !!}/" + id,
          dataType: "json",
          type: "get",
          success: function(data) {
            table.ajax.reload();
          }
        });
      }
    })
  }

  function deleteWallet(id){
    Swal.fire({
      title: 'Apakah anda yakin menghapus dompet anggota?',
      showDenyButton: true,
      confirmButtonText: 'Iya',
      denyButtonText: `Tidak`,
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "{!! url('backoffice/transaction/wallet/delete/') !!}/" + id,
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