function removerTipo(id) {
    swal({
        title: "Atenção",
        text: "Tem Certeza Quer Remover Este Tipo?",
        icon: "warning",
        buttons: ["Cancelar", "Remover"],
        dangerMode: false
    }).then((removerTipo) => {
        if (removerTipo) {
            Livewire.emit('destroyTipo', id);
            new PNotify({
                title: 'Successo',
                text: 'Veículo removido com sucesso',
                type: 'info',
                styling: 'bootstrap3'
            })
        } else {
            new PNotify({
                title: 'Aviso',
                text: 'Operação Cancelada',
                type: 'danger',
                styling: 'bootstrap3'
            })
        }
    })
}

function removerCajon(id) {
    swal({
        title: 'Remover cajon?',
        text: '',
        icon: 'warning',
        buttons: ['Cancelar', 'Sim']
    }).then((removerCajon) => {
        if (removerCajon) {
            Livewire.emit('destroy', id);
            new PNotify({
                title: 'Successo',
                text: 'Cajon removido com sucesso',
                type: 'info',
                styling: 'bootstrap3'
            })
        } else {
            new PNotify({
                title: 'Aviso',
                text: 'Operação cancelada',
                type: 'danger',
                styling: 'bootstrap3'
            })
        }
    })
}

function deleteCaja(id) {
    swal({
        title: 'Remover este movimento?',
        text: '',
        icon: 'warning',
        buttons: ['Cancelar', 'Ok']
    }).then((remover) => {
        if (remover) {
            Livewire.emit('destroy', id);
            new PNotify({
                title: 'Succeso',
                text: 'Movimento removido com sucesso!',
                type: 'success',
                styling: 'bootstrap3'
            })
        } else {
            new PNotify({
                title: 'Aviso',
                text: 'Operação cancelada!',
                type: 'danger',
                styling: 'bootstrap3'
            })
        }
    })
}



function salvar_tarifa() {
    if ($("#descricao").val() == undefined || $("#descricao").val() == '') {
        new PNotify({
            title: 'Erro',
            text: 'A descrição deve ser preenchida',
            type: 'error',
            styling: 'bootstrap3'
        });
    } else if ($("#custo").val() == 0 || $("#custo").val() == undefined || $("#custo").val() == '') {
        new PNotify({
            title: 'Erro',
            text: 'O custo deve ser preenchido!',
            type: 'error',
            styling: 'bootstrap3'
        });
    } else {
        dados = {
            'descricao': $('#descricao').val(),
            'custo': $('#custo').val(),
            'tempo': $('#tempo').val(),
            'tipo': $('#tipo').val(),
            'hierarquia': $('#hierarquia').val(),
            'tarifa_id': $('#tarifa_id').val(),
        }
        $('#descricao').val(null);
        $('#custo').val(null);
        Livewire.emit('receberDados', dados);
    }
}

function removerTarifa(id) {
    swal({
        title: 'Remover tarifa?',
        text: '',
        icon: 'warning',
        buttons: ['Cancelar', 'Sim']
    }).then((removerCajon) => {
        if (removerCajon) {
            Livewire.emit('destroy', id);
            new PNotify({
                title: 'Successo',
                text: 'Tarifa removido com sucesso',
                type: 'info',
                styling: 'bootstrap3'
            })
        } else {
            new PNotify({
                title: 'Aviso',
                text: 'Operação cancelada',
                type: 'danger',
                styling: 'bootstrap3'
            })
        }
    })
}

function editTarifa(tarifa) {
    $("#tempo").val(tarifa.tempo);
    $("#tipo").val(tarifa.tipo.id);
    $("#descricao").val(tarifa.descricao);
    $("#hierarquia").val(tarifa.hierarquia);
    $("#custo").val(tarifa.custo);
    $("#tarifa_id").val(tarifa.id);
    $("#mdl-cadastro-tarifas").modal();
}