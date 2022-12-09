<?php

namespace App\Http\Livewire\Backend\Project;

use Livewire\Component;
use App\Models\Project;
use App\Models\Category;
use App\Models\ProjectImage;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;


class Form extends Component
{
    use WithFileUploads;
    public $originalProject;

    public $project;
    
    public $method;

    public $rules = [
        'project.heading' => 'required|min:3',
        'project.category_id' => 'required',
        'project.content' => 'required',
        'project.language' => 'required',
        'project.is_comment_enabled' => 'boolean',
        'project.photo' => 'image|max:1024',
    ];
    public function mount(?Project $project = null)
    {
        if ($project->id) {
            $this->originalProject = $project;
            $this->project = $project->toArray();
            //$this->project['keywords'] = $this->originalProject->keywords->pluck('name')->implode(' ');
        }

        $this->method = $project->id ? 'put' : 'post';
    }
   
    
    public function render()
    {
        $categories = Category::active()->get();
        return view('livewire.backend.project.form',  compact('categories'));
    }

    public function submit()
    {     
        
        $data = Arr::get($this->validate(), 'project');
        if ($this->method == 'post') {
            $this->store($data);
        }else {
            $this->update($data);
        } 
    }

    protected function store(array $newProject)
    {
        $photo = '';
        if(in_array('photo',$newProject)){
        $photo= $newProject['photo'];
        $path_url = $photo->storePublicly('gallary','public');
        //Create new article
        unset($newProject['photo']);
        }
        $newProject['published_at'] = now();
        $newProject['user_id'] = Auth::id();
        
    
        $newProject = Project::create($newProject);
       if($photo!=''){
         $imageData=[
            'name' =>  $photo->getClientOriginalName(),
            'project_id'=>$newProject->id,
            'path'=>$path_url,
        ];
        if($newProject){
            $image = ProjectImage::create($imageData);
        }
       }
        //add keywords
        // $keywordsToAttach = array_unique(explode(' ', Arr::get($this->project, 'keywords')));

        // foreach ($keywordsToAttach as $keywordToAttach) {
        //     $newKeyword = Keyword::firstOrCreate(['name' => $keywordToAttach]);
        //     $newProject->keywords()->attach($newKeyword->id);
        // }

        //Notify all subscriber about the new article
        // foreach (User::getSubscribedUsers() as $subscriber) {
        //     Mail::to($subscriber->email)->queue(new NotifySubscriberForNewArticle($newProject, $subscriber));
        // }

        session()->flash('success', 'Project published successfully!');
        redirect()->to(route('backend.project.index'));
    }

    protected function update(array $updateData)
    {
      if(array_key_exists('photo',$updateData)){
        $photo= $updateData['photo'];
        $path_url = $photo->storePublicly('gallary','public');    
     
        unset($updateData['photo']);
        $this->originalProject->update($updateData);
        $imageData=[
            'name' =>  $photo->getClientOriginalName(),
            'project_id'=>$this->project['id'],
            'path'=>$path_url,
        ];
       
            $image = ProjectImage::updateOrCreate(
                ['project_id' => $this->project['id']],
                ['name' =>$imageData['name'], 'path' => $imageData['path']]
             );
            }else{
                unset($updateData['photo']);
                $this->originalProject->update($updateData);
            }

       // $this->originalArticle->keywords()->detach();

        //$keywordsToAttach = array_unique(explode(' ', Arr::get($this->article, 'keywords')));

        // foreach ($keywordsToAttach as $keywordToAttach) {
        //     $newKeyword = Keyword::firstOrCreate(['name' => $keywordToAttach]);
        //     $this->originalArticle->keywords()->attach($newKeyword->id);
        // }

        session()->flash('successMsg', 'Project updated successfully!');
        redirect()->to(route('backend.project.index'));
    }

}
