<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    public const CATEGORIES = [
        'loans' => 'Loans',
        'real-estate' => 'Real Estate',
        'finance-tips' => 'Finance Tips',
        'company-news' => 'Company News',
    ];

    protected $fillable = [
        'title', 'slug', 'excerpt', 'body', 'cover_image', 'author_name', 'category',
        'tags', 'meta_description', 'status', 'published_at',
    ];

    protected function casts(): array
    {
        return ['published_at' => 'datetime'];
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published')
            ->where('published_at', '<=', now());
    }

    public function getCategoryLabelAttribute(): string
    {
        return self::CATEGORIES[$this->category] ?? Str::headline($this->category);
    }

    public function getReadingTimeAttribute(): int
    {
        return max(1, (int) ceil(str_word_count(strip_tags($this->body)) / 200));
    }

    public function getTagListAttribute(): array
    {
        return array_values(array_filter(array_map('trim', explode(',', (string) $this->tags))));
    }

    public function getCoverUrlAttribute(): ?string
    {
        return $this->cover_image ? asset('storage/'.$this->cover_image) : null;
    }

    public function getDisplayCoverAttribute(): string
    {
        $fallback = [
            'loans' => 'coins',
            'real-estate' => 'houses',
            'finance-tips' => 'money-handover',
            'company-news' => 'city',
        ][$this->category] ?? 'city';

        return $this->cover_url ?? asset("images/photos/{$fallback}.jpg");
    }

    public function getSummaryAttribute(): string
    {
        return $this->excerpt ?: Str::limit(strip_tags($this->body), 160);
    }

    public static function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title) ?: 'post';
        $slug = $base;
        $i = 2;
        while (static::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $base.'-'.$i++;
        }

        return $slug;
    }
}
