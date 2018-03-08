@if ($message = Session::get('success'))
<script type="text/javascript">
$(document).ready(function () {
swal(
        {
            title: 'Solicitação concluída!',
            text: '{{ $message }}',
            type: 'success',
            confirmButtonClass: 'btn btn-confirm mt-2'
        }
    );
});
</script>
@endif


@if ($message = Session::get('error'))
<script type="text/javascript">
$(document).ready(function () {
swal(
        {
            title: 'Solicitação Falhou!',
            text: '{{ $message }}',
            type: 'error',
            confirmButtonClass: 'btn btn-confirm mt-2'
        }
    );
});
</script>
@endif

@if ($message = Session::get('warning'))
<script type="text/javascript">
$(document).ready(function () {
swal(
        {
            title: 'Atenção!',
            text: '{{ $message }}',
            type: 'warning',
            confirmButtonClass: 'btn btn-confirm mt-2'
        }
    );
});
</script>
@endif

@if ($message = Session::get('info'))
<script type="text/javascript">
$(document).ready(function () {
swal(
        {
            title: 'DoutorHJ Informa!',
            text: '{{ $message }}',
            type: 'info',
            confirmButtonClass: 'btn btn-confirm mt-2'
        }
    );
});
</script>
@endif

@if ($errors->any())
<script type="text/javascript">
$(document).ready(function () {
swal(
        {
            title: 'Operação Falhou!',
            text: 'Por favor, verifique sua operação e tente novamente.',
            type: 'error',
            confirmButtonClass: 'btn btn-confirm mt-2'
        }
    );
});
</script>
@endif