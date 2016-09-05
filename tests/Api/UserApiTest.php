<?php

namespace EventFul\Test\Api;

/**
 * Tests user api calls
 *
 * @author Marcos Peña
 */
class UserApiTest extends BaseApiTest
{

    const USERNAME = 'devilcius';

    public function testSearchUsers()
    {
        if (!$this->apiKey) {
            $this->markTestSkipped(
              'Api key needed for this kind of test'
            );
        }                
        $service = $this->apiClient->getUserService();
        $params['keywords'] = self::USERNAME;        
        $response = $service->search($params);
        
        $this->assertTrue($response['users']['user']['username'] === self::USERNAME);
    }

}
