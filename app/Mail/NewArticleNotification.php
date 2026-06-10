<?php

namespace App\Mail;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewArticleNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $article;

    /**
     * Create a new message instance.
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('New Article Published: ' . $this->article->title)
                    ->text('emails.new_article_plain');
    }
}
