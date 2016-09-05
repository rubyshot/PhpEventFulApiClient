<?php

namespace EventFul\Test\Api;

/**
 * Tests performer api calls
 *
 * @author Marcos Peña
 */
class PerformerApiTest extends BaseApiTest
{


    public function testSearchPerformers()
    {
        if (!$this->apiKey) {
            $this->markTestSkipped(
              'Api key needed for this kind of test'
            );
        }                
        $service = $this->apiClient->getPerformerService();
        $params['page_number'] = 1;
        $params['page_size'] = 1;
        $params['category'] = 'music';
        $params['sort_order'] = 'relevant';
        $params['sort_direction'] = 'descending';
        $params['keywords'] = 'descendents';

        $performers = $service->search($params);
        $this->assertTrue(is_array($performers));
    }

    public function testGetPerformer()
    {
        if (!$this->apiKey) {
            $this->markTestSkipped(
              'Api key needed for this kind of test'
            );
        }                
        $decendentsId = 'P0-001-000045907-4';
        $service = $this->apiClient->getPerformerService();
        $params['id'] = $decendentsId;
        $params['show_events'] = true;
        $performer = $service->get($params);
        
        $this->assertTrue(is_array($performer));
    }
}
