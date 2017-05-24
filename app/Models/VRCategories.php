<?php

namespace App\Models;

class VRCategories extends CoreModel
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'vr_categories';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id'];

    public function  categoryTranslations( )
    {
        return $this->hasMany(VRCategoriesTranslations:: class,'category_id','id')->with('languageData');
    }


}
