<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ProjectForm extends Component
{
    use WithFileUploads;

    public Project $project;

    /** @var Collection<Type> */
    public Collection $types;

    /** @var Collection<Technology> */
    public Collection $technologies;

    /** @var Collection<Media> */
    public Collection $media;

    /** @var array< \Livewire\TemporaryUploadedFile> */
    public $media_upload = [];

    public function addMedia($media)
    {
        $this->media_upload[] = $media;
    }

    public function deleteMedia($media)
    {
        unset($this->media_upload[$media]);
        $this->media_upload = array_values($this->media_upload); //reindex
    }
    public function render()
    {
        return view('livewire.project-form');
    }
}
