<script>
  var table = $("#table-tagihan").DataTable({
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
    {data: 'invoice_code'},
    {data: 'member_no'},
    {data: 'email'},
    {
      data: 'amount',
      render : function (data, type, row, meta) {
        return 'Rp. ' + addCommas(data)
      }},
      {data: 'invoice_type'},
      {
        data: 'created_at',
        render : function (data, type, row, meta) {
          return formatDefaultDate(data);
        }
      },
      {
        data: 'status',
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
        data: "id",
        "render": function ( data, type, row, meta )
        {
          if(row.type != 'ADMIN'){
            var verifikasi = ''
            if(row.status != 2){
              verifikasi = '<a class="mb-1 btn btn-success btn-sm text-white" onclick="approveInvoice(' + data + ');" title="Verifikasi"><i class="fa fa-check"></i></a>&NewLine;'
            } else {
              verifikasi = ''
            }
            var reject = ''
            if(row.status != 3){
              reject = '<a class="mb-1 btn btn-warning btn-sm text-white" onclick="rejectInvoice(' + data +')" data-toggle="modal" data-target="#modal-reject" title="Tolak"><i class="fa fa-times"></i></a>&NewLine;'
            }else{
              reject = ''
            }
            return '<div class="text-center">'+
            '<a class="mb-1 btn btn-info btn-sm text-white" onclick="getImagePayment(' + data + ');"  data-toggle="modal" data-target="#modal-image"><i class="fa fa-eye" title="Bukti Bayar"></i></a>&NewLine;'+
            verifikasi+
            reject
            +
            '<a class="mb-1 btn btn-danger btn-sm text-white" onclick="deleteInvoice(' + data + ');"  title="Hapus"><i class="fa fa-trash"></i></a>'+
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

  function declineInvoice(){
    Swal.fire({
      title: 'Apakah anda yakin tolak tagihan?',
      showDenyButton: true,
      confirmButtonText: 'Iya',
      denyButtonText: `Tidak`,
    }).then((result) => {
      if (result.isConfirmed) {
        if($('#id_invoice').val()){
          $.ajax({
            url: "{!! url('backoffice/transaction/invoice/decline/') !!}/" + $('#id_invoice').val(),
            type: "GET",
            data: {description: $('#alasan_penolakan').val()},
            success: function(data) {
              $('#closeModalReject').click();
              table.ajax.reload();
            }
          });
        }
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
          url: "{!! url('backoffice/transaction/invoice/delete/') !!}/" + id,
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
          $('#image-payment').html('<img width="100%" src="{{URL::to('/')}}/'+ 'public/' + result.path +'">');
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

  function rejectInvoice(id){
    $('#id_invoice').val(id);
  }

</script>
