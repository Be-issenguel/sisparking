<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Tipo;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class TipoController extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $action = 1;
    public $selected_id = 0;
    public $descricao = null;
    protected $listeners = ['destroyTipo'];
    public $buttonDescription = "Criar Tipo";
    public $search = null;

    protected $rules = ['descricao' => 'required|min:4'];

    public function render()
    {
        if(strlen($this->search) > 0){
            $tipos = Tipo::where('descricao','like','%'.$this->search.'%')->paginate(6);
            return view('livewire.tipos.tipo-controller')->withTipos($tipos);
        }else{
            $tipos = Tipo::paginate(6);
            return view('livewire.tipos.tipo-controller')->withTipos($tipos);
        }
    }

    public function edit($id){
        $tipo = Tipo::find($id);
        $this->descricao = $tipo->descricao;
        $this->selected_id = $tipo->id;
        $this->action = 2;
        $this->buttonDescription = "Actualizar Tipo";
    }

    public function storeOrUpdate(){
        $this->validate();
        if($this->selected_id <= 0){
            Tipo::create([
                'descricao' => $this->descricao
            ]);
            session()->flash('msg_success','Tipo Criado com successo!');
        }else{
            $tipo = Tipo::where('descricao',$this->descricao);
            if($tipo->count()){
                session()->flash('msg_error','Já existe um tipo com esta descrição!');
            }else{
                $tipo = Tipo::find($this->selected_id);
                $tipo->descricao = $this->descricao;
                $tipo->save();
                session()->flash('msg_success','Tipo actualizado sucesso!');
            }
        }
        $this->resetInput();
        $this->action = 1;
    }

    public function changeAction($action)
    {
        $this->buttonDescription = "Criar Tipo";
        $this->descricao = null;
        $this->selected_id = 0;
        $this->action = $action;
    }

    public function destroyTipo($id){
        Tipo::destroy($id);
        $this->action = 1;
    }

    public function resetInput(){
        $this->descricao = null;
        $this->selected_id = 0;
        $this->action = 1;
    }


}
