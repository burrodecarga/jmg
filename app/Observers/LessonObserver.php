<?php

namespace App\Observers;

use App\Models\Lesson;

class LessonObserver
{
    /**
     * Handle the Lesson "created" event.
     */
    public function created(Lesson $lesson): void
    {
        //
    }

    /**
     * Handle the Lesson "updated" event.
     */
    public function updated(Lesson $lesson): void
    {
        //
    }

    /**
     * Handle the Lesson "deleted" event.
     */
    public function deleted(Lesson $lesson): void
    {
        $images = $lesson->images;
        $pdfs = $lesson->pdfs;
        foreach ($images as $image) {
            if (file_exists(public_path($image->url))) {
                unlink(public_path($image->url));                //         //dd('borrado');
                $image->destroy();
            }
        }


        foreach ($pdfs as $pdf) {
            if (file_exists(public_path($pdf->url))) {
                unlink(public_path($pdf->url));                //         //dd('borrado');
            }
        }
    }

    public function deleting(Lesson $lesson): void
    {
        $images = $lesson->images;
        $pdfs = $lesson->pdfs;
        foreach ($images as $image) {
            if (file_exists(public_path('storage\/' . $image->url))) {
                unlink(public_path('storage\/' . $image->url));
            }
        }
        foreach ($pdfs as $pdf) {
            if (file_exists(public_path('storage\/' . $pdf->url))) {
                unlink(public_path('storage\/' . $pdf->url));
            }
        }
    }


    /**
     * Handle the Lesson "restored" event.
     */
    public function restored(Lesson $lesson): void
    {
        //
    }

    /**
     * Handle the Lesson "force deleted" event.
     */
    public function forceDeleted(Lesson $lesson): void
    {
        //
    }
}
