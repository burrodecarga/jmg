<?php

namespace App\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Lesson;
use App\Models\Image;

class AddImageToLesson extends Component
{

    use WithFileUploads;
    public $openImageModal=false;
    public $lesson,$lessonId,$image;
    public $name,$description;

    public function mount(Lesson $lesson){
      $this->lesson = $lesson;
      $this->lessonId = $lesson->id;
    }

    protected $rules = [
        'image' => 'required|image|max:1024',
    ];

    public function render()
    {
        return view('livewire.add-image-to-lesson');
    }

    public function addImage(){
        $this->validate();
        if ($this->image) {
           $temp = $this->image->getClientOriginalName();
           $split = explode('.',$temp);
           $title = $split[0];
           $name = 'no registrado';
           $description='no registrado';
            // Generate a unique filename with microtime
            $extension = $this->image->getClientOriginalExtension();

            $filename = 'image' . microtime(true) . '.' . $extension;
            // Save the file to the storage directory
            $url = $this->image->storeAs('image', $filename, 'public');

            // Update the file_path attribute with the new filename
            $this->image = $filename;

            if($this->name){
$name = $this->name;
            }
            if($this->description){
                $description = $this->description;
                            }

            Image::create([
                'name'=>$name,
                'description'=>$description,
                // 'extension'=>$extension,
                'url'=>$url,
                'imageable_id'=>$this->lessonId,
                'imageable_type'=>'App\Models\Lesson',
            ]);

     $this->openimageModal=False;
     $this->reset('image','name','description');
        $this->resetValidation();
        $message = __('the action was completed successfully.');
        flash()->options([
            'timeout' => 1000,
        ])->success($message);

    }}
}
