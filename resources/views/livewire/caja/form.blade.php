<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="text-center">Registar Caja</h3>
            </div>
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <strong>{{ $error }}</strong>
            </div>
            @endforeach
            <div class="x_content">
                <form>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Descrição</label>
                            <input type="text" wire:model="descricao" name="" id="" class="form-control"
                                style="border-radius:30px">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Montante</label>
                            <input type="number" wire:model="montante" class="form-control" style="border-radius:30px">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tipo</label>
                            <select name="" wire:model="tipo" id="" class="form-control" style="border-radius:30px">
                                <option value="Ingresso">Ingresso</option>
                                <option value="Gasto">Gasto</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Comprovante</label>
                            <input type="file" wire:model="comprovante" id="" class="form-control"
                                style="border-radius:30px">
                        </div>
                    </div>
                    <a href="javascript:void(0)" wire:click="changeAction(1)" class="btn btn-dark">Voltar</a>
                    <a href="javascript:void(0)" wire:click="storeOrUpdate" class="btn btn-primary">Salvar</a>
                </form>
            </div>
        </div>
    </div>
</div>