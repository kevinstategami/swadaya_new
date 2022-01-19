<script>
  var table = $("#table-tagihan-history").DataTable({
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
        return 'Rp. ' + data
      }},
      {data: 'invoice_type'},
      {
        data: 'created_at',
        render : function (data, type, row, meta) {
          return formatDefaultDate(data);
        }
      },
      {
        data: 'invoice.status',
        render : function (data, type, row, meta) {
          if(data == 0) {
            return '<a class="badge badge-pill badge-secondary">Belum Bayar</a>';
          }else if(data == 3){
            return '<a class="badge badge-pill badge-danger">Ditolak</a>';
          }else if(data == 1){
            return '<a class="badge badge-pill badge-info">Menunggu Verifikasi</a>';
          }else if(data == 2){
            return '<a class="badge badge-pill badge-success">Disetujui</a>';
          }else {
            return '<a class="badge badge-pill badge-warning text-white">Tidak ada Status</a>';
          }
        }
      },
      {
        data: "invoice.id",
        "render": function ( data, type, row, meta )
        {
          if(row.type != 'ADMIN'){
            return '<div class="text-center">'+
            '<a class="mb-1 btn btn-info btn-sm text-white" onclick="getImagePayment(' + data + ');"  data-toggle="modal" data-target="#modal-image"><i class="fa fa-eye" title="Bukti Bayar"></i></a>&NewLine;'+
            '<a class="mb-1 btn btn-danger btn-sm text-white" onclick="deleteInvoice(' + row.id + ');"  title="Hapus"><i class="fa fa-trash"></i></a>'+
            '</div>';
          }else{
            return '';
          }
        }
      }
      ],
      colReorder: true,
    });

  function approveInvoice(id){
    Swal.fire({
      title: 'Apakah anda yakin setujui tagihan?',
      showDenyButton: true,
      confirmButtonText: 'Iya',
      denyButtonText: `Tidak`,
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "{!! url('backoffice/transaction/invoice/approved/') !!}/" + id,
          dataType: "json",
          type: "get",
          success: function(data) {
            table.ajax.reload();
          }
        });
      }
    })
  }

  function declineInvoice(id){
    Swal.fire({
      title: 'Apakah anda yakin tolak tagihan?',
      showDenyButton: true,
      confirmButtonText: 'Iya',
      denyButtonText: `Tidak`,
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "{!! url('backoffice/transaction/invoice/decline/') !!}/" + id,
          dataType: "json",
          type: "get",
          success: function(data) {
            table.ajax.reload();
          }
        });
      }
    })
  }

  function deleteInvoice(id){
    Swal.fire({
      title: 'Apakah anda yakin menghapus tagihan?',
      showDenyButton: true,
      confirmButtonText: 'Iya',
      denyButtonText: `Tidak`,
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "{!! url('backoffice/transaction/invoice-history/delete/') !!}/" + id,
          dataType: "json",
          type: "get",
          success: function(data) {
            table.ajax.reload();
          }
        });
      }
    })
  }

  function getImagePayment(id){
    $.ajax
    ({
      url: '{{URL::current()}}/image/' + id,
      type: 'get',
      success: function(result){
        if(result.path){
          $('#image-payment').html('<img width="100%" src="{{URL::to('/')}}/'+ result.path +'">');
        }else{
          $('#image-payment').html('<p>Belum Mengirimkan Bukti Transfer</p>');

        }
        $('#activation_member_id').val(id)
      },
      error: function () {
        $('#closeModalActivation').click();
      }
    });
  }

</script>
