<script>
    $(document).ready(function()
    {
        $.noConflict();
        $('.table').DataTable();
        $('.valor').mask('000.000.000.000.000,00', {reverse:true});
        $('.date').mask('00/00/0000');
        $('.time').mask('00:00');
    });
</script>
