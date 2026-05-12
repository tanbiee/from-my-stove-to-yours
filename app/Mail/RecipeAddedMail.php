<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class RecipeAddedMail extends Mailable
{
    public $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function build()
    {
        return $this
            ->subject('New Recipe Added')
            ->view('recipeadded');
    }
}