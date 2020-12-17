<?php

namespace App\Http\Livewire\Caja;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Caja;

class CajaController extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $descricao, $montante, $tipo = 'Ingresso', $comprovante;
    public $search;
    public $selected_id = 0, $action = 1;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroy'];
    protected $rules = [
        'descricao' => 'required',
        'montante' => 'required',
        'tipo' => 'required',
    ];

    public function render()
    {
        if(strlen($this->search) <= 0){
            $movimentos = Caja::paginate(6);
        }else{
            $movimentos = Caja::where('descricao','like','%'.$this->search.'%')
                ->orWhere('tipo','like','%'.$this->search.'%')
                ->paginate(6);
        }
        return view('livewire.caja.caja-controller')->withMovimentos($movimentos);
    }

    public function storeOrUpdate(){
        $this->validate();
        if($this->selected_id <= 0){
            if(!is_string($this->comprovante)){
                $this->comprovante = $this->comprovante->store('comprovante','uploads');
            }else{
                $this->comprovante = null;
                session()->flash('msg_warning','O comprovante não foi informado');
            }
            Caja::create([
                'descricao' => $this->descricao, 
                'montante' => $this->montante, 
                'tipo' => $this->tipo, 
                'comprovante' => $this->comprovante,
                'user_id' => Auth::user()->id
            ]);
            session()->flash('msg_success','Caja salva com successo');
        }else{
                if(!is_string($this->comprovante)){
                    $this->comprovante = $this->comprovante->store('comprovante','uploads');
                }else{
                    $this->comprovante = null;
                }
                $caja = Caja::find($this->selected_id);
                $caja->descricao = $this->descricao;
                $caja->montante = $this->montante;
                $caja->tipo = $this->tipo;
                Storage::delete($caja->comprovante);
                $caja->comprovante = $this->comprovante;
                $caja->user_id = Auth::user()->id;
                $caja->save();
                session()->flash('msg_success','Caja actualizada com successo');
        }
        $this->resetInput();
        $this->action = 1;
    }

    public function edit($id){
        $caja = Caja::find($id);
        $this->selected_id = $caja->id;
        $this->descricao = $caja->descricao;
        $this->montante = $caja->montante;
        $this->comprovante = asset('images/uploads/'.$caja->comprovante);
        $this->tipo = $caja->tipo;
        $this->action = 2;
    }

    public function destroy($id)
    {
        Caja::destroy($id);
        $this->gotoPage(1);
    }

    public function resetInput(){
        $this->descricao = null;
        $this->tipo = 'Ingresso';
        $this->montante = null;
        $this->comprovante = null;
        $this->selected_id = 0;
        $this->search = null;
    }

    public function changeAction($action)
    {
        $this->action = $action;
    }

}
