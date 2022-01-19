<!-- jQuery -->
<script src="{{asset('template/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('template/admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('template/admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('template/admin/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('template/admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('template/admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('template/admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('template/admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('template/admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('template/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('template/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('template/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('template/admin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('template/admin/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('template/admin/dist/js/pages/dashboard.js')}}"></script>

<script src="{{asset('datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('datatables/dataTables.bootstrap4.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('template/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('js/sweetalert.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    @if(Session::has('title') || Session::has('text') || Session::has('icon'))
    Swal.fire({
        title: '{{Session::get('title')}}',
        text: '{{Session::get('text')}}',
        icon: '{{Session::get('icon')}}',
    })
    @elseif(count($errors) == 0)
    @endif
    $(document).ready(function() {
        $('select.select2').select2({
            theme: 'bootstrap'
        });
    });

    function addCommas(nStr)
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        return x1 + x2;
    }


    function formatDefaultDate(date) {
        const months = ["Jan", "Feb", "Mar","Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        var d = typeof date === 'string' ? new Date(date) : date,
        // month = '' + (d.getMonth() + 1),
        month = months[d.getMonth()],
        day = '' + d.getDate(),
        year = d.getFullYear();

        if (month.length < 2) 
          month = '0' + month;
      if (day.length < 2) 
          day = '0' + day;

      return [day, month, year].join('-');
  }

  function previewImage(input, id) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#'+id).attr('src', e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
      }
  }
</script>