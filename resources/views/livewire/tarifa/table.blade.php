<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="text-center">Listagem de tarifas</h3>
            </div>
            <div class="x_content">
                @include('includes.alertas')
                @include('includes.search')
                <a href="#" class="btn btn-dark" style="float: right" data-toggle="modal"
                    data-target="#mdl-cadastro-tarifas"><i class="fa fa-save"></i></a>

                <div class="modal fade" id="mdl-cadastro-tarifas" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel2">Cadastro de tarifa</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="hidden" id="tarifa_id">
                                            <label for="tempo">Tempo</label>
                                            <select name="" id="tempo" class="form-control" style="border-radius: 30px">
                                                <option value="Hora">Hora</option>
                                                <option value="Dia">Dia</option>
                                                <option value="Semana">Semana</option>
                                                <option value="Mês">Mês</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tipo">Tipo</label>
                                            <select name="" id="tipo" class="form-control" style="border-radius: 30px">
                                                @foreach ($tipos as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->descricao }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="custo">Custo</label>
                                            <input type="number" name="" class="form-control" id="custo"
                                                style="border-radius: 30px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="descricao">Descrição</label>
                                        <input type="text" name="" class="form-control" id="descricao"
                                            style="border-radius: 30px">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="hierarquia">Hierarquia</label>
                                        <input type="number" name="" wire:model="hierarquia" class="form-control"
                                            id="hierarquia" style="border-radius: 30px" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="salvar_tarifa()" data-dismiss="modal"
                                    class="btn btn-primary">Save
                                    changes</button>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /modals -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Descrição</th>
                            <th>Tempo</th>
                            <th>Custo</th>
                            <th>Tipo</th>
                            <th>Hierarquia</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tarifas as $tarifa)
                        <tr>
                            <td>{{ $tarifa->descricao }}</td>
                            <td>{{ $tarifa->tempo }}</td>
                            <td>{{ $tarifa->custo }}</td>
                            <td>{{ $tarifa->tipo->descricao }}</td>
                            <td>{{ $tarifa->hierarquia }}</td>
                            <td>
                                <a href="#" style="color: green" onclick="editTarifa({{$tarifa}})"><i
                                        class="fa fa-edit"></i></a>
                                <a href="#" style="color:red;" onclick="removerTarifa({{$tarifa->id}})"><i
                                        class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $tarifas->links() }}
            </div>
        </div>
    </div>
</div>