<div class="row" style="display: block">
    <div class="col-md-12 col-sm-6  ">
        <div class="x_panel">
            <h3 class="text-center">Tipos de Veículos</h3>
            <div class="x_title">
                @include('includes.search')
                @include('includes.alertas')
                <div class="nav navbar-right panel_toolbox">
                    <a href="#" wire:click="changeAction(2)" class="btn btn-dark"><i class="fa fa-save"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tipo</th>
                            <th>Data de Criação</th>
                            <th>Data de Edição</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tipos as $tipo)
                        <tr>
                            <td>{{ $tipo->descricao }}</td>
                            <td>{{ $tipo->created_at }}</td>
                            <td>{{ $tipo->updated_at }}</td>
                            <td>
                                <a href="#" style="color:green" wire:click="edit({{ $tipo->id }})"><i
                                        class="fa fa-pencil"></i></a>
                                <a href="#" style="color:red" onclick="removerTipo({{ $tipo->id }})"><i
                                        class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $tipos->links() }}
            </div>
        </div>
    </div>
</div>