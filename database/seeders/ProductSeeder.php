<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $arr = array(
            array(
                "ingredients" => "2BKNF4F", 
                "recipe_name" => "oats", 
                "nutritional_info" => "Bowl of porridge oats for a healthy breakfast which is good for a healthy heart and can reduce Cholesterol", 
                "price" => 20), 
            array(
                "ingredients" => "D7BE27", 
                "recipe_name" => "Spaghetti", 
                "nutritional_info" => "Heart Healthy Spaghetti", 
                "price" => 19), 
            array(
                "ingredients" => "2B7M8MJ", 
                "recipe_name" => "strawberry", 
                "nutritional_info" => "Heart shape strawberry in man hands and a breakfast bowl full of fruits with vegan yogurt. Background for healthy eating, diets, meals, closeup.", 
                "price" => 25), 
            array(
                "ingredients" => "DH3K9Y", 
                "recipe_name" => "salad", 
                "nutritional_info" => "Heart-shaped carrots are mixed into a salad", 
                "price" => 17), 
            array(
                "ingredients" => "D75FAJ", 
                "recipe_name" => "Whole Clams", 
                "nutritional_info" => "Whole Clams with Pasta and Vegetables", 
                "price" => 23), 
            array(
                "ingredients" => "JTC78R", 
                "recipe_name" => "oatmeal and strawberries.", 
                "nutritional_info" => "Hot breakfast of healthy oatmeal and heart shaped strawberries. Selective focus with extreme shallow depth of field.", 
                "price" => 24), 
            array(
                "ingredients" => "2BKNF4F", 
                "recipe_name" => "Leafy green vegetables", 
                "nutritional_info" => "Leafy green vegetables are high in vitamin K and nitrates, which can help reduce blood pressure and improve arterial function. A higher intake of leafy greens is associated with a lower risk of heart disease.", 
                "price" => 16), 
            array(
                "ingredients" => "D7BE28", 
                "recipe_name" => "Whole grains", 
                "nutritional_info" => "Eating whole grains is associated with lower cholesterol and systolic blood pressure, as well as a lower risk of heart disease.", 
                "price" => 25), 
            array(
                "ingredients" => "2B7M8MJ", 
                "recipe_name" => "Berries", 
                "nutritional_info" => "Berries are rich in antioxidants. Eating them can reduce multiple risk factors for heart disease.", 
                "price" => 21), 
            array(
                "ingredients" => "DH3K9Y", 
                "recipe_name" => "Avocados", 
                "nutritional_info" => "Avocados are high in monounsaturated fats and potassium. They may help lower your cholesterol, blood pressure, and risk of metabolic syndrome", 
                "price" => 10), 
            array(
                "ingredients" => "D75FAJ", 
                "recipe_name" => "Fatty fish and fish oil", 
                "nutritional_info" => "Fatty fish and fish oil are both high in omega-3 fatty acids and may help reduce heart disease risk factors, including blood pressure, triglycerides, and cholesterol.", 
                "price" => 11), 
            array(
                "ingredients" => "JTC78R", 
                "recipe_name" => "Walnuts", 
                "nutritional_info" => "Walnuts can help reduce cholesterol and blood pressure and may be associated with a lower risk of heart disease.", 
                "price" => 21), 
            array(
                "ingredients" => "2BKNF4F", 
                "recipe_name" => "Beans", 
                "nutritional_info" => "Beans are high in resistant starch and have been shown to reduce levels of cholesterol, lower blood pressure, and improve glycemic control.", 
                "price" => 16), 
            array(
                "ingredients" => "D7BE29", 
                "recipe_name" => "Dark chocolate", 
                "nutritional_info" => "Dark chocolate is high in antioxidants like flavonoids. It has been associated with a lower risk of developing calcified plaque in the arteries and coronary heart disease.", 
                "price" => 16), 
            array(
                "ingredients" => "2BKNF4F", 
                "recipe_name" => "Tomatoes", 
                "nutritional_info" => "Tomatoes are rich in lycopene and have been associated with a lower risk of heart disease and stroke, as well as an increase in HDL (good) cholesterol.", 
                "price" => 22), 
            array(
                "ingredients" => "D7BE28", 
                "recipe_name" => "Almonds", 
                "nutritional_info" => "Almonds are high in fiber and monounsaturated fats, and have been linked to reductions in cholesterol and belly fat.", 
                "price" => 15), 
            array(
                "ingredients" => "2B7M8MJ", 
                "recipe_name" => "Chia seeds, flaxseeds, and hemp seeds", 
                "nutritional_info" => "Human and animal studies have found that eating seeds may improve several heart disease risk factors, including inflammation, blood pressure, cholesterol, and triglycerides.", 
                "price" => 17), 
            array(
                "ingredients" => "DH3K9Y", 
                "recipe_name" => "Garlic", 
                "nutritional_info" => "Garlic and its components have been shown to help reduce blood pressure and cholesterol. They may also help inhibit blood clot formation.", 
                "price" => 13), 
            array(
                "ingredients" => "D75FAJ", 
                "recipe_name" => "Olive oil", 
                "nutritional_info" => "Olive oil is high in antioxidants and monounsaturated fats. It has been associated with lower blood pressure and heart disease risk.", 
                "price" => 11), 
            array(
                "ingredients" => "JTC78R", 
                "recipe_name" => "Edamame", 
                "nutritional_info" => "Edamame contains soy isoflavones, which can help decrease cholesterol levels. Edamame also contains fiber and antioxidants, which also benefit heart health.", 
                "price" => 14), 
            array(
                "ingredients" => "2BKNF4F", 
                "recipe_name" => "Green tea", 
                "nutritional_info" => "Green tea is high in polyphenols and catechins. It has been associated with lower cholesterol, triglycerides, and blood pressure.", 
                "price" => 18),
        );

        foreach ($arr as $value) {
            # code...
            Product::create([
                'recipe_name'=>$value['recipe_name'],
                'ingredients'=>$value['ingredients'],
                'nutritional_info'=>$value['nutritional_info'],
                'price'=>$value['price'],
                'category_id'=>random_int(1,11)
            ]);
        }
    }
}
