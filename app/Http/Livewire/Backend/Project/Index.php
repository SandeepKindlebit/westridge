<?php

namespace App\Http\Livewire\Backend\Project;

use Livewire\Component;
use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $category = '';
    public $query = '';
   
    protected $listeners = ['projectDeleted' => '$refresh'];
    protected $queryString = [
        'category' => ['except' => ''],      
        'query' => ['except' => ''],
    ];
  
    public function render()
    {
        $project = $this->getProjects();
        return view('livewire.backend.project.index', compact('project'));
    }

    private function getProjects()
    {
        $projects = Project::notDeleted()
            ->with('category', 'user','image')
            ->latest();          
    
            if ($this->category) {
                $projects = $projects->where('category_id', $this->category);
            }           
    
            if ($this->query) {
                $projects = $projects->search($this->query);
            }
            return $projects->paginate(config('blog.item_per_page'));
       // return $projects->get();
    }
}
