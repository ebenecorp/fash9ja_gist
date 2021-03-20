<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $category1 = Category::create([
            'name'=> 'Celebrity Events'
        ]);
        $category2 = Category::create([
            'name'=> 'Children Fashion'
        ]);
        $category3 = Category::create([
            'name'=> 'Men Fashion'
        ]);
        $category4 = Category::create([
            'name'=> 'Women Fashion'
        ]);

        $author1 = User::create([
                'name'=> 'John Doe',
                'email'=> 'johndoe@gmail.com',
                'password'=>Hash::make('password')
            ]);

        $author2 = User::create([
                'name'=> 'Jane Doe',
                'email'=> 'janedoe@gmail.com',
                'password'=>Hash::make('password')
            ]);

        $author3 = User::create([
                'name'=> 'Angela Ola',
                'email'=> 'angelaola@gmail.com',
                'password'=>Hash::make('password')
            ]);
        $author4 = User::create([
                'name'=> 'Funmi Musa',
                'email'=> 'funmimusa@gmail.com',
                'password'=>Hash::make('password')
            ]);

            $tag1 = Tag::create([ 
                'name'=> 'Life Sytle'
            ]);
            $tag2 = Tag::create([ 
                'name'=> 'Event Tribes'
            ]);
            $tag3 = Tag::create([ 
                'name'=> 'Fashion'
            ]);
            $tag4 = Tag::create([ 
                'name'=> 'Entertainment'
            ]);

            $post1 = $author1->posts()->create([
                'title'=>'Stunning: This bride cleverly chose a jumpsuit wedding gown that did magic on her big day',
                'description'=> 'Stunning: This bride cleverly chose a jumpsuit wedding gown that did magic on her big day',
                'content'=>'As much as it’s somewhat hard to keep up with the wedding dress trend, it’s always good to see brides in something very innovative. And over the weekend, East African bride, Esther aid ‘I do’ to her husband in a romantic all-white themed wedding, we were pleasantly in admiration seeing the images.
                            The bride clearly knew what she wanted when she was dreaming up her wedding dress. With the help of her designer, Esther pulled out all the stops to conceive a unique confection. We love the colour combination and design and extra details that made her stand out from all the brides we have seen so far this year.',
                
                'image'=>'post/image1.jpg',
                'category_id'=>$category4->id

             ]);

            $post2 = $author2->posts()->create([
                'title'=>'Jean Mensa\'s elegance in court is what your favourite slay queen aspires to be',
                'description'=> 'Jean Mensa\'s elegance in court is what your favourite slay queen aspires to be',
                'content'=>'Amidst all the controversial legal processes, the chair of Ghana’s Electoral Commission has never shown up in court with anything short of a true and magnificent fashionista.
                    From simple coloured suits, a perfectly made hair, scarfs to the overly flamboyant of dresses, Jean Mensa has been found guilty of shaking the grounds on which the bold and famous for Ghana’s fashion moguls walk - and with the national attention that comes with the stage where she puts her elegant display.',
                
                'image'=>'post/image2.jpg',
                'category_id'=>$category1->id

             ]);

            $post3 = $author3->posts()->create([
                'title'=>'#BeLikeNgoziChallenge: Nigerians recreate Okonjo-Iweala\'s outfits on social media',
                'description'=> '#BeLikeNgoziChallenge: Nigerians recreate Okonjo-Iweala\'s outfits on social media',
                'content'=> 'Nigerians are taking the celebration up a notch, and with an Internet fashion challenge created in honour of the Nigerian economist.
                                The idea of the #BeLikeNgoziChallenge is simple. Just replicate the veteran’s trademark outfit - an African print blouse, and a headgear styled in her trademark fashion. You get cool points if you add eye glasses.',
                
                'image'=>'post/image3.jpg',
                'category_id'=>$category3->id

             ]);

            $post4 = $author4->posts()->create([
                'title'=>'Anita Akuffo shows us how to slay casual chic looks to work',
                'description'=> 'Anita Akuffo shows us how to slay casual chic looks to work',
                'content'=>'Some fashion influencers, designers and stylists have been able to rock casual-chic style trend fashionably while some are still trying to find their foot.
                    Media personality, Anita Akuffo has mastered the art of rocking casual-chic style in different ways.',
                
                'image'=>'post/image4.jpg',
                'category_id'=>$category2->id

             ]);

             $post1->tags()->attach([$tag1->id, $tag2->id, ]);
             $post2->tags()->attach([$tag2->id, $tag3->id, ]);
             $post3->tags()->attach([$tag4->id, $tag2->id, ]);
             $post4->tags()->attach([$tag1->id, $tag4->id, ]);





    }
}
