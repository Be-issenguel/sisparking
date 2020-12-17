<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h4>Cadastro de Tipos:</h4>
            </div>
            <div class="x_content">
                <form action="">
                    @error('descricao')
                    <div class="alert alert-danger alert-dismissible " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span>
                        </button>
                        <strong>Erro!</strong> {{ $message }}.
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="">Descrição:</label>
                        <input type="text" wire:model="descricao" class="form-control" style="border-radius: 30px"
                            name="" id="">
                    </div>
                    <a href="#" class="btn btn-dark" wire:click="changeAction(1)">Voltar</a>
                    <a href="#" wire:click="storeOrUpdate" class="btn btn-primary">{{ $buttonDescription }}</a>
                </form>
            </div>
        </div>
    </div>
</div>