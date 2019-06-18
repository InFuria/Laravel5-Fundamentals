<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    protected $fillable = [
        'title',
        'body',
        'published_at',
        'user_id'//temp
    ];

    protected $dates = ['published_at'];


    public function scopePublished($query){

        $query->where('published_at','<=', Carbon::now());
    }


    public function setPublishedAtAttribute($date){

        $this->attributes['published_at'] = Carbon::parse($date);
    }

    public function getPublishedAtAttribute($date){

        return Carbon::parse($date)->format('Y-m-d');
    }

    public function user(){

        return $this->belongsTo('App\User');
    }

    /**
     * Get the tags associated with the given article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(){
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * Get a list of tags ids associated with the current article.
     *
     * @return mixed
     */
    public function getTagListAttribute(){

        return $this->tags->lists('id');
    }
}