<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\News;
use App\Models\Extracurricular;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test admin dashboard accessibility
     */
    public function test_admin_dashboard_is_accessible()
    {
        $response = $this->get('/admin/dashboard');
        
        $response->assertStatus(200);
        $response->assertSee('Dashboard Admin');
        $response->assertSee('Total Berita');
        $response->assertSee('Total Ekstrakurikuler');
    }

    /**
     * Test news index page
     */
    public function test_news_index_page_displays_correctly()
    {
        // Create some test news
        News::factory()->count(3)->create();
        
        $response = $this->get('/admin/news');
        
        $response->assertStatus(200);
        $response->assertSee('Kelola Berita');
        $response->assertSee('Tambah Berita');
    }

    /**
     * Test news creation form
     */
    public function test_news_create_form_displays_correctly()
    {
        $response = $this->get('/admin/news/create');
        
        $response->assertStatus(200);
        $response->assertSee('Tambah Berita');
        $response->assertSee('Judul Berita');
        $response->assertSee('Konten Berita');
        $response->assertSee('Gambar Berita');
        $response->assertSee('Penulis');
    }

    /**
     * Test news creation functionality
     */
    public function test_can_create_news()
    {
        Storage::fake('public');
        
        $newsData = [
            'title' => 'Test News Title',
            'content' => 'This is test news content.',
            'author' => 'Test Author',
            'is_published' => true,
        ];
        
        $response = $this->post('/admin/news', $newsData);
        
        $response->assertRedirect('/admin/news');
        $this->assertDatabaseHas('news', [
            'title' => 'Test News Title',
            'content' => 'This is test news content.',
            'author' => 'Test Author',
            'is_published' => true,
        ]);
    }

    /**
     * Test news creation with image upload
     */
    public function test_can_create_news_with_image()
    {
        Storage::fake('public');
        
        $image = UploadedFile::fake()->image('test-news.jpg', 800, 600);
        
        $newsData = [
            'title' => 'Test News with Image',
            'content' => 'This is test news content with image.',
            'author' => 'Test Author',
            'image' => $image,
            'is_published' => true,
        ];
        
        $response = $this->post('/admin/news', $newsData);
        
        $response->assertRedirect('/admin/news');
        
        $news = News::where('title', 'Test News with Image')->first();
        $this->assertNotNull($news);
        $this->assertNotNull($news->image);
        
        Storage::disk('public')->assertExists($news->image);
    }

    /**
     * Test news update functionality
     */
    public function test_can_update_news()
    {
        $news = News::factory()->create([
            'title' => 'Original Title',
            'content' => 'Original content',
        ]);
        
        $updateData = [
            'title' => 'Updated Title',
            'content' => 'Updated content',
            'author' => $news->author,
            'is_published' => $news->is_published,
        ];
        
        $response = $this->put("/admin/news/{$news->id}", $updateData);
        
        $response->assertRedirect('/admin/news');
        $this->assertDatabaseHas('news', [
            'id' => $news->id,
            'title' => 'Updated Title',
            'content' => 'Updated content',
        ]);
    }

    /**
     * Test news deletion functionality
     */
    public function test_can_delete_news()
    {
        $news = News::factory()->create();
        
        $response = $this->delete("/admin/news/{$news->id}");
        
        $response->assertRedirect('/admin/news');
        $this->assertDatabaseMissing('news', ['id' => $news->id]);
    }

    /**
     * Test extracurricular index page
     */
    public function test_extracurricular_index_page_displays_correctly()
    {
        Extracurricular::factory()->count(3)->create();
        
        $response = $this->get('/admin/extracurriculars');
        
        $response->assertStatus(200);
        $response->assertSee('Kelola Ekstrakurikuler');
        $response->assertSee('Tambah Ekstrakurikuler');
    }

    /**
     * Test extracurricular creation form
     */
    public function test_extracurricular_create_form_displays_correctly()
    {
        $response = $this->get('/admin/extracurriculars/create');
        
        $response->assertStatus(200);
        $response->assertSee('Tambah Ekstrakurikuler');
        $response->assertSee('Nama Ekstrakurikuler');
        $response->assertSee('Deskripsi');
        $response->assertSee('Jadwal');
        $response->assertSee('Pembina');
    }

    /**
     * Test extracurricular creation functionality
     */
    public function test_can_create_extracurricular()
    {
        $extracurricularData = [
            'name' => 'Test Extracurricular',
            'description' => 'This is a test extracurricular activity.',
            'schedule' => 'Every Friday 2-4 PM',
            'teacher_in_charge' => 'Mr. Test Teacher',
        ];
        
        $response = $this->post('/admin/extracurriculars', $extracurricularData);
        
        $response->assertRedirect('/admin/extracurriculars');
        $this->assertDatabaseHas('extracurriculars', [
            'name' => 'Test Extracurricular',
            'description' => 'This is a test extracurricular activity.',
            'schedule' => 'Every Friday 2-4 PM',
            'teacher_in_charge' => 'Mr. Test Teacher',
        ]);
    }

    /**
     * Test extracurricular creation with image
     */
    public function test_can_create_extracurricular_with_image()
    {
        Storage::fake('public');
        
        $image = UploadedFile::fake()->image('test-extracurricular.jpg', 800, 600);
        
        $extracurricularData = [
            'name' => 'Test Extracurricular with Image',
            'description' => 'This is a test extracurricular with image.',
            'schedule' => 'Every Friday 2-4 PM',
            'teacher_in_charge' => 'Mr. Test Teacher',
            'image' => $image,
        ];
        
        $response = $this->post('/admin/extracurriculars', $extracurricularData);
        
        $response->assertRedirect('/admin/extracurriculars');
        
        $extracurricular = Extracurricular::where('name', 'Test Extracurricular with Image')->first();
        $this->assertNotNull($extracurricular);
        $this->assertNotNull($extracurricular->image);
        
        Storage::disk('public')->assertExists($extracurricular->image);
    }

    /**
     * Test extracurricular update functionality
     */
    public function test_can_update_extracurricular()
    {
        $extracurricular = Extracurricular::factory()->create([
            'name' => 'Original Name',
            'description' => 'Original description',
        ]);
        
        $updateData = [
            'name' => 'Updated Name',
            'description' => 'Updated description',
            'schedule' => $extracurricular->schedule,
            'teacher_in_charge' => $extracurricular->teacher_in_charge,
        ];
        
        $response = $this->put("/admin/extracurriculars/{$extracurricular->id}", $updateData);
        
        $response->assertRedirect('/admin/extracurriculars');
        $this->assertDatabaseHas('extracurriculars', [
            'id' => $extracurricular->id,
            'name' => 'Updated Name',
            'description' => 'Updated description',
        ]);
    }

    /**
     * Test extracurricular deletion functionality
     */
    public function test_can_delete_extracurricular()
    {
        $extracurricular = Extracurricular::factory()->create();
        
        $response = $this->delete("/admin/extracurriculars/{$extracurricular->id}");
        
        $response->assertRedirect('/admin/extracurriculars');
        $this->assertDatabaseMissing('extracurriculars', ['id' => $extracurricular->id]);
    }

    /**
     * Test form validation for news
     */
    public function test_news_form_validation()
    {
        $response = $this->post('/admin/news', []);
        
        $response->assertSessionHasErrors(['title', 'content', 'author']);
    }

    /**
     * Test form validation for extracurricular
     */
    public function test_extracurricular_form_validation()
    {
        $response = $this->post('/admin/extracurriculars', []);
        
        $response->assertSessionHasErrors(['name', 'description']);
    }

    /**
     * Test image upload validation
     */
    public function test_image_upload_validation()
    {
        Storage::fake('public');
        
        // Test with invalid file type
        $invalidFile = UploadedFile::fake()->create('test.txt', 100);
        
        $newsData = [
            'title' => 'Test News',
            'content' => 'Test content',
            'author' => 'Test Author',
            'image' => $invalidFile,
        ];
        
        $response = $this->post('/admin/news', $newsData);
        
        $response->assertSessionHasErrors(['image']);
    }

    /**
     * Test dashboard statistics
     */
    public function test_dashboard_shows_correct_statistics()
    {
        // Create test data
        News::factory()->count(5)->create();
        Extracurricular::factory()->count(3)->create();
        
        $response = $this->get('/admin/dashboard');
        
        $response->assertStatus(200);
        $response->assertSee('5'); // Total news count
        $response->assertSee('3'); // Total extracurricular count
    }

    /**
     * Test slug generation for news
     */
    public function test_news_slug_generation()
    {
        $newsData = [
            'title' => 'Test News Title with Spaces',
            'content' => 'Test content',
            'author' => 'Test Author',
            'is_published' => true,
        ];
        
        $this->post('/admin/news', $newsData);
        
        $news = News::where('title', 'Test News Title with Spaces')->first();
        $this->assertEquals('test-news-title-with-spaces', $news->slug);
    }

    /**
     * Test slug generation for extracurricular
     */
    public function test_extracurricular_slug_generation()
    {
        $extracurricularData = [
            'name' => 'Test Extracurricular Name',
            'description' => 'Test description',
        ];
        
        $this->post('/admin/extracurriculars', $extracurricularData);
        
        $extracurricular = Extracurricular::where('name', 'Test Extracurricular Name')->first();
        $this->assertEquals('test-extracurricular-name', $extracurricular->slug);
    }
}

