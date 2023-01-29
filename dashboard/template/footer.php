        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="../assets/js/popper.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    (function ($) {
        "use strict";
        var fullHeight = function () {
            $('.js-fullheight').css('height', $(window).height());
            $(window).resize(function () {
                $('.js-fullheight').css('height', $(window).height());
            });
        };
        fullHeight();
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    })(jQuery);
</script>
<script>
    $(document).ready(function () {
        $('.dataTable').DataTable();
        $('#form_save').submit(function(){
            $('#form_save a.btn-back').addClass('disabled')
            $('#form_save button[type="submit"]').addClass('disabled')
            $('#form_save button[type="submit"]').html('<i class="fa fa-spinner fa-spin"></i> Prosess, mohon tunggu')
            $(this).closest('form').submit()
        })
    });
</script>
</body>

</html>