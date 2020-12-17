<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h4 class="text-center">Cadastro de Cajon</h4>
            </div>
            <div class="x_content">
                @foreach ($errors->all() as $erro)
                <div class="alert alert-danger">
                    {{ $erro }}
                </div>
                @endforeach

                <form action="">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <input type="text" class="form-control" id="descricao" wire:model="descricao"
                                style="border-radius: 30px">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="" id="status" wire:model="status" class="form-control"
                                style="border-radius: 30px">
                                <option>----------- escolha o etatus ----------</option>
                                <option value="DISPONIVEL">DISPONÍVEL</option>
                                <option value="OCUPADO">OCUPADO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tipo">Tipo</label>
                            <select name="" id="tipo" wire:model="tipo_id" class="form-control"
                                style="border-radius: 30px">
                                <option>----------- escolha o tipo de veículo ----------</option>
                                @foreach ($tipos as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->descricao }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <a href="javascrpt:void(0)" wire:click="changeAction(1)" class="btn btn-dark">Voltar</a>
                    <a href="javascrpt:void(0)" class="btn btn-primary"
                        wire:click="storeOrUpdate">{{ $buttonDescription }}</a>
                </form>
            </div>
        </div>
    </div>
</div>