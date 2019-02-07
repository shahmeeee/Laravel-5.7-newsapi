<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $sourceAutoID
 * @property string $sourceID
 * @property string $name
 * @property string $description
 * @property string $url
 * @property string $category
 * @property string $language
 * @property string $country
 */
class Source extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'news_source';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'sourceAutoID';

    /**
     * @var array
     */
    protected $fillable = ['sourceID', 'name', 'description', 'url', 'category', 'language', 'country'];

}
