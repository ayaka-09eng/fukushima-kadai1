<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'detail',
    ];

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function scopeKeywordSearch($query, $keyword) {
        if (!empty($keyword)) {
            if (filter_var($keyword, FILTER_VALIDATE_EMAIL)) {
                return $query->where('email', 'like', "%{$keyword}%");
            }

            if (preg_match('/\s/u', $keyword)) {
                [$last, $first] = preg_split('/\s/u', $keyword);
                return $query->where('last_name', $last)->where('first_name', $first);
            }

            return $query->where(function ($q) use ($keyword) {
                $q->where('first_name', 'like', "%{$keyword}%")
                    ->orWhere('last_name', 'like', "%{$keyword}%");
            });
        }
        return $query;
    }

    public function scopeGendersSearch($query, $gender) {
        if (!empty($gender) && $gender !== 'all') {
            return $query->where('gender', $gender);
        }
        return $query;
    }

    public function scopeCategorySearch($query, $category) {
        if (!empty($category)) {
            return $query->where('category_id', $category);
        }
        return $query;
    }

    public function scopeDateSearch($query, $date) {
        if (!empty($date)) {
            return $query->whereDate('created_at', '=', $date);
        }
        return $query;
    }

}