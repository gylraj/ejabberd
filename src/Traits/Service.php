<?php

namespace Ejabberd\Rest\Traits;

trait Service
{

    /**
     * Check server status
     *
     */
    public function status()
    {
        $response = $this->sendRequest(
            'status',
            [
            ]
        );

        return $response == 0;
    }
    

    public function createRoom($name, $service)
    {
        $response = $this->sendRequest(
            'create_room',
            [
                "name" => $name,
                "service" => $service,
                "host" => $this->host
            ]
        );

        return $response == 0;
    }


    public function createRoomWithOpts($name, $service, $options = [])
    {
        $response = $this->sendRequest(
            'create_room',
            [
                'name' => $name,
                'service' => $service,
                'host' => $this->config['domain'],
                'options' => $options
            ]
        );

        return $response == 0;
    }
}