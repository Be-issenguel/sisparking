<?php

namespace App\Http\Livewire\Cajon;

use Livewire\Component;
use Livewire\WithPagination;
use App\Tipo;
use App\Cajon;

class CajonController extends Component
{
    use WithPagination;

    public $descricao;
    public $tipo_id;
    public $status;
    public $selected_id = 0, $search, $tipos, $action = 1;
    public $buttonDescription = 'Salvar';

    protected $rules = array(
        'descricao' => 'required',
        'tipo_id' => 'required',
        'status' => 'required'
    );
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroy'];

    public function render()
    {
        $this->tipos = Tipo::all();
        if(strlen($this->search) <= 0){
            $cajones = Cajon::paginate(4);
        }else{
            $cajones = Cajon::where('descricao','like','%'.$this->search.'%')
                ->orWhere('status','like', '%'.$this->search.'%')
                ->paginate(4);
        }
        return view('livewire.cajon.cajon-controller')->withCajones($cajones);
    }

    public function storeOrUpdate()
    {
        $this->validate();
        if($this->selected_id <= 0){
            Cajon::create([
                'descricao' => $this->descricao,
                'tipo_id' => $this->tipo_id,
                'status' => $this->status,
            ]);
            session()->flash('msg_success','Cajon cadastrado com sucesso');
        }else{
            $cajon = Cajon::where('descricao',$this->descricao);
            if(!$cajon->count()){
                $cajon = Cajon::find($this->selected_id);
                $cajon->descricao = $this->descricao;
                $cajon->tipo_id = $this->tipo_id;
                $cajon->status = $this->status;
                $cajon->save();
                session()->flash('msg_success','Cajon Actualizado com sucesso');
            }else{
                session()->flash('msg_error','Já existe um cajon com a mesma descrição');
            }
        }
        $this->resetInput();
        $this->action = 1;
    }

    public function resetInput()
    {
        $this->descricao = null;
        $this->tipo_id = null;
        $this->status = null;
        $this->selected_id = null;
    }

    public function changeAction($action)
    {
        $this->action = $action;
        $this->buttonDescription = 'Salvar';
    }

    public function edit($id)
    {
        $cajon = Cajon::find($id);
        $this->descricao = $cajon->descricao;
        $this->selected_id = $cajon->id;
        $this->tipo_id = $cajon->tipo->id;
        $this->status = $cajon->status;
        $this->buttonDescription = 'Actualizar';
        $this->action = 2;
    }

    public function updateSearch(){
        $this->gotoPage(1);
    }

    public function destroy($id)
    {
        Cajon::destroy($id);
        $this->updateSearch();
    }

}
