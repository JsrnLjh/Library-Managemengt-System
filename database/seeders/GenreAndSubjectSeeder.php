<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreAndSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Add common genres
        $genres = [
            ['name' => 'Fiction', 'description' => 'Fictional books'],
            ['name' => 'Non-Fiction', 'description' => 'Non-Fictional books'],
            ['name' => 'Science Fiction', 'description' => 'Science Fiction books'],
            ['name' => 'Fantasy', 'description' => 'Fantasy books'],
            ['name' => 'Mystery', 'description' => 'Mystery books'],
            ['name' => 'Biography', 'description' => 'Biography books'],
            ['name' => 'History', 'description' => 'History books'],
            ['name' => 'Romance', 'description' => 'Romance books'],
            ['name' => 'Thriller', 'description' => 'Thriller books'],
            ['name' => 'Self-Help', 'description' => 'Self-Help books'],
            ['name' => 'Health', 'description' => 'Health books'],
            ['name' => 'Travel', 'description' => 'Travel books'],
            ['name' => 'Cookbooks', 'description' => 'Cookbooks'],
            ['name' => 'Children\'s', 'description' => 'Children\'s books'],
            ['name' => 'Young Adult', 'description' => 'Young Adult books'],
            ['name' => 'Graphic Novels', 'description' => 'Graphic Novels'],
            ['name' => 'Comics', 'description' => 'Comics'],
            ['name' => 'Poetry', 'description' => 'Poetry books'],
            ['name' => 'Drama', 'description' => 'Drama books'],
            ['name' => 'Classic', 'description' => 'Classic books'],
            ['name' => 'Horror', 'description' => 'Horror books'],
            ['name' => 'Western', 'description' => 'Western books'],
            ['name' => 'Dystopian', 'description' => 'Dystopian books'],
            ['name' => 'Adventure', 'description' => 'Adventure books'],
            ['name' => 'Anthology', 'description' => 'Anthology books'],
            ['name' => 'Memoir', 'description' => 'Memoir books'],
            ['name' => 'True Crime', 'description' => 'True Crime books'],
            ['name' => 'Science', 'description' => 'Science books'],
            ['name' => 'Philosophy', 'description' => 'Philosophy books'],
            ['name' => 'Religion', 'description' => 'Religion books'],
            ['name' => 'Spirituality', 'description' => 'Spirituality books'],
            ['name' => 'Business', 'description' => 'Business books'],
            ['name' => 'Finance', 'description' => 'Finance books'],
            ['name' => 'Technology', 'description' => 'Technology books'],
            ['name' => 'Parenting', 'description' => 'Parenting books'],
            ['name' => 'Education', 'description' => 'Education books'],
            ['name' => 'Art', 'description' => 'Art books'],
            ['name' => 'Photography', 'description' => 'Photography books'],
            ['name' => 'Music', 'description' => 'Music books'],
            ['name' => 'Sports', 'description' => 'Sports books'],
            ['name' => 'Gardening', 'description' => 'Gardening books'],
            ['name' => 'Home Improvement', 'description' => 'Home Improvement books'],
            ['name' => 'Crafts', 'description' => 'Crafts books'],
            ['name' => 'Pets', 'description' => 'Pets books'],
            ['name' => 'Cooking', 'description' => 'Cooking books'],
            ['name' => 'Food', 'description' => 'Food books'],
            ['name' => 'Wine', 'description' => 'Wine books'],
            ['name' => 'Beer', 'description' => 'Beer books'],
            ['name' => 'Spirits', 'description' => 'Spirits books'],
        ];
        foreach ($genres as $genre){
            \App\Models\genre::create(['name' => $genre['name'], 'description' => $genre['description']]);
        }

        //add common subjects
        $subjects = [
            ['name' => 'Mathematics', 'description' => 'Mathematics books'],
            ['name' => 'Physics', 'description' => 'Physics books'],
            ['name' => 'Chemistry', 'description' => 'Chemistry books'],
            ['name' => 'Biology', 'description' => 'Biology books'],
            ['name' => 'Computer Science', 'description' => 'Computer Science books'],
            ['name' => 'Engineering', 'description' => 'Engineering books'],
            ['name' => 'Medicine', 'description' => 'Medicine books'],
            ['name' => 'Psychology', 'description' => 'Psychology books'],
            ['name' => 'Sociology', 'description' => 'Sociology books'],
            ['name' => 'Economics', 'description' => 'Economics books'],
        ];
        foreach ($subjects as $subject){
            \App\Models\subjects::create(['name' => $subject['name'], 'description' => $subject['description']]);
        }
        
    }
}
