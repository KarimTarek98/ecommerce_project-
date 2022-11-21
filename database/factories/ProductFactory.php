<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Partner;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    public function definition()
    {
        $partnerId = Partner::all()->random(1, 7)->pluck('id')->first();
        $categoryId = Category::all()->random(5, 8)->pluck('id')->first();
        $subcatId = SubCategory::all()->random(9, 22)->pluck('id')->first();
        $subSubCatId = SubSubCategory::all()->random(4, 27)->pluck('id')->first();

        return [
            'partner_id' => $partnerId,
            'category_id' => $categoryId,
            'subcategory_id' => $subcatId,
            'subsubcategory_id' => $subSubCatId,
            'product_name_en' => $this->faker->text(),
            'product_name_ar' => $this->faker->text(),
            'product_slug_en' => $this->faker->text(),
            'product_slug_ar' => $this->faker->text(),
            'product_code' => $this->faker->isbn13(),
            'product_qty' => $this->faker->randomNumber(3),
            'product_tags_en' => $this->faker->text(10),
            'product_tags_ar' => $this->faker->text(10),
            'product_size_en' => $this->faker->text(6),
            'product_color_en' => $this->faker->text(6),
            'product_color_ar' => $this->faker->text(6),
            'selling_price' => $this->faker->numberBetween(1000, 9000),
            'product_overview_en' => $this->faker->paragraph(1),
            'product_overview_ar' => $this->faker->paragraph(1),
            'product_description_en' => $this->faker->paragraph(5),
            'product_description_ar' => $this->faker->paragraph(5),
            'hot_deals' => $this->faker->boolean(),
            'featured' => $this->faker->boolean(),
            'special_offer' => $this->faker->boolean(),
            'special_deals' => $this->faker->boolean(),
            'status' => 1,

        ];
    }
}
