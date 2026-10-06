<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SiteTest extends TestCase
{
    use RefreshDatabase;

    private function makePost(array $attrs = []): Post
    {
        return Post::create(array_merge([
            'title' => 'Hello', 'slug' => 'hello', 'body' => '<p>Body</p>', 'author_name' => 'A',
            'category' => 'loans', 'status' => 'published', 'published_at' => now()->subDay(),
        ], $attrs));
    }

    public function test_public_pages_load(): void
    {
        foreach (['/', '/about', '/loans', '/real-estate', '/blog', '/contact', '/careers', '/privacy-policy', '/terms-and-conditions', '/sitemap', '/sitemap.xml'] as $url) {
            $this->get($url)->assertOk();
        }
    }

    public function test_drafts_and_scheduled_posts_are_hidden(): void
    {
        $this->makePost(['title' => 'Live', 'slug' => 'live']);
        $this->makePost(['title' => 'Secret draft', 'slug' => 'draft', 'status' => 'draft']);
        $this->makePost(['title' => 'Future', 'slug' => 'future', 'published_at' => now()->addWeek()]);

        $this->get('/blog')->assertSee('Live')->assertDontSee('Secret draft')->assertDontSee('Future');
        $this->get('/blog/live')->assertOk();
        $this->get('/blog/draft')->assertNotFound();
        $this->get('/blog/future')->assertNotFound();
    }

    public function test_admin_requires_login(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
        $this->get('/admin/posts')->assertRedirect('/admin/login');
        $this->post('/admin/posts', [])->assertRedirect('/admin/login');
    }

    public function test_admin_can_create_post_with_image_and_body_is_sanitized(): void
    {
        Storage::fake('public');
        $this->actingAs(User::factory()->create());

        $this->post('/admin/posts', [
            'title' => 'My First Post', 'author_name' => 'Jane', 'category' => 'loans',
            'body' => '<p>Hi</p><script>alert(1)</script>', 'status' => 'published',
            'cover_image' => UploadedFile::fake()->createWithContent('c.png', base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8z8BQDwAEhQGAhKmMIQAAAABJRU5ErkJggg==')),
        ])->assertRedirect('/admin/posts');

        $post = Post::firstWhere('slug', 'my-first-post');
        $this->assertNotNull($post->published_at);
        $this->assertStringNotContainsString('script', $post->body);
        Storage::disk('public')->assertExists($post->cover_image);
        $this->get('/blog/my-first-post')->assertOk()->assertSee('Jane');
    }

    public function test_admin_rejects_non_image_cover(): void
    {
        $this->actingAs(User::factory()->create());
        $this->post('/admin/posts', [
            'title' => 'X', 'author_name' => 'J', 'category' => 'loans', 'body' => 'b', 'status' => 'draft',
            'cover_image' => UploadedFile::fake()->create('a.php', 10, 'text/php'),
        ])->assertSessionHasErrors('cover_image');
    }

    public function test_contact_form_stores_message(): void
    {
        $this->post('/contact', ['name' => 'Bob', 'email' => 'b@x.com', 'message' => 'Hi', 'interest' => 'Loans'])
            ->assertSessionHas('success');
        $this->assertDatabaseHas('messages', ['email' => 'b@x.com']);
    }
}
