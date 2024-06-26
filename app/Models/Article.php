<?php

// namespace App\Models;

// use A17\Twill\Models\Behaviors\HasBlocks;
// use A17\Twill\Models\Behaviors\HasTranslation;
// use A17\Twill\Models\Behaviors\HasSlug;
// use A17\Twill\Models\Behaviors\HasMedias;
// use A17\Twill\Models\Behaviors\HasRevisions;
// use A17\Twill\Models\Model;

// class Article extends Model 
// {
//     use HasBlocks, HasTranslation, HasSlug, HasMedias, HasRevisions;

//     protected $fillable = [
//         'published',
//         'title',
//         'description',
//     ];
    
//     public $translatedAttributes = [
//         'title',
//         'description',
//     ];
    
//     public $slugAttributes = [
//         'title',
//     ];
    
// }



 
// namespace App\Models;
 
// use A17\Twill\Models\Behaviors\HasSlug;
// use A17\Twill\Models\Behaviors\HasTranslation;
// use A17\Twill\Models\Model;
// use App\Repositories\ArticleRepository;
// use Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;
 
// class Article extends Model implements LocalizedUrlRoutable
// {
//     use HasTranslation;
//     use HasSlug;
 
//     protected $fillable = [
//         'published',
//         'title',
//         'description',
//     ];
 
//     public $translatedAttributes = [
//         'title',
//         'description',
//     ];
 
//     public $slugAttributes = [
//         'title',
//     ];
 
//     public function resolveRouteBinding($slug, $field = null)
//     {
//         $article = app(ArticleRepository::class)->forSlug($slug);
 
//         abort_if(! $article, 404);
 
//         return $article;
//     }
 
//     // #region routekey
//     public function getLocalizedRouteKey($locale)
//     {
//         return $this->getSlug($locale);
//     }
 
//     // #endregion routekey
// }




namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Model;
use App\Repositories\ArticleRepository;
use Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;

class Article extends Model implements LocalizedUrlRoutable
{
    use HasBlocks, HasTranslation, HasSlug, HasMedias, HasRevisions;

    protected $fillable = [
        'published',
        'title',
        'description',
        'text'
    ];

    public $translatedAttributes = [
        'title',
        'description',
    ];

    public $slugAttributes = [
        'title',
    ];

    public function resolveRouteBinding($slug, $field = null)
    {
        $article = app(ArticleRepository::class)->forSlug($slug);

        abort_if(! $article, 404);

        return $article;
    }

    public function getLocalizedRouteKey($locale)
    {
        return $this->getSlug($locale);
    }

   

    public function hasActiveTranslation($locale)
    {
        return $this->translations->contains(function ($translation) use ($locale) {
            return $translation->locale === $locale && $translation->active;
        });
    }
}
