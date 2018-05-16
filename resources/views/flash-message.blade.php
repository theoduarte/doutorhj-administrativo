<!-- NOTIFICATIONS -->
@if ($message = Session::get('success'))
<script type="text/javascript">
$(document).ready(function () {

	$.Notification.notify('success', 'top right', 'Solicitação Concluída!', '{{ $message }}');
});
</script>
@endif


@if ($message = Session::get('error'))
<script type="text/javascript">
$(document).ready(function () {

	$.Notification.notify('error','top right', 'Solicitação Falhou!', '{{ $message }}');
});
</script>
@endif

@if ($message = Session::get('warning'))
<script type="text/javascript">
$(document).ready(function () {

	$.Notification.notify('warning','top right', 'Atenção!', '{{ $message }}');
});
</script>
@endif

@if ($message = Session::get('info'))
<script type="text/javascript">
$(document).ready(function () {

	$.Notification.notify('info', 'top right', 'DoutorHJ Informa!', '{{ $message }}');
});
</script>
@endif

<!-- ALERTS -->
@if ($message = Session::get('success-alert'))
<script type="text/javascript">
$(document).ready(function () {
swal(
        {
            title: 'Solicitação Concluída!',
            text: '{{ $message }}',
            type: 'success',
            confirmButtonClass: 'btn btn-confirm mt-2'
        }
    );
});
</script>
@endif


@if ($message = Session::get('error-alert'))
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

@if ($message = Session::get('warning-alert'))
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

@if ($message = Session::get('info-alert'))
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