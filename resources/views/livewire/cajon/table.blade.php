<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h4 class="text-center">Listagem de cajones</h4>
                <div class="nav navbar-right panel_toolbox">
                    <a href="#" wire:click="changeAction(2)" class="btn btn-dark"><i class="fa fa-save"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @include('includes.search')
                @include('includes.alertas')
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Cajon</th>
                            <th>Status</th>
                            <th>Tipo</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cajones as $cajon)
                        <tr>
                            <td>{{ $cajon->descricao }}</td>
                            <td>{{ $cajon->status }}</td>
                            <td>{{ $cajon->tipo->descricao }}</td>
                            <td>
                                <a href="#" wire:click="edit({{ $cajon->id }})" style="color: green"><i
                                        class="fa fa-pencil"></i></a>
                                <a href="#" onclick="removerCajon({{ $cajon->id }})" style="color: red"><i
                                        class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $cajones->links() }}
            </div>
        </div>
    </div>
</div>