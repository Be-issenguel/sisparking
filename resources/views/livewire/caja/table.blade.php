<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="text-center">Movimentos</h3>
            </div>
            <div class="x_content">
                @include('includes.search')
                <a href="javascript:void(0)" wire:click="changeAction(2)" class="btn btn-dark" style="float: right"><i
                        class="fa fa-save"></i></a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Descrição</th>
                            <th>Tipo</th>
                            <th>Montante</th>
                            <th>Comprovante</th>
                            <th>User</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movimentos as $movimento)
                        <tr>
                            <td>{{ $movimento->descricao }}</td>
                            <td>{{ $movimento->tipo }}</td>
                            <td>{{ $movimento->montante }}</td>
                            <td>
                                @if ($movimento->comprovante != null)
                                <img src="{{ asset('images/uploads/'.$movimento->comprovante) }}" alt="" width="30">
                                @else
                                {{ __('SEM COMPROVANTE') }}
                                @endif
                            </td>
                            <td>{{ $movimento->user->name }}</td>
                            <td>
                                <a href="javascript:void(0)" wire:click="edit({{ $movimento->id }})"
                                    style="color: green"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" onclick="deleteCaja({{ $movimento->id }})"
                                    style="color: red"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $movimentos->links() }}
            </div>
        </div>
    </div>
</div>