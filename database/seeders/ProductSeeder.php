<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Services\CategoryService;
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
            array("category"=>"Keto Food", "product_name"=>"Cauliflower Fried Rice", "product_ingredients"=>"cauliflower (riced), sesame oil, eggs, soy sauce (low-sodium), honey, garlic, ginger, red pepper flakes", "product_nutrition_info"=>"Fried rice is a classic and comforting recipe that everyone loves…except maybe those who are trying to eat less rice. Whether you’re skipping carbs, trying to eat more vegetables, or are just looking for a lighter side dish so you can eat more orange chicken (relatable!), this cauliflower fried rice is for you.", "created_at"=>"16/12/2024", "price"=>"2.99", "img_url"=>"uploads/product/cauliflower.png"),
            array("category"=>"Keto Food", "product_name"=>"Philly Cheesesteak Lettuce Wraps", "product_ingredients"=>"shaved beef (or thinly sliced steak), olive oil, onion, bell pepper ,provolone cheese, Salt,  pepper,  lettuce leaves", "product_nutrition_info"=>"You won't miss the hoagie in these low-carb Philly Cheesesteak lettuce wraps. Yes, they're made with provolone—NOT Cheez Whiz. And before you get all riled up, no, they're not in any way authentic. We'll be the first to admit it!", "created_at"=>"16/12/2024", "price"=>"12.99", "img_url"=>"uploads/product/philly-cheesesteak-lettuce-wraps.png"),
            array("category"=>"Keto Food", "product_name"=>"Keto Chicken Fajitas", "product_ingredients"=>"skinless chicken breasts, olive oil, chili powder, cumin, garlic powder, onion powder
        Salt, pepper, bell pepper,chopped mushrooms, Lettuce leaves, Avocado,
        Sour cream (optional, full-fat), Salsa", "product_nutrition_info"=>"Chicken is an excellent source of lean protein, essential for building and repairing tissues, supporting a healthy immune system, and maintaining satiety.   
        Olive oil, used in cooking, is a source of monounsaturated fats, which can help lower bad cholesterol levels and improve heart health.   
        The vegetables in this dish, such as onions, bell peppers, and mushrooms, provide essential vitamins and minerals, including vitamin C, potassium, and folate.
        This recipe is designed to be low in carbohydrates, making it suitable for individuals following the keto diet.", "created_at"=>"27/12/2024", "price"=>"18.99", "img_url"=>"uploads/product/Keto_Chicken_Fajitas.jpg"),
            array("category"=>"Vegan", "product_name"=>"Creamy Broccoli Vegan Pasta", "product_ingredients"=>"dried pasta (penne, rotini, or shells), 
        broccoli (chopped into florets), olive oil, garlic, plant-based milk (unsweetened), nutritional yeast, lemon juice, Salt, pepper ", "product_nutrition_info"=>"This luscious creamy vegan pasta will give any traditional mac and cheese a run for its money. Instead of containing dairy, the smooth, tangy sauce is a protein-packed blend of white beans, nutritional yeast, and lemon juice.", "created_at"=>"16/12/2024", "price"=>"12.99", "img_url"=>"uploads/product/Creamy_Broccoli_Vegan_Pasta.jpg"),
            array("category"=>"Vegan", "product_name"=>"Butternut Squash Stuffed Shells", "product_ingredients"=>"butternut squash  (peeled, seeded, and cubed), onion (chopped), garlic (minced) , olive oil, dried sage, salt
        , black pepper, vegan ricotta cheese, chopped fresh spinach, nutritional yeast, lemon juice", "product_nutrition_info"=>"This recipe is an all-time Love and Lemons fan favorite, and for good reason. Even the biggest cheese lovers will fall for its bright, creamy spinach “ricotta,” caramelized cubes of butternut squash, and rich cashew cream sauce.", "created_at"=>"16/12/2024", "price"=>"9.99", "img_url"=>"uploads/product/Butternut_Squash_Stuffed_Shells.jpg"),
            array("category"=>"Vegan", "product_name"=>"Vegan Lentil Soup", "product_ingredients"=>"dried green lentils, onion, chopped carrots, chopped celery stalks, chopped cloves garlic,olive oil
        vegetable broth, diced tomatoes, undrained
        dried thyme, dried oregano, Salt, pepper", "product_nutrition_info"=>"Lentils are an excellent source of plant-based protein, making this soup a satisfying and filling option, especially for vegetarians and vegans.   
        Lentils are packed with fiber, which aids digestion, promotes gut health, and helps regulate blood sugar levels.   
        Lentils are a good source of essential vitamins and minerals, including folate, iron, magnesium, and potassium.   
        This soup is naturally low in fat, making it a heart-healthy option.   
        Lentils contain antioxidants that help protect the body from damage caused by free radicals.", "created_at"=>"27/12/2024", "price"=>"6.99", "img_url"=>"uploads/product/vegan-lentil-soup.jpg"),
            array("category"=>"Atkins", "product_name"=>"Atkins Cauliflower Crust Pizza", "product_ingredients"=>"cauliflower (riced),  shredded mozzarella cheese, grated Parmesan cheese, eggs, Italian seasoning, garlic powder, Salt, pepper", "product_nutrition_info"=>"Cauliflower crust pizza is significantly lower in carbohydrates compared to traditional pizza with a wheat-based crust.
        Cauliflower adds fiber to the pizza, which can aid digestion and promote satiety.
        Depending on the toppings, cauliflower crust pizza can be a decent source of protein.", "created_at"=>"27/12/2024", "price"=>"11.99", "img_url"=>"uploads/product/Cauliflower-crust-pizza.jpg"),
            array("category"=>"Atkins", "product_name"=>"Eggplant Pizza", "product_ingredients"=>"eggplant (sliced), olive oil, Salt, pepper, sugar-free marinara sauce, shredded mozzarella cheese (part-skim or whole milk), Sliced mushrooms, Chopped onions, Sliced bell peppers, Diced tomatoes, Spinach", "product_nutrition_info"=>"Eggplant is a low-calorie vegetable, making it a great option for those watching their weight.   
        Eggplant is a good source of fiber, which aids digestion and promotes satiety.   
        Eggplant is packed with essential vitamins and minerals, including vitamin C, potassium, and manganese.   
        Eggplant pizza is naturally low in carbohydrates, making it suitable for those following low-carb diets.   ", "created_at"=>"27/12/2024", "price"=>"7.99", "img_url"=>"uploads/product/Eggplant-Pizza.jpg"),
            array("category"=>"Atkins", "product_name"=>"Garlic chicken with cauliflower mash", "product_ingredients"=>"chicken breasts
        garlic (minced), olive oil, dried oregano, dried thyme, Salt, pepper, cauliflower (cut into florets),
        milk, butter, Salt, pepper, grated Parmesan cheese", "product_nutrition_info"=>"Both chicken and cauliflower are low-carb foods, making this dish suitable for individuals following the Atkins diet or other low-carb eating plans.
        Chicken is an excellent source of lean protein, essential for building and repairing tissues, supporting a healthy immune system, and maintaining satiety.   
        Cauliflower is a good source of dietary fiber, which aids digestion, promotes gut health, and helps regulate blood sugar levels.", "created_at"=>"27/12/2024", "price"=>"18.99", "img_url"=>"uploads/product/Garlic-chicken-with-cauliflower-mash.jpeg"),
            array("category"=>"Smoothie", "product_name"=>"Tropical Oatmeal Smoothie", "product_ingredients"=>"rolled oats, unsweetened coconut milk, banana, mango chunks, pineapple chunks", "product_nutrition_info"=>"This tropical-inspired smoothie is packed with fiber (6 grams per serving), thanks to the fruit and the clever addition of rolled oats.", "created_at"=>"16/12/2024", "price"=>"5.99", "img_url"=>"uploads/product/Tropical_OatmealSmoothie.png"),
            array("category"=>"Smoothie", "product_name"=>"Cherry-Almond Smoothie", "product_ingredients"=>"frozen pitted cherries
        ,unsweetened almond milk ,plain Greek yogurt", "product_nutrition_info"=>"Blitz banana, cherries and yogurt with almond milk for a filling breakfast you'll make again and again.", "created_at"=>"16/12/2024", "price"=>"7.99", "img_url"=>"uploads/product/Cherry_Almond_Smoothie.png"),
            array("category"=>"Smoothie", "product_name"=>"Green Goodness", "product_ingredients"=>"spinach or kale, frozen berries (mixed berries, strawberries, or blueberries), banana (fresh or frozen), plain Greek yogurt, unsweetened almond milk, chia seeds, honey or maple syrup,
        Pinch of cinnamon", "product_nutrition_info"=>"This smoothie provides a good source of vitamins A, C, K, and folate, as well as minerals like potassium and magnesium.
        Spinach, kale, chia seeds, and fruits contribute to the fiber content of the smoothie, promoting digestive health and aiding in blood sugar control.
        Greek yogurt or plant-based yogurt alternatives add protein to the smoothie, which helps keep you feeling full and satisfied.", "created_at"=>"27/12/2024", "price"=>"9.99", "img_url"=>"uploads/product/Green_Goddess_Smoothie.jpeg"),
            array("category"=>"Healthy sweets", "product_name"=>"Baked Apples with Cinnamon and Nuts", "product_ingredients"=>"apples (such as Granny Smith or Honeycrisp, almond butter or peanut butter, maple syrup, cinnamon, Pinch of nutmeg, chopped walnuts or pecans", "product_nutrition_info"=>"Apples are an excellent source of dietary fiber, which aids digestion, promotes gut health, and helps regulate blood sugar levels.   
        Apples contain antioxidants, such as quercetin and flavonoids, which help protect the body from damage caused by free radicals.   
         Apples provide essential vitamins and minerals, including vitamin C, potassium, and vitamin K.", "created_at"=>"27/12/2024", "price"=>"24.99", "img_url"=>"uploads/product/baked-apples-with-oatmeal-filling.jpg"),
            array("category"=>"Healthy sweets", "product_name"=>"Healthy Chocolate Avocado Pudding ", "product_ingredients"=>"avocado, unsweetened cocoa powder, maple syrup or honey, 
         plant-based milk (almond, coconut, or oat), vanilla extract, Pinch of salt", "product_nutrition_info"=>"Avocados are an excellent source of healthy monounsaturated fats, which can help lower bad cholesterol levels and improve heart health.   
        Avocados are also a good source of fiber, which aids digestion, promotes gut health, and helps regulate blood sugar levels.   
        Both avocados and cocoa powder are rich in antioxidants, which help protect the body from damage caused by free radicals.   
        Avocados provide essential vitamins and minerals, such as vitamin C, potassium, and vitamin E.", "created_at"=>"27/12/2024", "price"=>"11.99", "img_url"=>"uploads/product/avo_choc_pudding_berries_chips.jpg"),
            array("category"=>"Healthy sweets", "product_name"=>"Healthy No-Bake Energy Bites ", "product_ingredients"=>"rolled oats, unsweetened shredded coconut, chia seeds, chopped nuts (almonds, walnuts, pecans), dried fruit (cranberries, raisins, apricots), honey or maple syrup, coconut oil, melted vanilla extract, Pinch of salt", "product_nutrition_info"=>"Oats, coconut, and dried fruit provide carbohydrates for sustained energy.
        Oats, nuts, and seeds contribute to the protein content, which is important for building and repairing tissues, and keeping you feeling full and satisfied.
        Oats, chia seeds, and nuts are excellent sources of dietary fiber, which aids digestion, promotes gut health, and helps regulate blood sugar levels.   
        Nuts, seeds, and coconut provide healthy unsaturated fats, which can help lower bad cholesterol levels and improve heart health.   
        Vitamins and Minerals: The ingredients in these energy bites offer a range of vitamins and minerals, including vitamin E, magnesium, and iron.", "created_at"=>"27/12/2024", "price"=>"5.99", "img_url"=>"uploads/product/No-Bake-Energy-Bites.jpg")
        );

        foreach ($arr as $value) {
            # code...
            Product::create([
                'recipe_name'=>$value['product_name'],
                'ingredients'=>$value['product_ingredients'],
                'nutritional_info'=>$value['product_nutrition_info'],
                'price'=>$value['price'],
                'image'=>$value['img_url'],
                'category_id'=> CategoryService::getID($value['category'])
            ]);
        }
    }
}
