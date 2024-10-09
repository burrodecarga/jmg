<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Video;
use App\Models\Platform;
use App\Models\Lesson;

class AddVideoToLesson extends Component
{

    public $openVideoModal=false;
    public $lesson,$lessonId;
    public $platforms,$platform_id=1;
    public $name,$url='https://youtu.be/5HtRcMSO1Ro?si=KMirIe1QoZb4iN25',$iframe,$platform;

    public function mount(Lesson $lesson){
      $this->lesson = $lesson;
      $this->lessonId = $lesson->id;
      $this->name = $lesson->name;
      $this->platforms = Platform::all();
      $this->resetValidation();
    }




    public function render()
    {
        return view('livewire.add-video-to-lesson');
    }

    public function addVideo(){
        $str = getStringBetween($this->iframe);
        $this->url =$str;

        $rules =[
            'name' =>'required',
            'platform_id'=>'required',
            // 'urls' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x'],
              'url' => ['regex:/^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/i']
        ];

        if($this->platform_id == 2){
            $rules['url'] = ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];
        }
        $this->validate($rules);
        $data = [
            'name' =>$this->name,
            'iframe' =>$this->iframe,
            'platform_id' =>$this->platform_id,
            'url' =>$this->url,
            'lesson_id' =>$this->lesson->id,
        ];
        $video = $this->lesson->video()->first();
      if(is_null($video)){
          Video::create($data);
      }else{
        $video->name=$this->name;
        $video->platform_id=$this->platform_id;
        $video->url=$this->url;
        $video->iframe=$this->iframe;
        $video->save();
      }
      ;
        //Video::create();

       $this->reset(['name','platform_id','url','iframe']);
       $this->lesson = Lesson::find($this->lesson->id);
       $this->resetValidation();
       $this->openVideoModal=false;
    }

}
