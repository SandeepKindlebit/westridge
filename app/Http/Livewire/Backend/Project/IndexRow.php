<?php

namespace App\Http\Livewire\Backend\Project;
use App\Models\Project;
use Livewire\Component;
use App\Models\ProjectImage;

class IndexRow extends Component
{
    public $project;

    public function mount(Project $project)
    {
        $this->project =$project;
    } 

    public function render()
    {       
        return view('livewire.backend.project.index-row');
    }

    public function togglePublish()
    {
        $this->project->update([
            'is_published' => !$this->project->is_published,
            'published_at' => now(),
        ]);

        $this->project->refresh();
    }

    public function destroy()
    {
        $this->project->update(['is_deleted' => 1]);
        ProjectImage::where('project_id',$this->project->id)->delete();
        $this->emitUp('projectDeleted');
    }
}
