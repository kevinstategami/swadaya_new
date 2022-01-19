<script>
	var table = $("#table-visi").dataTable({
      serverSide: true,
      "lengthMenu": [[15,25,50,100], [15,25,50,100]],
      "pageLength": 15,
      "searching" : true,
      "scrollX": true,
      'scrollY': '100vh',
      "scrollCollapse": true,
      'autoWidth': true,
      'bSort': true,
      'bPaginate': true,
      //'processing': true,
      ajax:{
        url: "{{ url('backoffice/konfigurasi/visi/getIndex') }}",
        dataType: "json",
        type: "GET",
        error: function(){  // error handling
          $(".table-visi-error").html("");
          $("#table-visi").append('<tbody class="employee-grid-error"><tr><th class="text-center" colspan="4">No data found in the server</th></tr></tbody>');
          $("#table-visi_processing").css("display","none");
    
        }
      },
      columns: [
        {data: 'id'},
        {data: 'description'},
        {data: 'id'}
      ],
      columnDefs: [
        {
            "targets": [0],
            "data": null,
            "createdCell": function (td, cellData, rowData, row, col) {
              $(td).empty();
              $(td).text(row+1);
            },
        },
        {
	        "targets": [2],
	        "data": null,
	        "createdCell": function (td, cellData, rowData, row, col) {
	          $(td).empty();
	          $(td)
	          .append($('@include('inc.button.groupE')'));
	          $(td).addClass('text-center');
	        },
	    },
      ],
      createdRow: function ( row, data, index ) {
          $(row).attr('id','table_'+index);
      }
    });
    
    $('#table-visi').on('click','.btn-edit-record', function(){
    
        var tr = $(this).closest('tr');
        var row = table.api().row( tr );
        var id = tr.attr('id').split('_');
        var index = id[1];
        var data = table.fnGetData();
    
        location.href="{!! url('backoffice/konfigurasi/visi/edit') !!}/" + data[index].id
    });
    
    $('#table-visi').on('click','.btn-remove-record', function(){
    
        var tr = $(this).closest('tr');
        var row = table.api().row( tr );
        var id = tr.attr('id').split('_');
        var index = id[1];
        var data = table.fnGetData();
        
        Swal.fire({
          title: 'Apakah Anda Yakin?',
          showDenyButton: true,
          confirmButtonText: 'Iya',
          denyButtonText: `Tidak`,
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            $.ajax({
              url: "{!! url('backoffice/konfigurasi/visi/delete') !!}/" + data[index].id,
              data: {},
              dataType: "json",
              type: "get",
              success:function(data)
              {
                window.location.reload()
              }
              });
          }
        })
    });
</script>