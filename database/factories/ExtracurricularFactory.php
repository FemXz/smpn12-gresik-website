<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Extracurricular>
 */
class ExtracurricularFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $extracurricularNames = [
            'Pramuka',
            'Basket',
            'Futsal',
            'Voli',
            'Badminton',
            'English Club',
            'Science Club',
            'Math Club',
            'Art Club',
            'Music Club',
            'Dance Club',
            'Drama Club',
            'Photography Club',
            'Computer Club',
            'Robotics Club'
        ];

        $schedules = [
            'Setiap Senin, 14:00-16:00',
            'Setiap Selasa, 15:00-17:00',
            'Setiap Rabu, 14:30-16:30',
            'Setiap Kamis, 15:30-17:30',
            'Setiap Jumat, 14:00-16:00',
            'Setiap Sabtu, 08:00-10:00',
            'Senin & Kamis, 15:00-16:30',
            'Selasa & Jumat, 14:00-15:30'
        ];

        $name = $this->faker->randomElement($extracurricularNames);
        
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->paragraphs(3, true),
            'image' => null,
            'schedule' => $this->faker->randomElement($schedules),
            'teacher_in_charge' => $this->faker->name() . ', S.Pd',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Indicate that the extracurricular has an image.
     */
    public function withImage(): static
    {
        return $this->state(fn (array $attributes) => [
            'image' => 'uploads/extracurriculars/' . $this->faker->uuid() . '.jpg',
        ]);
    }

    /**
     * Create a sports extracurricular.
     */
    public function sports(): static
    {
        $sportsNames = ['Basket', 'Futsal', 'Voli', 'Badminton', 'Tenis Meja'];
        $name = $this->faker->randomElement($sportsNames);
        
        return $this->state(fn (array $attributes) => [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => "Kegiatan olahraga {$name} yang bertujuan untuk mengembangkan kemampuan fisik dan mental siswa melalui latihan rutin dan kompetisi.",
        ]);
    }

    /**
     * Create an academic extracurricular.
     */
    public function academic(): static
    {
        $academicNames = ['English Club', 'Science Club', 'Math Club', 'Computer Club'];
        $name = $this->faker->randomElement($academicNames);
        
        return $this->state(fn (array $attributes) => [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => "Klub akademik {$name} yang fokus pada pengembangan kemampuan akademik siswa melalui diskusi, penelitian, dan kompetisi.",
        ]);
    }

    /**
     * Create an arts extracurricular.
     */
    public function arts(): static
    {
        $artsNames = ['Art Club', 'Music Club', 'Dance Club', 'Drama Club'];
        $name = $this->faker->randomElement($artsNames);
        
        return $this->state(fn (array $attributes) => [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => "Kegiatan seni {$name} yang bertujuan untuk mengembangkan kreativitas dan bakat seni siswa melalui latihan dan pertunjukan.",
        ]);
    }
}

