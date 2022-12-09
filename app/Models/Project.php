<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class Project extends Model
{
    use HasFactory;
    use CanFormatDates;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function scopeNotDeleted(Builder $builder)
    {
        return $builder->where('is_deleted', 0);
    }
    // public function keywords()
    // {
    //     return $this->belongsToMany(Keyword::class, 'project_keyword');
    // }
    public function getCategoryNameAttribute()
    {
        return optional($this->category)->name;
    }
    public function Image(){
        return $this->hasOne(ProjectImage::class);
    }

    public function scopeSearch(Builder $builder, $query = '')
    {
        if ($query) {
            return $builder->where(function (Builder $builder) use ($query) {
                return $builder->where('heading', 'like', "%{$query}%")
                    ->orWhere('content', 'content', "%{$query}%");
            });
        }
        return $builder;
    }

    public static function getPaginated(?Request $request = null): LengthAwarePaginator
    {
        $perPage = config('blog.item_per_page');

        $categoryAlias = optional($request)->route('categoryAlias');     

        if (!is_null($categoryAlias)) {
            $category = Category::where('alias', $categoryAlias)->first();
            if (is_null($category)) {
                return new LengthAwarePaginator(collect([]), 0, $perPage);
            }
            $articleQuery = Project::where('category_id', $category->id);
        } else {
            $articleQuery = Project::published()->notDeleted();
        }

        $paginateUrl = '';
        if (optional($request)->has('lang')) {
            $articleQuery = $articleQuery->where('language', $request->lang);
            $paginateUrl = '?lang=' . $request->lang;
        }

        return $articleQuery->with('category','user')
            ->latest()
            ->paginate($perPage)
            ->withPath($paginateUrl);
    }

}
