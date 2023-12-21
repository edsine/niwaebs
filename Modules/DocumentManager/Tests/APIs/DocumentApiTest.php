<?php

namespace Modules\DocumentManager\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\DocumentManager\Tests\TestCase;
use Modules\DocumentManager\Tests\ApiTestTrait;
use Modules\DocumentManager\Models\Document;

class DocumentApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_document()
    {
        $document = Document::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/documents', $document
        );

        $this->assertApiResponse($document);
    }

    /**
     * @test
     */
    public function test_read_document()
    {
        $document = Document::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/documents/'.$document->id
        );

        $this->assertApiResponse($document->toArray());
    }

    /**
     * @test
     */
    public function test_update_document()
    {
        $document = Document::factory()->create();
        $editedDocument = Document::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/documents/'.$document->id,
            $editedDocument
        );

        $this->assertApiResponse($editedDocument);
    }

    /**
     * @test
     */
    public function test_delete_document()
    {
        $document = Document::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/documents/'.$document->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/documents/'.$document->id
        );

        $this->response->assertStatus(404);
    }
}
