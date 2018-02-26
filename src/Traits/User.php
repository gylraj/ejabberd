<?php

namespace Ejabberd\Rest\Traits;

trait User
{

   /**
     * Check if ejabberd user account already exists.
     *
     * @param string $user
     *
     * @return bool
     */
    public function checkAccount($user)
    {
        $response = $this->sendRequest(
            'check_account',
            [
                'user' => $user,
//                'host' => $this->host
            ]
        );

        return $response == 0;
    }

    /**
     * Creates a user account
     *
     * @param string $accountName
     * @param $password
     * @return mixed
     * @internal param string $param
     */
    public function createAccount($accountName, $password)
    {
        $response = $this->sendRequest(
            'register',
            [
                "user" => $accountName,
                "password" => $password,
                "host" => $this->host
            ]
        );

        return $response == 0;
    }
    public function archiveGet($accountName, $password)
    {
        $response = $this->sendRequest(
            'archive_get',
            [
                // "user" => $accountName,
                // "password" => $password,
                // "host" => $this->host
            ]
        );

        return $response == 0;
    }


    /**
     * Send a message
     *
     * @param string $accountName
     * @param $password
     * @return mixed
     * @internal param string $param
     */
    public function sendMessage($type, $from, $to, $subject, $body)
    {
        $response = $this->sendRequest(
            'send_message',
            [
                "type" => $type,
                "from" => $from,
                "to" => $to,
                "subject" => $subject,
                "body" => $body
            ]
        );

        return $response == 0;
    }
    public function numActiveUsers($days)
    {
        $response = $this->sendRequest(
            'num_active_users',
            [
                'days' => $days,
                "host" => $this->host
            ]
        );

        return $response == 0;
    }
    public function numResources($user)
    {
        $response = $this->sendRequest(
            'num_resources',
            [
                'user' => $user,
                "host" => $this->host
            ]
        );

        return $response == 0;
    }
}
