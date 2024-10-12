<?php

namespace App\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Section;
use App\Models\Lesson;
use App\Models\Course;
use App\Models\Book;


class CourseSetions extends Component
{

    use WithFileUploads;
    public $open = false;
    public $openConfirm = false;
    public $openLesson = false;
    public $openEditLesson = false;
    public $lesson, $description, $image, $pdf, $video;

    public $course;
    public $section;
    public $sectionId;
    public $sections = [];


    public function mount(Course $course)
    {
        $this->course = $course;
        $this->sections = $course->sections;
    }

    protected $rules = [
        'section' => 'required',
    ];

    public function render()
    {
        return view('livewire.course-setions');
    }


    public function addSection()
    {
        $this->validate();
        $courseId = $this->course->id;
        //dd($courseId);
        $section = new Section();
        $section->course_id = $courseId;
        $section->name = strtolower($this->section);
        $section->save();
        $this->reset('section');
        // $message = __('The course info updated');
        // return redirect()->route('config_course', $courseId)->with('success', $message);

        $message = __('the action was completed successfully.');
        $this->sections = $this->course->sections;
        flash()->options([
            'timeout' => 1000,
        ])->success($message);
    }

    public function edit(Section $section)
    {
        $this->section = $section->name;
        $this->sectionId = $section->id;
        $this->open = true;
    }

    public function editLesson(Lesson $lesson)
    {
        $this->lesson = $lesson->name;
        $this->description = $lesson->description;
        $this->lessonId = $lesson->id;
        $this->openEditLesson = true;
    }

    public function update()
    {
        $this->validate();
        $sectionUpdate = Section::find($this->sectionId);
        $sectionUpdate->name = $this->section;
        $sectionUpdate->save();
        $this->open = false;
        $message = __('the action was completed successfully.');
        $this->sections = $this->course->sections;
        flash()->options([
            'timeout' => 1000,
        ])->success($message);
    }

    public function confirm(Section $section)
    {
        $this->section = $section->name;
        $this->sectionId = $section->id;
        $this->openConfirm = true;
    }

    public function delete()
    {

        $section = Section::find($this->sectionId);

        $lessons = $section->lessons;

        foreach ($lessons as $lesson) {
            foreach ($lesson->images as $image) {
                if (file_exists(public_path('storage\/' . $image->url))) {
                    unlink(public_path('storage\/' . $image->url));
                    $image->delete();
                    //dd('EXISTE');            //         //dd('borrado');
                } else {
                    //dd('NO EXISTE', public_path('storage\/' . $image->url));
                }
            }
        }

        foreach ($lessons as $lesson) {
            foreach ($lesson->pdfs as $pdf) {
                if (file_exists(public_path('storage\/' . $pdf->url))) {
                    unlink(public_path('storage\/' . $pdf->url));
                    //dd('EXISTE');            //         //dd('borrado');
                } else {
                    //dd('NO EXISTE', public_path('storage\/' . $pdf->url));
                }
            }
        }
        //dd('Fin');
        Section::destroy($this->sectionId);


        $this->openConfirm = false;
        $this->sections = $this->course->sections;
        $this->reset('section');
        $message = __('the action was completed successfully.');
        flash()->options([
            'timeout' => 1000,
        ])->success($message);
    }

    public function addLesson(Section $section)
    {
        $this->section = $section->name;
        $this->sectionId = $section->id;
        $this->openLesson = true;
    }

    public function saveLesson()
    {
        $this->resetValidation();
        $data = $this->validate([
            'lesson' => 'required',
            'description' => 'required',
        ]);

        Lesson::create([
            'name' => $this->lesson,
            'description' => $this->description,
            'section_id' => $this->sectionId
        ]);
        $this->openLesson = false;
        // if($this->pdf){
        //     $this->resetValidation();
        //     $this->addPdf();};
        $this->reset('lesson', 'description');
        $this->resetValidation();
        $message = __('the action was completed successfully.');
        flash()->options([
            'timeout' => 1000,
        ])->success($message);
    }

    public function addImage()
    {
        $this->validate([
            'image' => 'required|mimes:png,jpg,jpeg,gif|max:2048'
        ]);
    }

    public function addPdf()
    {

        if ($this->pdf) {
            $temp = $this->pdf->getClientOriginalName();
            $split = explode('.', $temp);
            $title = $split[0];
            // Generate a unique filename with microtime
            $extension = $this->pdf->getClientOriginalExtension();

            $filename = 'pdf' . microtime(true) . '.' . $extension;
            // Save the file to the storage directory
            $url = $this->pdf->storeAs('pdf', $filename, 'public');

            // Update the file_path attribute with the new filename
            $this->pdf = $filename;

            Book::create([
                'title' => $title,
                'category' => 'general',
                'extension' => $extension,
                'url' => $url,
                'section_id' => $this->sectionId,
            ]);


        }
    }

    public function deleteLesson(Lesson $lesson)
    {
        Lesson::destroy($lesson->id);
        $this->openEditLesson = false;
        $message = __('the action was completed successfully.');
        flash()->options([
            'timeout' => 1000,
        ])->success($message);
    }

}
