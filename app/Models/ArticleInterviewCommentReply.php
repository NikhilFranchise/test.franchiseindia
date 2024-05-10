<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleInterviewCommentReply extends Model
{
    use HasFactory;
    protected $table      = "article_interview_comment_reply";
    protected $primaryKey = 'reply_id';
}
