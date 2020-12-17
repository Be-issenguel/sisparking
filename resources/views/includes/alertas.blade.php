@if (session()->has('msg_success'))
<script>
    new PNotify({
            title: 'Sucesso',
            text: "{{ @session('msg_success') }}",
            type: 'success',
            styling: 'bootstrap3'
        });
</script>
@endif
@if (session()->has('msg_error'))
<script>
    new PNotify({
            title: "Erro",
            text: "{{ @session('msg_error') }}",
            type: 'error',
            styling: 'bootstrap3'
        })
</script>
@endif