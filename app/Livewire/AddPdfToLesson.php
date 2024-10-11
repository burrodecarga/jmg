<?php

namespace App\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Pdf;
use App\Models\Lesson;
use App\Models\Book;

class AddPdfToLesson extends Component
{
    use WithFileUploads;
    public $openPdfModal = false;
    public $lesson, $lessonId, $pdf;
    public $title, $author, $pages = 1;

    public function mount(Lesson $lesson)
    {
        $this->lesson = $lesson;
        $this->lessonId = $lesson->id;
    }

    protected $rules = [
        'pdf' => 'required|mimes:pdf,docx,doc,text',
    ];
    public function render()
    {
        return view('livewire.add-pdf-to-lesson');
    }

    public function addPdf()
    {
        $this->validate();
        if ($this->pdf) {
            $temp = $this->pdf->getClientOriginalName();
            $split = explode('.', $temp);
            $title = $split[0];
            $author = 'no registrado';

            if ($this->title) {
                $title = $this->title;
            }

            if ($this->author) {
                $author = $this->author;
            }
            // Generate a unique filename with microtime
            $extension = $this->pdf->getClientOriginalExtension();

            $filename = 'pdf' . microtime(true) . '.' . $extension;
            // Save the file to the storage directory
            $url = $this->pdf->storeAs('pdf', $filename, 'public');

            // Update the file_path attribute with the new filename
            $this->pdf = $filename;

            Pdf::create([
                'title' => mb_strtolower($title),
                'category' => 'general',
                'extension' => $extension,
                'author' => mb_strtolower($author),
                'pages' => $this->pages,
                'url' => $url,
                'lesson_id' => $this->lessonId,
            ]);

            $this->openPdfModal = False;
            $this->reset('pdf', 'title', 'author', 'pages');
            $this->resetValidation();
            $message = __('the action was completed successfully.');
            flash()->options([
                'timeout' => 1000,
            ])->success($message);

        }
    }
}
