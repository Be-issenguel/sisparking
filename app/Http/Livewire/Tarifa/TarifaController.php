<?php

namespace App\Http\Livewire\Tarifa;

use Livewire\Component;
use App\Tipo;
use App\Tarifa;
use Livewire\WithPagination;

class TarifaController extends Component
{
    use WithPagination;
    public $tipos, $hierarquia,$custo,$descricao,$tipo,$tempo;
    public $search, $tarifa_id;

    protected $rules = [
        'tempo' => 'required',
        'custo' => 'required',
        'descricao' => 'required',
        'tipo' => 'required',
        'hierarquia' => 'required'
    ];
    protected $listeners = ['receberDados','edit','destroy'];
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->hierarquia = Tarifa::count();
    }

    public function render()
    {
        $this->tipos = Tipo::all();
        if(strlen($this->search) > 0){
            $tarifas = Tarifa::where('descricao','like', '%'.$this->search.'%')->paginate(6);
        }else{
            $tarifas = Tarifa::paginate(6);
        }
        return view('livewire.tarifa.tarifa-controller')->withTarifas($tarifas);
    }

    public function storeOrUpdate()
    {
        $this->validate();
        if($this->tarifa_id > 0){
            $tarifa = Tarifa::find($this->tarifa_id);
            $tarifa->descricao = $this->descricao;
            $tarifa->tempo = $this->tempo;
            $tarifa->custo = $this->custo;
            $tarifa->tipo_id = $this->tipo;
            $tarifa->hierarquia = $this->hierarquia;
            $tarifa->save();
            session()->flash('msg_success','Tarifa actualizada com successo!');
        }else{
            Tarifa::create([
                'descricao' => $this->descricao,
                'tempo' => $this->tempo,
                'tipo_id' => $this->tipo,
                'custo' => $this->custo,
                'hierarquia' => $this->hierarquia
            ]);
            session()->flash('msg_success','Tarifa cadastrada com sucesso!');
        }
        $this->resetInput();
    }

    public function receberDados($dados){
        $this->tarifa_id = ($dados["tarifa_id"] == "")?0:$dados["tarifa_id"];
        $this->tempo = $dados['tempo'];
        $this->tipo = $dados['tipo'];
        $this->descricao = $dados['descricao'];
        $this->custo = $dados['custo'];
        $this->hierarquia = $dados['hierarquia'];
        $this->storeOrUpdate();
        $this->resetInput();
    }

    public function edit($tarifa_id)
    {
        $tarifa = Tarifa::find($id);
        $this->tarifa_id = $tarifa->id;
        $this->descricao = $tarifa->descricao;
        $this->tipo = $tarifa->tipo_id;
        $this->custo = $tarifa->custo;
        $this->tempo = $tarifa->tempo;
        $this->hierarquia = $tarifa->hierarquia;
    }

    public function destroy($tarifa_id)
    {
        Tarifa::destroy($tarifa_id);
        $this->gotoPage(1);
    }

    public function resetInput()
    {
        $this->descricao = null;
        $this->tempo = null;
        $this->tipo = null;
        $this->custo = 0;
        $this->descricao = null;
        $this->tarifa_id = null;
    }
}
